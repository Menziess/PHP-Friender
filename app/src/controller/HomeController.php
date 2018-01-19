<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\App;
use app\src\model\User;
use app\src\model\Answer;
use app\src\model\Event;
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
	 * Contact page.
	 */
	public function getContact()
	{
		return self::view('contact');
	}

	/**
	 * Contact page.
	 */
	public function getAboutus()
	{
		return self::view('aboutus');
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
		$answers = Answer::all();

		return self::view('questions', [
			"answers" => $answers
		]);
	}


	/**
	 * Questions post.
	 */
	public function postQuestions()
	{
		$user = User::auth();

		$answers = Request::$post;

		$answerString = "";
		foreach ($answers as $answer) {
			$answerString .= $answer;
		}

		$user->update([
			"answers" => $answerString,
		]);

		$matches = Event::match();

		return self::view('profile', [
			"message" => "Your questions have been submitted. "
		]);
	}

	public function getUsertest()
	{
		$user1 = User::find(3);
		$user2 = User::find(4);
		echo Event::matchUsers($user1, $user2);
	}
}
