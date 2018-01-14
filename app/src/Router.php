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
		self::handle();
	}

	/**
	 * Get routes.
	 */
	public function routes()
	{
		return self::$routes;
	}

	/**
	 * Route not found.
	 */
	private static function error404()
	{
		$controller = new Controller();
		return $controller->view("404");
	}

	/**
	 * Find matching route.
	 */
	private function matchRoutes($base)
	{
		foreach (self::$routes as $route => $action) {
			if ($base === $route)
				return $action;
		}
	}

	/**
	 * Matches uri with one of the routes.
	 */
	private function handle()
	{
		# Get url segments
		$segments = Request::$segments;
		$base = $segments[1];

		# See if a route matches the base of url
		if (!$action = self::matchRoutes($base))
			return self::error404();

		# If a method is defined, use it, otherwise use the
		# next segment as method, else use default index
		# as method that will be called for controller
		list($controller, $method) = explode('@', $action);
		if ($method === "")
			$method = $segments[2] ?? 'index';

		# Get controller from provided action
		$className = __NAMESPACE__ . '\\controller\\' . $controller;
		$class = new $className;

		# See if method exists for controller
		if (method_exists($class, $method))
			return $class->{$method}(...array_slice($segments, 3));
		else
			return self::error404();
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
