<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\model\User;
use app\src\model\Event;
use app\src\model\Message;

class EventController extends Controller {

	/**
	 * Get match score of logged in user.
	 */
	public function show(int $id)
	{
		$auth = User::auth();
		# Als de user bij het event hoort mag hij dit zien

		$messages = Message::allWithUsers();
		# In plaats van alle messages, alleen de messages van dit event



		return self::view('event', compact('user', 'messages'));
	}

	/**
	 *
	 */
	public function postMessage()
	{


		Message::create([
			"user_id" => $auth->id,
			"message" => Request::$put['message']
		]);

		return self::redirect('/event/1');

	}

}
