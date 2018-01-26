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
	 * Index page.
	 */
	public function getIndex()
	{
		User::auth();

		$users = User::all();
		$routes = App::routes();

		return self::view('user', compact("users", "routes"));
	}

	/**
	 * Show user.
	 */
	public function show(int $id)
	{
		User::permit($id);

		$user = User::find($id);

		return self::view('user', compact("user"));
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
		print_r($vars);
		$user = User::create($vars);

		if (!empty($user))
			User::login(Request::$post);

		$message = "Gefeliciteerd met je FRIENDER account!";

		return self::redirect('questions', compact('user', 'message'));
	}
}
