<?php

namespace app\src\controller;

use app\src\Request;
use app\src\App;
use app\src\Router;
use app\src\Controller;
use app\src\Model;
use app\src\model\User;
use app\src\model\Conversation;
use app\src\model\Picture;

class UserController extends Controller {

	/**
	 * Show user.
	 */
	public function show(int $id)
	{
		User::permit($id);

		$user = User::find($id);
		if ($user->conversation_id) {
			$conversation = Conversation::find($user->conversation_id);
			$messages = Conversation::messages($user->conversation_id);
		}
		if ($user->picture_id)
			$picture = Picture::find($user->picture_id);

		return self::view('user', compact("user", "picture", "conversation", "messages"));
	}

	/**
	 * Deletes user.
	 */
	public function delete(int $id)
	{
		User::permit($id);

		$user =  User::where('id', '=', $id)
						->delete()
						->get();

		return self::redirect();
	}

	/**
	 * Updates user.
	 */
	public function update(int $id)
	{
		User::permit($id);

		$user = User::find($id)
					->update(Request::$put);

		if (empty($user))
			http_response_code(404);

		return self::json($user);
	}

	/**
	 * Saves new user.
	 */
	public function store()
	{
		$conversation = Conversation::create([]);
		$vars = Request::$post;
		$vars['conversation_id'] = $conversation->id;
		$user = User::create($vars);

		if (!empty($user))
			User::login(Request::$post);

		$message = "Gefeliciteerd met je FRIENDER account!";

		return self::redirect('questions', compact('user', 'message'));
	}
}
