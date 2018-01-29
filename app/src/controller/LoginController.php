<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\model\User;

class LoginController extends Controller {

	/**
	 * Signup page.
	 */
	public function getSignup()
	{
		return self::view('signup');
	}

	/**
	 * Login page.
	 */
	public function getLogin()
	{
		return self::view('login');
	}

	/**
	 * Login.
	 */
	public function postLogin()
	{
		$credentials = Request::$post;

		$succesfullLogin = User::login($credentials);

		var_dump($succesfullLogin);

		if ($succesfullLogin)
			return self::redirect('/event');

		return self::redirect('login', [
			"email" => $credentials['email'],
			"error" => "Wrong email or password. "
		]);
	}

	/**
	 * Logout.
	 */
	public function postLogout()
	{
		User::auth();

		User::logout();

		return self::redirect('/');
	}
}