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
	 * Printing usefull information.
	 */
	public static function debug($string) {
		if (self::$env['app']["debug"])
			print '<pre>' . $string . '</pre>';
	}

	/**
	 * Load php class.
	 */
	public static function load($className)
	{
		if (file_exists($className))
			require_once $className;
	}

	/**
	 * Read environmental variables file.
	 */
	public static function env()
	{
		if (self::$env)
			return self::$env;
		$env = file_get_contents('.env');
		self::$env = json_decode($env, true);
		return self::$env;
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
	 * Get request instance.
	 */
	public function request()
	{
		return Request::getInstance();
	}

	/**
	 * Autoloader loads defined directories.
	 */
	public static function autoload($dirs = [])
	{
		self::debug('AUTOLOAD:<br>');

		# Iterate over all provided directories.
		foreach ($dirs as $dir) {

			self::debug(' - ' . $dir . '<br>');

			# Get filenames with php extension.
			$files = array_filter(scandir($dir), function($filename) {
				$parts = explode('.', $filename);
				return \is_array($parts) && end($parts) === 'php';
			});

			# Iterate over all files in directory.
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
	 * Initializes other singletons.
	 */
	private static function init()
	{
		if (!Request::getInstance())
			throw new \Exception("Request could not be created.");
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
			self::$app = new self();
		return self::$app;
	}
}