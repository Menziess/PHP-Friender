<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\App;
use app\src\Model;
use app\src\model\User;
use app\src\model\Answer;
use app\src\model\Event;

class QuestionController extends Controller {

	/**
	 * @todo Sarah @todo Jochem
	 */

	public function getTestmatching()
	{
		$auth = User::auth();
		$users = User::query(
			"SELECT * from user
			LEFT JOIN  event_user on event_user.user_id = user.id
			WHERE user.answers IS NOT NULL
			"
		);

		if (empty($users))
			echo 'No users found.';

		// $users = User::all();

		# Berekent match score tussen ingelogde user en iedereen en zichzelf
		$scores = Event::matchAllUsers($auth, $users);

		return self::view('event', compact('user', 'scores'));
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

		// $matches = Event::match();

		return self::redirect('user', [
			"user" => $user,
			"message" => "Your questions have been submitted. "
		]);
	}
}
