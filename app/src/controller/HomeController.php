<?php

namespace app\src\controller;

use app\src\Controller;
use app\src\Model;
use app\src\model\User;
use app\src\model\Picture;

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
	 * Concept page.
	 */
	public function getConcept()
	{
		return self::view('static/concept');
	}

	/**
	 * About page.
	 */
	public function getAbout()
	{
		$devs = User::select(['first_name', 'filename', 'bio'])
					->join('picture', 'user.picture_id', 'picture.id')
					->where('is_admin', '=', '1')
					->get();

		return self::view('static/about', compact("devs"));
	}
}
