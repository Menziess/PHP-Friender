<?php

namespace app;

include_once 'src/App.php';

echo 'App - Stefan Schenk';
echo '<pre>';

/**
 * Create application.
 */
$app = src\App::getInstance();

$app->autoload([
	// "src/controller/",
]);

$app->routes([
	"/" => "HomeController@index",
	"/about" => "HomeController@index",
	"/contact" => "HomeController@index",
]);
