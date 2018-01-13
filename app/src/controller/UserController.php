<?php

namespace app\src\controller;

use app\src\Controller;
// use app\src\model\User;
use app\src\Model;

class UserController extends Controller {

	/**
	 * Index page.
	 */
	public function index() {

		$model = new Model();
		$users = $model->query("SELECT * FROM user ORDER BY id");

		return self::view('user', compact("users"));
	}
}