<?php

namespace app;

include_once 'src/App.php';

/**
 * Create app.
 */
$app = src\App::getInstance();

/**
 * All the classes that are used in this app.
 */
$app->autoload([
	"src/",
	"src/model/",
	"src/controller/",
]);

/**
 * Define routes with corresponding controller & methods.
 */
$app->routes([
	"user" => "UserController@",
	"users" => "UserController@users",
	"signup" => "HomeController@signup",
	"signup2" => "HomeController@signup2",
	"login" => "HomeController@login",
	"home2" => "HomeController@home2"
]);
