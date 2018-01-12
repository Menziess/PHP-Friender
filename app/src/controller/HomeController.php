<?php

namespace app\src\controller;

use \src\Controller;

class HomeController extends Controller {

	/**
	 * Index page.
	 */
	public function index() {
		return self::view('home', [
			"variable" => "dog",
		]);
	}
}