<?php

namespace app\src;

class Request {

	private static $request;

	public static $method;
	public static $uri;

	/**
	 * Construct Request singleton.
	 */
	private function __clone() {}
	private function __wakeup() {}
	protected function __construct() {
		self::$method = $_SERVER['REQUEST_METHOD'];
		self::$uri = $_SERVER["REQUEST_URI"];
	}
	public static function getInstance()
	{
		if (!self::$request)
			self::$request = new self();
		return self::$request;
	}
}