<?php

namespace app\src;

use app\src\model\User;
use app\src\model\Session;

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
	public static $session;

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
		session_start();

		# No cookie found
		if (!isset($credentials['friender']))
			return;

		# Get token from cookie and check database for session
		$token 	  = $credentials['friender'];
		$session  = Session::select(['user_id'])
							->where('token', '=', $token)
							->get();

		if (!isset($session))
			return User::logout();

		$auth = User::find($session->user_id);

		if (empty($auth))
			return User::logout();

		return $auth;
	}

	/**
	 * Set session variables.
	 *
	 * @return void
	 */
	private static function populateSession()
	{
		if (empty(self::$auth))
			return;

		$user = self::$auth;
		$_SESSION['token'] = $_COOKIE['friender'];
		$_SESSION['user_id'] = $user->id;
		$_SESSION['first_name'] = $user->first_name;
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
		self::$auth = 	self::validateAuthenticatedUser($_COOKIE);
						self::populateSession();
	}
	public static function getInstance()
	{
		if (!self::$request)
			self::$request = new self();
		return self::$request;
	}
}
