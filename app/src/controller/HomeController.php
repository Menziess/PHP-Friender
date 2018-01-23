<?php

namespace app\src\controller;

use app\src\Request;
use app\src\Controller;
use app\src\App;
use app\src\model\User;
use app\src\model\Answer;

class HomeController extends Controller {

	/**
	 * Index page.
	 */
	public function getIndex()
	{
		$message = "Dit gaan we maandag oplossen met CSS GRID.";

		return self::view('home', compact("message"));
	}

	/**
	 * Privacy page.
	 */
	public function getPrivacy()
	{
		return self::view('static/privacy');
	}

	/**
	 * Contact page.
	 */
	public function getContact()
	{
		return self::view('static/contact');
	}

	/**
	 * About us page.
	 */
	public function getAbout()
	{
		return self::view('static/about');
	}

	/**
	 * Admin page.
	 */
	public function getAdmin()
	{
		$users = User::all();
		return self::view('admin', compact('users'));
	}
}
