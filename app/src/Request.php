<?php

namespace app\src;

use app\src\model\User;

class Request {

	private static $request;

	public static $method;
	public static $uri;
	public static $segments;

	public static $post;
	public static $get;
	public static $put;
	public static $cookie;
	public static $files;

	public static $auth;

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
	 * Cleans array.
	 */
	private static function cleanArray($array)
	{
		return array_map(function($item) { return strip_tags($item);}, $array);
	}

	/**
	 * See if user credentials are correct, else logout.
	 *
	 * @param array $credentials
	 * @return void
	 */
	private static function validateAuthenticatedUser($credentials)
	{
		if (!isset($credentials['email']) || !isset($credentials['password']))
			return;

		$auth = User::select()
					->where("email", "=", $credentials['email'])
					->get();

		if (empty($auth))
			User::logout();

		# Relog if something changed
		if (isset($credentials['first_name']) &&
			$credentials['first_name'] !== $auth->first_name) {
			setcookie('first_name', $auth->first_name, 0, '/');
		}

		return $auth;
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
		self::$files 	= $_FILES;

		# PUT is always a little complicated
		$put_data = file_get_contents("php://input");
		parse_str($put_data, $post_vars);
		self::$put = self::cleanArray($post_vars);

		# Getting authenticated user per request
		self::$auth = self::validateAuthenticatedUser($_COOKIE);
	}
	public static function getInstance()
	{
		if (!self::$request)
			self::$request = new self();
		return self::$request;
	}
}
