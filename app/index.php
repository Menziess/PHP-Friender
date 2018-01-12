<?php

namespace app;

include_once 'src/App.php';

echo 'App - Stefan Schenk';
echo '<pre>';

/**
 * Create app.
 */
$app = src\App::getInstance();

/**
 * All the classes that are used in this app.
 */
$app->autoload([
	"src/",
	"src/controller/",
]);

/**
 * Define routes with corresponding controller & methods.
 */
$app->routes([
	"/" => "HomeController@index",
	"/about" => "AboutController@index",
	"/contact" => "HomeController@index",
]);
