<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Router;
use app\src\Controller;
use app\src\model\User;
use app\src\model\Event;
use app\src\model\Message;
use app\src\model\Conversation;
use app\src\model\Picture;

class EventController extends Controller {

	/**
	 * Empty state event page.
	 */
	public function getIndex()
	{
		$user = User::auth();

		# If event is found, get it's matches
		if (!empty($event = Event::getEventForUser($user->id))) {
			$event = $event[0];
			$group = Event::getMatchesForEvent($event['id']);
			$messages = Conversation::messages($event['conversation_id']);
		} else {
			unset($event);
		}

		# Cast everyone except yourself to user model
		$matches = [];
		if (isset($group)) {
			foreach ($group as $match) {
				$matches[$match[0]]['user'] = new User($match);
				$matches[$match[0]]['picture'] = new Picture($match);
			}
		}

		if (isset($messages) && !is_array($messages))
			$messages = [$messages];

		return self::view('event', compact(
			"user",
			"event",
			"matches",
			"messages"));
	}
}

