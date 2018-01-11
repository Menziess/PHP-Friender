<?php

namespace app\src;

/**
 * Router to map routes to correct methods.
 */
class Router {

	/**
	 * Default routes.
	 */
	private static $routes = [
		"/",
		"/about",
		"/contact"
	];

	/**
	 * Add routes to existing default routes.
	 */
	public function submit($routes) {
		self::$routes = array_merge(self::$routes, $routes);
		self::routeUri();
	}

	/**
	 * Process routes.
	 */
	private function routeUri() {

		echo '<br><br>';
		echo $uri = explode('/app', $_SERVER["REQUEST_URI"])[1];
		echo '<br><br>';

		foreach (self::$routes as $key => $value) {
			if (preg_match("#^$value$#", $uri)) {
				echo 'match detected! - ' . $value;
			}
		}
	}
}
