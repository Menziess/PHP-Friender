<?php

namespace app\src\controller;

use \src\Controller;

class AboutController extends Controller {
	public function index() {
		readfile(__DIR__ . '/../views/about.php');
	}
}