<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;

class HomeController extends Controller {

	/**
	 * Index page.
	 */
	public function getIndex()
	{
		return self::view('home', [
			"variable" => "This is a variable passed by the HomeController to the view!",
		]);
	}

	/**
	 * Get signup page.
	 */
	public function getSignup()
	{
		return self::view('signup');
	}

	/**
	 * Get login page.
	 */
	public function getLogin()
	{
		return self::view('login');
	}

	/**
	 * Get questions page.
	 */
	public function getQuestions()
	{
		// questions db
		$servername = app::$env['database']["servername"];
		$username = app::$env['database']["username"];
		$password = app::$env['database']["password"];
		$dbname = app::$env['database']["databasename"];

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("SELECT * FROM answer");
			$stmt->execute();

			// set the resulting array to associative
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

			foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
				echo $v;
			}
		}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		$conn = null;
		return self::view('questions');
	}

	/**
	 * Process login credentials.
	 */
	public function postLogin()
	{
		return Request::$post;
	}

	/**
	 * @todo ??
	 */
	public function getHome2()
	{
		return self::view('home2');
	}
}
