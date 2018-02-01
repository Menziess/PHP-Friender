<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\App;
use app\src\model\User;

class AdminController extends Controller {

	/**
	 * Admin page.
	 */
	public function getIndex()
	{
		User::admin();

		$users = User::all();

		return self::view('admin', compact('users'));
	}

}
