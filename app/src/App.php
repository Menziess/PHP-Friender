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
	protected function __construct()
	{
		if (!self::env())
			throw new \Exception(".env cannot be read.");

		ini_set('display_errors',
			self::$env['app']["environment"] !== "production");

		if (!self::router())
			throw new \Exception("Router could not be created.");
	}

	/**
	 * Autoloads directories.
	 */
	public static function autoload($dirs = [])
	{
		if (self::$env['app']["debug"]) {
			echo 'AUTOLOAD:<br>';
			foreach ($dirs as $dir) {
				echo ' - ' . $dir . '<br>';
			}
		}

		foreach ($dirs as $dir) {
			foreach (\scandir($dir) as $class) {
				self::load($class);
			}
		}
	}

	/**
	 * Loads class.
	 */
	public static function load($className)
	{
		if (file_exists($className . '.php')) {
			require_once $className . '.php';
			return true;
		}
		return false;
	}

	/**
	 * Read environmental variables file.
	 */
	public static function env()
	{
		if (static::$env)
			return static::$env;
		$env = file_get_contents('.env');
		static::$env = json_decode($env, true);
		return static::$env;
	}

	/**
	 * Add array of routes to router.
	 */
	public function routes($array = [])
	{
		self::$router->submit($array);
		return self::$router->routes();
	}

	/**
	 * Instantiate router.
	 */
	private static function router()
	{
		return self::$router = new Router();
	}

	/**
	 * Get app singleton.
	 */
	private function __clone() {}
	private function __wakeup() {}
	public static function getInstance()
	{
		if (!self::$app)
			self::$app = new static();
		return self::$app;
	}
}