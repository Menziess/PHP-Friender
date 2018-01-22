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
	 * @todo Sarah
	 */
	public function getTestmatching()
	{
		// $e = 	Event::all();
		// $users = Model::query("select * from user_event;");
		// print_r($users);
		$user = User::auth();
		$users = Model::query(
			// "select * from user where answers IS NULL"
			"SELECT * from user
			LEFT JOIN  event_user on event_user.user_id = user.id
			WHERE user.answers IS NOT NULL
			AND event_user.user_id IS NULL
			"
		);

		$event = Event::MatchUsers($user, $users);

		// echo '<pre>';
		// print_r($users);
		// $user2 = User::find(15);
		// echo Event::matchUsers($user1, $user2);
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
