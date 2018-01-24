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
	 * Questions page.
	 */
	public function getQuestions()
	{
		$user = User::auth();
		$answers = Answer::all();

		return self::view('questions', compact("user", "answers"));
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

		# if user is already in event, notice that questions have been updated
		$statement = Model::db()->query(
			"SELECT * FROM event_user WHERE user_id = $user->id;"
		);

		$statement->execute();

		if (!empty($statement->fetchAll()))
			return self::redirect("/questions", [
				"message" => "Your questions have been updated!",
			]);

		Event::match($user);

		return self::redirect('/event', [
			"user" => $user,
			"message" => "Your questions have been submitted!"
		]);
	}
}
