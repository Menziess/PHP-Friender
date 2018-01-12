<?php

namespace app\src;

require_once 'App.php';

/**
 * Router to map routes to correct methods.
 */
class Router {

	/**
	 * Default routes.
	 */
	private static $routes = [
		//
	];

	/**
	 * Add routes to existing default routes.
	 */
	public function submit($routes) {
		self::$routes = array_merge(self::$routes, $routes);
		self::match();
	}

	/**
	 * Get routes.
	 */
	public function routes()
	{
		return self::$routes;
	}

	/**
	 * Process routes.
	 */
	private function match() {

		$uri = explode('/app', $_SERVER["REQUEST_URI"])[1] ?? '/';

		if (App::env()['app']["debug"]) { echo 'URI:<br> - ' . $uri . '<br>'; }

		foreach (self::$routes as $key => $value) {

			if (preg_match("#^$key$#", $uri)) {

				$action = explode('@', $value);
				$method = $action[1];
				$controller = $action[0];
				$controller_path =  __DIR__ . "/controller/";
				define('__NSNAME__', __NAMESPACE__.'\\');

				if (App::env()['app']["debug"]) {
					echo 'MATCH:<br> - ' . $key . ' - ' . $value . '<br>';
				}

				App::load($controller_path . "HomeController");

				echo $c = $controller_path . $controller;
				echo '<br>';
				echo $cc = str_replace("/", "\\\\", $c);
				echo $ccc = __NSNAME__ . "controller\\HomeController";

				$con = new $ccc;
				// $con = new $c;
				return $con->{$method}();
			}
		}
	}
}
