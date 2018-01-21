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
	private static $operators = ["=", "!=", "IS"];

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
		if (!in_array($name, static::$attributes))
			return $this->{$name};
        return $this->variables[$name];
    }

	/**
	 * Create db connection on construct.
	 *
	 * @param array $variables
	 */
	public function __construct(array $variables = [])
	{
		if (isset($variables['id']))
			$this->id = $variables['id'];

		self::isAssociative($variables);
		$variables = self::intersect(static::$attributes, $variables);

		$this->variables = $variables;
	}

	/**
	 * Execute query.
	 */
	public function get(int $limit = null)
	{
		if (!isset($this->query))
			throw new \Exception("No query to get something from. ");

		$query = "";
		$params = [];
		if (isset($this->query['select']))
			$query .= $this->query['select'];
		else if (isset($this->query['update'])) {
			$query .= $this->query['update']['query'];
			$params = $this->query['update']['params'];
		}
		else if (isset($this->query['delete']))
			$query .= $this->query['delete'];
		else
			throw new \Exception("No meaningfull query built. ");

		if (isset($this->query['where']))
			$query .= $this->query['where'];

		if (isset($limit))
			$query .= "LIMIT $limit";

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
		# Check columns and operators
		if (!in_array($column, static::$attributes))
			throw new \Exception("Column doesn't exist on " . static::getTableName() . " model. ");
		if (!in_array($operator, self::$operators))
			throw new \Exception("Operator doesn't exist. ");

		# If instance exists and where clause exists, add, else new clause
		if (isset($this) && isset($this->query['where']))
			$clause = $this->query['where'] .= $clause = "AND $column $operator '$value' ";
		else
			$clause = "WHERE $column $operator '$value' ";

		return static::addClause('where', $clause);
	}

	/**
	 * Update model.
	 *
	 * @param array $variables
	 * @return void
	 */
	public function update(array $variables)
	{
		if (!$this->id)
			throw new \Exception("Updating empty model. ");

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
			"UPDATE $table SET $keybindings WHERE id = $this->id;";

		self::query($query, $variables);

		$this->variables = $variables;
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

		return static::addClause('select', $clause);
	}

	/**
	 * Delete model.
	 *
	 * @param integer $id
	 * @return int
	 */
	public static function delete(int $id)
	{
		$query =
			"DELETE FROM user WHERE id = $id;";

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

		# Execute query and return results
		$statement->execute($params);

		# If it's not a select or update, show rowcount
		if (in_array(strtoupper($type), ["SELECT"])) {
			$result = $statement->fetchAll();
				if (count($result) === 1)
					return self::make($result[0], $result[0]['id']);
			return $result;
		} else {
			$lastId = self::db()->lastInsertId();
			return self::make($params, $lastId);
		}
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

		return self::query($query);
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
	 * Make model instance.
	 *
	 * @param array $variables
	 * @param int $id
	 * @return void
	 */
	private static function make(array $variables, int $id)
	{
		$class = __NAMESPACE__ . "\\model\\" . ucfirst(static::getTableName());
		$model = new $class($variables);
		$model->id = $id;
		return $model;
	}

	/**
	 * Add clause to query.
	 *
	 * @param string $key
	 * @param string $clause
	 * @return void
	 */
	private function addClause(string $key, string $clause)
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
	 * Initialize db connection.
	 *
	 * @return PDO
	 */
	private static function db()
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
