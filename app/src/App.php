<?php

namespace app\src;

include_once 'src/Router.php';

class App {

	/**
	 * Application.
	 */
	private static $app;
	private static $env;

	/**
	 * On construction.
	 */
	protected function __construct() {
		if (!self::readEnv())
			throw new Exception(".env cannot be read.");
		ini_set('display_errors', self::$env['app']["environment"] === "develop");
	}

	private static function readEnv() {
		$env = file_get_contents('.env');
		self::$env = json_decode($env, true);
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

?>