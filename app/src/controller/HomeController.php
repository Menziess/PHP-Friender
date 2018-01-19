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
	 * Privacy page.
	 */
	public function getPrivacy()
	{
		return self::view('privacy');
	}

	/**
	 * Signup page.
	 */
	public function getSignup()
	{
		return self::view('signup');
	}

	/**
	 * Login page.
	 */
	public function getLogin()
	{
		return self::view('login');
	}

	/**
	 * Login.
	 */
	public function postLogin()
	{
		$credentials = Request::$post;

		$succesfullLogin = User::login($credentials);

		if ($succesfullLogin)
			return self::redirect('/');

		return self::view('login', [
			"email" => $credentials['email'],
			"error" => "Wrong email or password. "
		]);
	}

	/**
	 * Logout.
	 */
	public function postLogout()
	{
		User::auth();

		User::logout();

		return self::redirect('/');
	}

	/**
	 * Questions page.
	 *
	 * @todo Sarah (Ombouwen zodat een Answer model gebruikt wordt)
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
	 * Questions post.
	 */
	public function postQuestions()
	{
		$user = User::auth();

		$answers = Request::$post;

		print_r($answers);

		$encodedAnswers = null;

		$user->update([
			"answers" => $encodedAnswers
		]);
	}
}
