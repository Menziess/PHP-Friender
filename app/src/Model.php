<?php

namespace app\src;

use \PDO;

class Model {

	private static $db;

	private static $attributes = [
		//
	];

	private $variables;

	/**
	 * Create db connection on construct.
	 */
	public function __construct()
	{
		if (!self::init())
		 	throw new \Exception("Couldn't connect to database.");
	}

	/**
	 * Perform raw query on the database.
	 */
	public static function query($query, $params = [])
	{
		$statement = self::$db->prepare($query);
		try {
			$statement->execute($params);
		} catch (Exception $e) {
			echo "Query failed: " . $e->getMessage();
		}

		return $statement->fetchAll();
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
}