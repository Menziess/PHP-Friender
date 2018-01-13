<?php

namespace app\src;

use \PDO;

class Model {

	private static $db;

	/**
	 * Create db connection on construct.
	 */
	public function __construct()
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
	}

	/**
	 * Perform raw query on the database.
	 */
	public function query($query, $params = [])
	{
		$statement = self::$db->prepare($query);
		try {
			$statement->execute($params);
		} catch (Exception $e) {
			echo "Query failed: " . $e->getMessage();
		}

		return $statement->fetchAll();
	}
}