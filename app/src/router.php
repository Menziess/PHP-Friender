<?php

namespace app\src;

/**
 * Router to map routes to correct methods.
 */
class Router {

	/**
	 * Application singleton is created by calling the getInstance method.
	 */
	private static $router;
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

		$debug = App::env()['app']["debug"];
		$uri = $_SERVER["REQUEST_URI"];

		App::debug('URI:<br> - ' . $uri . '<br>');

		foreach (self::$routes as $key => $value) {

			if (preg_match("#^$key$#", $uri)) {

				$action = explode('@', $value);
				$method = $action[1];
				$controller = $action[0];

				App::debug('MATCH:<br> - ' . $key . ' - ' . $value . '<br>');

				$className = __NAMESPACE__ . '\\controller\\' . $controller;
				$class = new $className;
				return $class->{$method}();
			}
		}
		readfile(__DIR__ . '/views/404.php');
	}

	/**
	 * Construct Router singleton.
	 */
	private function __clone() {}
	private function __wakeup() {}
	protected function __construct() {}
	public static function getInstance()
	{
		if (!self::$router)
			self::$router = new static();
		return self::$router;
	}
}
