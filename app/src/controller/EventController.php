<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\model\User;
use app\src\model\Event;
use app\src\model\Message;
use app\src\model\Picture;

class EventController extends Controller {

	/**
	 * Empty state event page.
	 */
	public function getIndex()
	{
		$user = User::auth();

		# If event is found, get it's matches
		if (!empty($event = Event::getEventsForUser($user->id))) {
			$group = Event::getMatchesForEvent($event[0]['id']);
		}

		# Cast everyone except yourself to user model
		$matches = [];
		if (isset($group)) {
			foreach ($group as $match) {
				$matches[$match[0]]['user'] = new User($match);
				$matches[$match[0]]['picture'] = new Picture($match);
			}
		}

		return self::view('event', compact("user", "event", "matches"));
	}

	/**
	 * Get match score of logged in user.
	 */
	public function show(int $id)
	{
		$event = Event::find($id);
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
}

