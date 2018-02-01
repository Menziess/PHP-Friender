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

		# Find his conversation, messages and picture
		if ($user->conversation_id) {
			$conversation = Conversation::find($user->conversation_id);
			$messages = Conversation::messages($user->conversation_id);
		}
		if ($user->picture_id)
			$picture = Picture::find($user->picture_id);

		# If event is found, get it's matches
		if (!empty($event = Event::getEventphotoForUser($user->id))) {
			$event = $event[0];
			$group = Event::getMatchesForEvent($event['id']);
		} else {
			unset($event);
		}

		# Cast everyone except yourself to user model
		$matches = [];
		if (isset($group)) {
			foreach ($group as $match) {
				if ($match["user_id"] !== $user->id) {
					$matches[$match[0]]['user'] = new User($match);
					$matches[$match[0]]['picture'] = new Picture($match);
				}
			}
		}

		if (isset($messages) && !is_array($messages))
			$messages = [$messages];

		return self::view('user',
			compact("user",
					"picture",
					"matches",
					"conversation",
					"messages"));
	}

	/**
	 * Show user.
	 */
	public function show(int $id)
	{
		// User::permit($id);
		User::friend($id);

		# Find the user by id
		$user = User::find($id);
		if (!$user->is_active)
			return self::view('user', [
				'user' => null,
				'errors' => [
						'Gebruiker heeft zijn/haar profiel op prive gezet. '
					]
				]);

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
		// $user = User::auth();
		$user = User::auth();
		$friend = User::find($id);
		if (!$friend instanceof User)
			return
				self::redirect(null, ['errors' => ['Friend doesn\'t exist.']]);

		$result = User::toggleFriend($user->id, $friend->id);
		exit("Result: $result");
	}
}
