<?php

namespace app\src\controller;

use app\src\Request;
use app\src\App;
use app\src\Router;
use app\src\Controller;
use app\src\Model;
use app\src\model\Event;
use app\src\model\User;
use app\src\model\Conversation;
use app\src\model\Picture;

class UserController extends Controller {

	/**
	 * Show yourself.
	 */
	public function getIndex()
	{
		$user = User::auth();

		# Delegeren deze call naar de show methode
		return $this->show($user->id);
	}

	/**
	 * Show user.
	 */
	public function show(int $id)
	{
		# Degene die de user bezoekt moet als vriend worden gezien,
		# admin zijn, of de user zelf zijn
		$visitor = User::friend($id);

		# Find the user by id
		$user = User::find($id);
		if (!$user->is_active)
			return self::view('user', [
				'user' => null,
				'errors' => [
						'Gebruiker heeft zijn/haar profiel op prive gezet. '
					]
				]);

		# Kijk of jij de user als vriend ziet
		$isvisitorfriend = User::select()
					->where('user.id', '=', $user->id)
					->join('user_user', 'user.id', 'user_user.friend_id')
					->where('user_user.user_id', '=', $visitor->id)
					->get(1);

		# Haalt alle vrienden van user op
		$friendlist = User::select()
					->join('user_user', 'user.id', 'user_user.friend_id')
					->where('user_user.user_id', '=', $user->id)
					->join('picture', 'user_user.friend_id', 'picture.user_id')
					->get();

		# If friendlist is not array, but one single user
		if ($friendlist instanceof User)
			$friendlist = [$friendlist];

		# Find his conversation, messages and picture
		if ($user->conversation_id) {
			$conversation = Conversation::find($user->conversation_id);
			$messages = Conversation::messages($user->conversation_id);
		}
		if ($user->picture_id)
			$picture = Picture::find($user->picture_id);

		return self::view('user',
			compact("user",
					"picture",
					"isvisitorfriend",
					"friendlist",
					"conversation",
					"messages"));
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

		$message = "Gefeliciteerd met je FRIENDER account!\n
			Vul je vragenlijst in zodat wij vrienden voor jou kunnen vinden.";

		if(isset(Request::$files['image'])) {
			$file = Request::$files['image'];
			$upload = Picture::upload($file, $user);

			if (!$upload instanceof Picture)
				return self::redirect('/settings', [
					'errors' => $upload,
				]);

			$user->update([
				"picture_id" => $upload->id,
			]);

		}
		return self::redirect('/questions', compact('user', 'message'));
	}

	/**
	 * Toggles whether someone is your friend.
	 */
	public function postTogglefriend(int $id)
	{
		$user = User::auth(); //94
		$friend = User::find($id); //95
		if (!$friend instanceof User)
			return
				self::redirect(null, ['errors' => ['Friend doesn\'t exist.']]);

		User::toggleFriend($user->id, $friend->id);

		return self::redirect();
	}
}
