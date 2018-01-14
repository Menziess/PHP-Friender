<?php

namespace app\src;

class Request {

	private static $request;

	public static $method;
	public static $uri;
	public static $segments;
	public static $post;
	public static $get;

	/**
	 * Set url segments.
	 */
	private static function segments()
	{
		$segments = explode('?', self::$uri);
		$segments = explode('/', $segments[0]);
		return $segments;
	}

	/**
	 * Construct Request singleton.
	 */
	private function __clone() {}
	private function __wakeup() {}
	protected function __construct() {
		self::$method = $_SERVER['REQUEST_METHOD'];
		self::$uri = $_SERVER["REQUEST_URI"];
		self::$segments = self::segments();
		self::$get = $_GET;
		self::$post = $_POST;

		// if (self::$method === 'GET')
		// else if (self::$method === 'POST')
		// else if (self::$method === 'DELETE')
		// 	echo 'DELETE';
		// else
		// 	http_response_code(405);


	}
	public static function getInstance()
	{
		if (!self::$request)
			self::$request = new self();
		return self::$request;
	}
}