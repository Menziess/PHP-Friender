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

	private function __autoload($class) {
		App::load($class);
	}

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

		if (App::env()['app']["debug"]) {
			echo 'URI:<br> - ' . $uri . '<br>';
		}

		foreach (self::$routes as $key => $value) {

			if (preg_match("#^$key$#", $uri)) {

				if (App::env()['app']["debug"]) {
					echo 'MATCH:<br> - ' . $key . ' - ' . $value . '<br>';
				}

				$action = explode('@', $value);
				$controller = $action[0];
				$method = $action[1];

				echo '<br><br>' . $controller . ' ' . $method;

				App::load('src/controller/' . $controller);

				$c = str_replace('/', '\\', $controller);

				// $con = new controller\HomeController;
				$con = new $c;
				return $con->{$method}();
			}
		}
	}
}
