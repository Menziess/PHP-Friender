<?php

namespace app\src;

use \PDO;

class Model {

	public $id;
	protected $variables;
	protected static $attributes;
	protected static $required;
	private $query;
	private static $db;
	private static $operators = ["=", "!=", "IS NOT NULL"];

	/**
	 * Gets the table name of model.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return strtolower(substr(strrchr(get_called_class(), "\\"), 1));
	}

	/**
	 * Gets the class name of model.
	 *
	 * @return string
	 */
	public static function getClassName()
	{
		return __NAMESPACE__ . "\\model\\" . ucfirst(static::getTableName());
	}

	/**
	 * Implicit printing of model shows json_encoded variables.
	 *
	 * @return string
	 */
	public function __toString()
	{
		return json_encode($this->variables);
	}

	/**
	 * Setter for variables array.
	 *
	 * @param string $name
	 * @param any $value
	 */
	public function __set(string $name, any $value)
	{
		if ($name === "id")
			throw new \Exception("Model id's are immutable. ");
        $this->variables[$name] = $value;
	}

	/**
	 * Getter for variables array.
	 *
	 * @param string $name
	 * @return any
	 */
	public function __get(string $name)
	{
        return $this->variables[$name];
    }

	/**
	 * Create db connection on construct.
	 *
	 * @param array $variables
	 */
	public function __construct(array $variables = [])
	{
		# If the id is passed, use it on model
		if (isset($variables['id']))
			$this->id = $variables['id'];

		# See if variables are passed the right way
		self::isAssociative($variables);
		$this->variables = $variables;
	}

	/**
	 * Execute query.
	 */
	public function get(int $limit = null)
	{
		# It's meaningless to execute a query that doesn't exist
		if (!isset($this->query))
			return;
		if (empty($this->query))
			return;

		$query = "";
		$params = [];

		# If it's a select query
		if (isset($this->query['select'])) {
			$type = "SELECT";
			$query .= $this->query['select'];
		}

		# If it's a update query
		else if (isset($this->query['update'])) {
			$type = "UPDATE";
			$query .= $this->query['update']['query'];
			$params = $this->query['update']['params'];
		}

		# If it's a delete query
		else if (isset($this->query['delete'])) {
			$type = "DELETE";
			$query .= $this->query['delete'];
		}

		# If join is added
		if (isset($this->query['join']))
			$query .= $this->query['join'];

		# If where clauses are set
		if (isset($this->query['where']))
			$query .= $this->query['where'];

		# If limit is set
		if (isset($limit))
			$query .= "LIMIT $limit";

		echo $query .= ";";

		return self::query($query, $params);
	}

	/**
	 * Where clause.
	 *
	 * @param string $column
	 * @param string $operator
	 * @param any $value
	 * @return Model
	 */
	public function where(string $column, string $operator, $value = null)
	{
		$table = static::getTableName();

		if (isset($this) && isset($this->id))
			throw new \Exception("Can't add query on existing $table model. ");
		$columns = array_merge(static::$attributes, ['id']);
		if (!in_array($column, $columns))
			throw new \Exception("Column doesn't exist on $table model. ");
		if (!in_array($operator, self::$operators))
			throw new \Exception("Operator doesn't exist. ");

		# If instance exists and where clause exists, add, else new clause
		if (isset($this) && isset($this->query['where']))
			$clause = $this->query['where'].= "AND $column $operator '$value' ";
		else
			$clause = "WHERE $column $operator '$value' ";

		return static::setClause('where', $clause);
	}

	/**
	 * Join clause.
	 *
	 * @param string $table
	 * @return Model
	 */
	public function join(string $join, string $pk = null, string $fk = null)
	{
		$table = static::getTableName();
		if (!$pk)
			$pk = "$table.id";
		if (!$fk)
			$fk = "$join.$table" . "_id";
		$clause = "LEFT JOIN $join ON $pk = $fk ";

		return static::setClause('join', $clause);
	}

	/**
	 * Update model.
	 *
	 * @param array $variables
	 * @return void
	 */
	public function update(array $variables)
	{
		$variables = self::intersect(static::$attributes, $variables);
		self::modelHasAttributes($variables);
		self::isAssociative($variables);

		$table = static::getTableName();
		$class = __NAMESPACE__ . "\\model\\" . ucfirst($table);
		$keys = array_keys($variables);
		$keybindings = array_map(function($key) {
			return "$key = :$key";
		}, $keys);
		$keybindings = implode(', ', $keybindings);

		$query =
			"UPDATE $table SET $keybindings";

		# If this is not an existing model, build a query
		if (isset($this->query['where'])) {
			$this->query['update']['query'] = $query;
			$this->query['update']['params'] = $variables;
			return $this;
		} else if ($this->id) {
			$query .= " WHERE id = $this->id;";
			self::query($query, $variables);
			$this->selfUpdate($variables);
			return $this;
		}
	}

	/**
	 * Select clause.
	 *
	 * @param array $columns
	 * @return Model
	 */
	public function select(array $columns = [])
	{
		$table = static::getTableName();

		$selector = "*";
		if (!empty($columns)) {
			$selector = 'id, ';
			$selector .= implode(', ', $columns);
		}
		$clause = "SELECT $selector FROM $table ";

		return static::setClause('select', $clause);
	}

	/**
	 * Delete model.
	 *
	 * @param integer $id
	 * @return int
	 */
	public function delete()
	{
		$table = static::getTableName();

		$query =
			"DELETE FROM $table ";

		if (!isset($this) || !$this->id)
			return static::setClause('delete', $query);

		$query .= " WHERE id = $this->id;";

		return self::query($query);
	}

	/**
	 * Perform raw query on the database.
	 *
	 * @param string $query
	 * @param array $params
	 * @return Model or array
	 */
	public static function query(string $query, array $params = [])
	{
		# Prepare statement, check query type (SELECT, UPDATE...)
		$type = strtok($query, " ");
		$statement = self::db()->prepare($query);

		# Add bindings and values
		foreach ($params as $binding => $value) {
			$statement->bindParam(":$binding", $value);
		}

		# Execute query
		$statement->execute($params);

		# If it's not a select, get last id to represent update
		if (in_array(strtoupper($type), ["SELECT"])) {
			$results = $statement->fetchAll();

			switch (count($results)) {
				case 0:
					return;
				case 1:
					return self::make($results[0]);
				default:
					return array_map(function($result) {
						return self::make($result);
					}, $results);
			}
		} else {
			$lastId = self::db()->lastInsertId();
			if ($lastId)
				return static::find($lastId);
		}
	}

	/**
	 * Make model instance.
	 *
	 * @param array $variables
	 * @param int $id
	 * @return void
	 */
	private static function make(array $variables)
	{
		# Remove numeric keys
		foreach ($variables as $key => $value) {
			if (is_int($key)) {
				unset($variables[$key]);
			}
		}

		# Cast array to model class
		$class = static::getClassName();
		$model = new $class($variables);
		return $model;
	}

	/**
	 * Create model.
	 *
	 * @param array $variables
	 * @return Model
	 */
	public static function create(array $variables)
	{
		$variables = self::intersect(static::$attributes, $variables);

		self::requiredArgumentsMissing($variables);
		self::isAssociative($variables);

		$table = static::getTableName();
		$keys = implode(', ', array_keys($variables));
		$bindings = implode(', :', array_keys($variables));

		$query =
			"INSERT INTO $table ($keys) VALUES (:$bindings);";

		return self::query($query, $variables);

	}

	/**
	 * Get model by id.
	 *
	 * @param integer $id
	 * @return Model
	 */
	public static function find(int $id)
	{
		$table = static::getTableName();

		$query =
			"SELECT * FROM $table WHERE id = $id";

		if ($user = self::query($query))
			return $user;
		else
			return new static();
	}

	/**
	 * Query all of specific model.
	 *
	 * @return array
	 */
	public static function all()
	{
		$model = new static();
		$table = $model->getTableName();

		$query =
			"SELECT * FROM $table";

		return self::query($query);
	}

	/**
	 * Add clause to query.
	 *
	 * @param string $key
	 * @param string $clause
	 * @return void
	 */
	private function setClause(string $key, string $clause)
	{
		if (isset($this)) {
			$this->query[$key] = $clause;
			return $this;
		} else {
			# If this is not a model yet, create one
			$model = new static([]);
			$model->query[$key] = $clause;
			return $model;
		}
	}

	/**
	 * Update some variables of model.
	 *
	 * @param array $variables
	 * @return void
	 */
	private function selfUpdate(array $variables)
	{
		self::isAssociative($variables);
		foreach ($variables as $key => $value) {
			$this->variables[$key] = $value;
		}
	}

	/**
	 * Initialize db connection.
	 *
	 * @return PDO
	 */
	public static function db()
	{
		if (self::$db)
			return self::$db;

		$env = App::env();
		$databasename = $env['database']["databasename"];
		$servername = $env['database']["servername"];
		$username = $env['database']["username"];
		$password = $env['database']["password"];

		try {
			self::$db = new PDO(
				"mysql:host=$servername;dbname=$databasename",
				$username,
				$password,
				[
					PDO::ATTR_PERSISTENT => true,
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				]
			);
		} catch (PDOException $e) {
			print "Database Error: " . $e->getMessage() . ". ";
			die();
		}

		return self::$db;
	}

	/**
	 * Checks if array is associative.
	 *
	 * @param array $array
	 * @return boolean
	 */
	private static function isAssociative(array $array)
	{
		foreach(array_keys($array) as $key) {
			if (!is_int($key))
				return True;
			else
				throw new \Exception("Must be an associative array. ");
		}
	}

	/**
	 * Check if attributes exist on model.
	 *
	 * @param array $variables
	 * @return void
	 */
	private static function modelHasAttributes(array $variables)
	{
		$variablesContainedInAttributes
			= array_intersect(static::$attributes, array_keys($variables));

		if (count($variablesContainedInAttributes) !== count($variables))
			throw new \Exception("Some attributes do not exist on model. ");
	}

	/**
	 * Attributes are to be the same as variable keys.
	 *
	 * @param array $variables
	 * @return void
	 */
	private static function requiredArgumentsMissing(array $variables)
	{
		if (!static::$required)
			return;
		if (array_keys($variables) !== static::$required)
			throw new \Exception("Required attributes missing. ");
	}

	/**
	 * Remove elements from array2 that are not in array1.
	 *
	 * @param array $array1
	 * @param array $array2
	 * @return void
	 */
	private static function intersect(array $array1, array $array2)
	{
		$result = $array2;
		foreach ($result as $key => $value) {
			if (!in_array($key, $array1)) {
				unset($result[$key]);
			}
		}
		unset($result["0"]);
		return $result;
	}
}
