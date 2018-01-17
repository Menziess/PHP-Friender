<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\App;
use app\src\model\User;
use \PDO;

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
		$servername = App::env()['database']["servername"];
		$username = App::env()['database']["username"];
		$password = App::env()['database']["password"];
		$dbname = App::env()['database']["databasename"];

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("SELECT * FROM answer");
			$stmt->execute();

			// set the resulting array to associative
			$result = $stmt->fetchAll();

		}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		$conn = null;

		return self::view('questions', [
			"answers" => $result
		]);
	}

	/**
	 * Process login credentials.
	 */
	public function postLogin()
	{
		$credentials = Request::$post;

		$succesfullLogin = User::login($credentials);

		if ($succesfullLogin)
			return self::view('home');
		return self::view('signup', [
			"error" => "Password incorrect. "
		]);
	}

	/**
	 * @todo ??
	 */
	public function getHome2()
	{
		return self::view('home2');
	}
}
