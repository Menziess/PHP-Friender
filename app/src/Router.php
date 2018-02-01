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
		"" => "HomeController@",
	];

	/**
	 * Get routes.
	 */
	public function routes()
	{
		return self::$routes;
	}

	/**
	 * On submission, the router will start handling the incoming request.
	 */
	public function submit($routes)
	{
		# Collect all routes
		self::$routes = array_merge($routes, self::$routes);

		# Let the router figure out which controller should handle
		# the request
		$solution = self::handle();

		# If an array is returned, convert the response to json
		# else, return whatever the controller wants to send
		if (is_array($solution))
			return Controller::json($solution);
		return $solution;
	}

	/**
	 * Route not found.
	 */
	public static function error($code = 404, array $args = null)
	{
		switch ($code) {
			case 401:
				return Controller::view('error/401');
			default:
				return Controller::view('error/404');
		}
	}

	/**
	 * Find corresponding action for route that matches base input.
	 */
	private static function matchRoutes($base)
	{
		foreach (self::$routes as $route => $action) {
			if ($base === $route)
				return $action;
		}
	}

	/**
	 * Extract /uri/segments/etc from request uri, choose the right controller
	 * to create the response accordingly.
	 */
	private function handle()
	{
		# Get url segments
		$segments = Request::$segments;

		# See if a route matches the base of url
		if (!$action = self::matchRoutes($segments[1]))
			return self::error(404);

		# If a method is defined, use it, otherwise use the
		# next segment as method, else use default index
		# as method that will be called for controller
		list($controller, $method) = explode('@', $action);
		if ($method === "")
			$method = $segments[2] ?? 'index';

		# Prepend request method
		$target = strtolower(Request::$method) . ucfirst($method);

		# Get controller from provided action
		$className = __NAMESPACE__ . '\\controller\\' . $controller;
		$class = new $className;

		# See if method exists for controller
		if (method_exists($class, $target))
			return $class->{$target}(...array_slice($segments, 3));
		else if (is_numeric($method))
			return $class->handleRest($method);
		else
			return self::error(404);
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
