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
		"" => "HomeController@index",
	];

	/**
	 * Add routes to existing default routes.
	 */
	public function submit($routes)
	{
		self::$routes = array_merge($routes, self::$routes);
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
	 * Matches uri with one of the routes.
	 */
	private function match()
	{
		$segments = Request::$segments;
		$base = $segments[1] ?? '';

		foreach (self::$routes as $key => $value) {

			if ($base === $key) {

				$action = explode('@', $value);
				if ($action[1] === "") $action[1] = null;
				$method = $action[1] ?? $segments[2] ?? 'index';
				$controller = $action[0];

				App::debug('MATCH:<br> - ' . $key . ' - ' . $value . '<br>');

				$className = __NAMESPACE__ . '\\controller\\' .  $controller;
				$class = new $className;
				return $class->{$method}();
			}
		}

		$controller = new Controller();

		return $controller->view("404");
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
			self::$router = new self();
		return self::$router;
	}
}
