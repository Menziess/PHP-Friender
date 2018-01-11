<?php

namespace app\src;

include_once 'Router.php';

/**
 * Application singleton managing environment.
 */
class App {

	/**
	 * Application.
	 */
	private static $app;
	private static $env;
	private static $router;

	/**
	 * On construction.
	 */
	protected function __construct() {
		if (!self::readEnv())
			throw new \Exception(".env cannot be read.");
		ini_set(
			'display_errors',
			self::$env['app']["environment"] === "develop");
		if (!self::createRouter())
			throw new \Exception("Router could not be created.");
	}

	/**
	 * Read environmental variables file.
	 */
	private static function readEnv() {
		$env = file_get_contents('.env');
		return static::$env = json_decode($env, true);
	}

	/**
	 * Create router.
	 */
	private static function createRouter() {
		return self::$router = new Router();
	}
	public function routes($array = []) {
		self::$router->submit($array);
	}

	/**
	 * Get app singleton.
	 */
	private function __clone() {}
	private function __wakeup() {}
	public static function getInstance() {
		if (!self::$app)
			self::$app = new static();
		return self::$app;
	}
}