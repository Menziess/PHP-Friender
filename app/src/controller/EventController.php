<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\model\User;

class EventController extends Controller {

	/**
	 * @todo Roos?
	 */
	public function getEvents()
	{
		User::auth();

		return self::view('events');
	}
}