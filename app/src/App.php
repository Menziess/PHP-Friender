<?php

namespace app\src;

/**
 * Application singleton managing environment.
 */
class App {

	/**
	 * Application singleton is created by calling the getInstance method.
	 */
	private static $app;
	private static $env;

	/**
	 * Autoloader loads defined directories.
	 */
	public static function autoload($dirs = [])
	{
		self::debug('AUTOLOAD:<br>');

		foreach ($dirs as $dir) {

			self::debug(' - ' . $dir . '<br>');

			$files = array_diff(\scandir($dir), ['.', '..']);
			$files = array_filter($files, function($filename) {
				$parts = explode('.', $filename);
				return \is_array($parts) && end($parts) === 'php';
			});

			foreach ($files as $file) {
				if ($file === 'App.php')
					continue;
				self::debug("\t - " . $file . '<br>');
				self::load($dir . $file);
			}
		}

		# After required classes are autoloaded, the app is ready.
		self::init();
	}

	/**
	 * Printing usefull information.
	 */
	public static function debug($string) {
		if (self::$env['app']["debug"])
			echo '<pre>' . $string . '</pre>';
	}

	/**
	 * Loads class.
	 */
	public static function load($className)
	{
		if (file_exists($className)) {
			require_once $className;
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
	 * Adds array of routes to router and returns added routes.
	 */
	public function routes($array = [])
	{
		$router = Router::getInstance();
		$router->submit($array);
		return $router->routes();
	}

	/**
	 * Initializes other singletons.
	 */
	private static function init()
	{
		if (!Router::getInstance())
			throw new \Exception("Router could not be created.");

	}

	/**
	 * Construct App singleton.
	 */
	private function __clone() {}
	private function __wakeup() {}
	protected function __construct()
	{
		if (!self::env())
			throw new \Exception(".env cannot be read.");
		ini_set('display_errors',
			self::$env['app']["environment"] !== "production");
	}
	public static function getInstance()
	{
		if (!self::$app)
			self::$app = new static();
		return self::$app;
	}
}