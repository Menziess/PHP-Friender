<?php

namespace app\src;

class Request {

	private static $request;

	public static $method;
	public static $uri;
	public static $segments;

	public static $post;
	public static $get;
	public static $put;
	public static $cookie;

	/**
	 * Set url segments.
	 */
	private static function segments()
	{
		$segments = explode('?', self::$uri);
		$segments = explode('/', $segments[0]);
		App::debug("SEGMENTS:<br>");
		App::debug(" -" . implode(" /", $segments));
		return $segments;
	}

	/**
	 * Cleans array.
	 */
	private static function cleanArray($array)
	{
		return array_map(function($item) { return strip_tags($item);}, $array);
	}

	/**
	 * Construct Request singleton.
	 */
	private function __clone() {}
	private function __wakeup() {}
	protected function __construct() {
		self::$method 	= $_SERVER['REQUEST_METHOD'];
		self::$uri 		= $_SERVER["REQUEST_URI"];
		self::$segments = self::segments();
		self::$cookie 	= $_COOKIE;
		self::$get 		= $_GET;
		self::$post 	= self::cleanArray($_POST);

		# PUT is always a little complicated
		$put_data = file_get_contents("php://input");
		parse_str($put_data, $post_vars);
		self::$put = self::cleanArray($post_vars);

	}
	public static function getInstance()
	{
		if (!self::$request)
			self::$request = new self();
		return self::$request;
	}
}
