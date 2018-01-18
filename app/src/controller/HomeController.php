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
			"message" => "Welcome to the best website to hang out if you don't have any friends!",
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
	 * Process login credentials.
	 */
	public function postLogin()
	{
		$credentials = Request::$post;

		$succesfullLogin = User::login($credentials);

		if ($succesfullLogin)
			return self::redirect('home', [
				"message" => "You are now logged in! ",
			]);

		return self::view('login', [
			"email" => $credentials['email'],
			"error" => "Password incorrect. "
		]);
	}

	/**
	 * Logs user out.
	 */
	public function postLogout()
	{
		User::logout();

		return self::redirect('home', [
			"message" => "You are now logged out! ",
		]);
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
	 * Privacy page.
	 */
	public function getPrivacy()
	{
		return self::view('privacy');
	}
}
