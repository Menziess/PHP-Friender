<?php

namespace app\src\controller;

use app\src\Controller;

class HomeController extends Controller {

	/**
	 * Index page.
	 */
	public function getIndex()
	{
		return self::view('home');
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
	 * About page.
	 */
	public function getAbout()
	{
		return self::view('static/about');
	}
}
