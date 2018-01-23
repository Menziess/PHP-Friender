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
			AND event_user.user_id IS NULL"
		);

		if (empty($users))
			echo 'No users found.';

		# Berekent match score tussen ingelogde user en iedereen en zichzelf
		$scores = Event::matchAllUsers($auth, $users);
		unset($scores[$auth->id]);

		$matches = [];

		for ($i = 0; $i <= 2; $i++) {

			$match_value = max($scores);
			$match_id = array_search($match_value, $scores);
			$matches[$match_id] = $match_value;
			unset($scores[$match_id]);
		}
		return self::view('event', compact('user', 'matches'));
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
