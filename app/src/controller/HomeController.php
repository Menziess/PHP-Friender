<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;

class HomeController extends Controller {

	/**
	 * Index page.
	 */
	public function getIndex()
	{
		return self::view('home', [
			"variable" => "This is a variable passed by the HomeController to the view!",
		]);
	}

	/**
	 * Get signup page.
	 */
	public function getSignup()
	{
		return self::view('signup');
	}

	/**
	 * Get login page.
	 */
	public function getLogin()
	{
		return self::view('login');
	}

	/**
	 * Process login credentials.
	 */
	public function postLogin()
	{
		return Request::$post;
	}

	/**
	 * @todo ??
	 */
	public function getHome2()
	{
		return self::view('home2');
	}
}
