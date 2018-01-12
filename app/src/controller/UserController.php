<?php

namespace app\src\controller;

use \src\Controller;

class UserController extends Controller {

	/**
	 * Index page.
	 */
	public function index() {
		return self::view('user');
	}
}