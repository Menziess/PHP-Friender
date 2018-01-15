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
}