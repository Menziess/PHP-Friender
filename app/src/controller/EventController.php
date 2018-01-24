<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\model\User;
use app\src\model\Message;

class EventController extends Controller {

	/**
	 * Empty state event page.
	 */
	public function getIndex()
	{
		$user = User::auth();

		return self::view('event', compact('user'));
	}

	/**
	 * Get match score of logged in user.
	 */
	public function show(int $id)
	{
		$user = User::auth();
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
		$auth = User::auth();

		Message::create([
			"user_id" => $auth->id,
			"message" => Request::$post['message']
		]);

		return self::redirect('/event/1');
	}

	public function geEvent()
	{
		$user = User::auth();

		if ($user->picture_id)
			$picture = Picture::find($user->picture_id);

		return self::view("settings", compact("picture", "user"));
	}

}

