<?php

namespace app\src;

use \PDO;

class Model {

	protected static $required;
	protected $variables;
	private static $db;

	/**
	 * Gets the table name of model.
	 */
	public static function getTableName()
	{
		return strtolower(substr(strrchr(get_called_class(), "\\"), 1));
	}

	/**
	 * Implicit printing of model shows json_encoded variables.
	 */
	public function __toString()
	{
		return json_encode($this->variables);
	}

	/**
	 * Magic setter.
	 */
	public function __set(string $name, $value)
	{
		if ($name === "id")
			throw new \Exception("Model id's are immutable. ");
        $this->variables[$name] = $value;
	}

	/**
	 * Magic getter.
	 */
	public function __get(string $name)
	{
		if (!in_array($name, static::$attributes))
			return $this->{$name};
        return $this->variables[$name];
    }

	/**
	 * Create db connection on construct.
	 */
	public function __construct(array $variables = [])
	{
		$attr = static::$attributes;
		if (empty($variables))
			return;

		if (isset($variables['id']))
			$this->id = $variables['id'];

		self::isAssociative($variables);
		$variables = self::intersect(static::$attributes, $variables);

		$this->variables = $variables;
	}

	/**
	 * Perform raw query on the database.
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
		if (in_array(strtoupper($type), ["SELECT"]))
			return $statement->fetchAll();
		else
			return $statement->rowCount();
	}

	/**
	 * Create model.
	 */
	public static function create(array $variables)
	{
		$variables = self::intersect(static::$attributes, $variables);

		self::requiredArgumentsMissing($variables);
		self::isAssociative($variables);

		$table = static::getTableName();
		$class = __NAMESPACE__ . "\\model\\" . ucfirst($table);
		$keys = implode(', ', array_keys($variables));
		$bindings = implode(', :', array_keys($variables));

		$query =
			"INSERT INTO $table ($keys) VALUES (:$bindings);";

		if ((bool) self::query($query, $variables))
			return new $class($variables);
	}

	/**
	 * Get model by id.
	 */
	public static function find(int $id)
	{
		$model = new static();
		$table = $model->getTableName();

		$query =
			"SELECT * FROM $table WHERE id = $id";

		$userVars = self::query($query);
		if ($userVars)
			return new static($userVars[0]);
	}

	/**
	 * @todo Stefan. Add id to $model.
	 */
	public static function findByEmail(string $email)
	{
		$model = new static();
		$table = $model->getTableName();

		$query =
			"SELECT * FROM $table WHERE email = '$email'";

		$userVars = self::query($query);

		if ($userVars) {
			$model = new static($userVars[0]);
			$model->id = $userVars['id'];
			return $model;

		}
	}

	/**
	 * Where clause.
	 *
	 * @todo Stefan
	 */
	public function where($attribute, $operator, $value)
	{

	}

	/**
	 * Query all of specific model.
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
	 * Update model.
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
	 * Delete model.
	 */
	public static function delete(int $id)
	{
		$query =
			"DELETE FROM user WHERE id = $id;";

		return ((bool) self::query($query));
	}

	/**
	 * Initialize db connection.
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
	 */
	private static function isAssociative($array)
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
	 */
	private static function modelHasAttributes($variables)
	{
		$variablesContainedInAttributes
			= array_intersect(static::$attributes, array_keys($variables));

		if (count($variablesContainedInAttributes) !== count($variables))
			throw new \Exception("Some attributes do not exist on model. ");
	}

	/**
	 * Attributes are to be the same as variable keys.
	 */
	private static function requiredArgumentsMissing($variables)
	{
		if (!static::$required)
			return;
		if (array_keys($variables) !== static::$required)
			throw new \Exception("Required attributes missing. ");
	}

	/**
	 * Remove elements from array2 that are not in array1.
	 */
	private static function intersect($array1, $array2)
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
