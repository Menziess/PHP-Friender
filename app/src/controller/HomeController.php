<?php

namespace app\src\controller;

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
	public function getSignup2()
	{
		return self::view('signup2');
	}

	public function getLogin()
	{
		return self::view('login');
	}
	public function getHome2()
	{
		return self::view('home2');
	}
}
