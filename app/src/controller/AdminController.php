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
	public function getAdmin()
	{
		$users = User::all();

		return self::view('admin', compact('users'));
	}

	// /**
	//  * @todo Roos
	//  */
	// public function postAdmin(int $id)
	// {
	// 	echo "id: $id";
	// 	// $user_id = Request::$post;

	// 	// als user met deze id bestaat:
	// 		// delete($user_id) (uit UserController)

	// 	// return self::redirect('admin', compact('users'));
	// }
}