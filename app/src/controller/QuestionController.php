<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\App;
use app\src\model\User;
use app\src\model\Answer;
use app\src\model\Event;

class QuestionController extends Controller {

	/**
	 * @todo Sarah
	 */
	public function getTestmatching()
	{
		$user1 = User::find(3);
		$user2 = User::find(4);
		echo Event::matchUsers($user1, $user2);
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
