<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\model\User;
use app\src\model\Event;

class EventController extends Controller {

	/**
	 * Get match score of logged in user.
	 */
	public function getEvent()
	{
		$auth = User::auth();

		return self::view('event', compact('user'));
	}
}