<?php

namespace app\src;

use \PDO;

class Model {

	public static $attributes = [];
	protected $variables;
	private static $db;

	/**
	 * Gets the table name of model.
	 */
	public function getTableName()
	{
		return strtolower(substr(strrchr(get_class($this), "\\"), 1));
	}

	/**
	 * Gets the table columns.
	 */
	public function getAttributes()
	{
		return $this::$attributes;
	}

	/**
	 * Magic setter.
	 */
	public function __set(string $name, any $value) {
        $this->variables[$name] = $value;
	}

	/**
	 * Magic getter.
	 */
	public function __get(string $name) {
		if (!in_array($name, static::$attributes))
			return $this->{$name};
        return $this->variables[$name];
    }

	/**
	 * Create db connection on construct.
	 */
	public function __construct(array $variables = [])
	{
		if (!self::init())
			throw new \Exception("Couldn't connect to database.");
		if (empty($variables))
			return;
		if (array_keys($variables) !== $this->getAttributes())
			throw new \Exception("Attributes missing.");
		if (!self::isAssociative($variables))
			throw new \Exception("Variables must be passed as associative array.");
		$this->variables = $variables;
	}

	/**
	 * Perform raw query on the database.
	 */
	public static function query(string $query, array $params = [])
	{
		# Prepare statement, check query type (SELECT, UPDATE...)
		$type = strtok($query, " ");
		$statement = self::$db->prepare($query);
		echo $query;
		# Add bindings and values
		foreach ($params as $binding => $value) {
			$statement->bindParam(":$binding", $value);
		}

		# Execute query and return results
		$statement->execute($params);
		if (in_array(strtoupper($type), ["SELECT", "UPDATE"]))
			return $statement->fetchAll();
		else
			return $statement->rowCount();
	}

	/**
	 * Create query.
	 */
	public function create()
	{
		if (empty($this->variables))
			throw new \Exception("Model is empty, can't insert into database.");

		$table = $this->getTableName();
		$keys = implode(', ', array_keys($this->variables));
		$bindings = implode(', :', array_keys($this->variables));

		$query =
			"INSERT IGNORE INTO $table ($keys) VALUES (:$bindings);";

		return self::query($query, $this->variables);
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

		return self::query($query)[0] ?? [];
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
	 * Initialize db connection.
	 */
	private static function init()
	{
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
			print "Database Error: " . $e->getMessage() . "<br/>";
			die();
		}
		return true;
	}

	/**
	 * Checks if array is associative.
	 */
	private static function isAssociative($array)
	{
		foreach(array_keys($array) as $key)
			if (!is_int($key)) return TRUE;
		return FALSE;
	}
}