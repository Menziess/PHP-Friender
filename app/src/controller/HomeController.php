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
		$message = "Dit gaan we maandag oplossen met CSS GRID.";

		return self::view('home', compact("message"));
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
	public function getAbout()
	{
		return self::view('about');
	}

	/**
	 * Questions page.
	 *
	 * @todo Sarah (Ombouwen zodat een Answer model gebruikt wordt)
	 */
	public function getQuestions()
	{
		$answers = Answer::all();

		return self::view('questions', compact("answers"));
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

	/**
	 * @todo Sarah
	 */
	public function getUsertest()
	{
		$user1 = User::find(3);
		$user2 = User::find(4);
		echo Event::matchUsers($user1, $user2);
	}

	/**
	 * @todo Stefan
	 */
	public function getQuerytest()
	{
		# Chain where clause
		echo '<pre>';
		// $user = User::where("first_name", "=", "Stefan")
		// 			->where("last_name", "=", "Schenk")
		// 			->select(['first_name', 'last_name'])
		// 			->get();

		$user = User::select(['first_name', 'last_name'])
					->where("first_name", "=", "Stefan")
					->where("last_name", "=", "Schenk")
					->get();

		var_dump($user);

	}
}
