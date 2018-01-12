<?php

namespace app\src\controller;

class HomeController {
	public function index() {
		readfile(__DIR__ . '/../views/home.php');
	}
}