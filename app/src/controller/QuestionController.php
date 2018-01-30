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

		# Check of de user niet al een event heeft
		$event = Event::getEventForUser($user->id);
		if (empty($event)) unset($event);

		return self::view('questions', compact("user", "answers", "event"));
	}

	/**
	 * Questions post.
	 */
	public function postQuestions()
	{
		$user = User::auth();
		$answers = Request::$post;
		$answerString = Answer::toString($answers);

		# Update user answers
		$user->update([
			"answers" => $answerString,
		]);

		# See if user has active event
		$date = date('Y-m-d', time());
		$event = Event::getEventForUser($user->id);

		# If user has event, redirect back to questions
		if (!empty($event))
			return self::redirect('/questions', [
				"message" => "Je antwoorden zijn bijgewerkt!",
			]);

		# If user has no event, find matches
		# Create event if possible and send mail notifications
		if (!empty($matches = Event::match($user)))
			if (!empty($event = Event::createEvent($user, $matches))) {

				# Redirect user back before doing the hard mail work
				self::redirect('/event', [
					"user" => $user,
					"message" => "Je hebt een match!"
				], false);
				Event::sendMailNotifications($user, $matches);
				exit;
			}

		return self::redirect('/event', [
			"user" => $user,
			"message" => "Je antwoorden zijn opgeslagen."
		]);
	}
}
