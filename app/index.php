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

	# User routes

	"user" => "UserController@",
	"signup" => "LoginController@signup",
	"login" => "LoginController@login",
	"logout" => "LoginController@logout",
	"settings" => "SettingsController@settings",

	# Pagina's

	"about" => "HomeController@about",
	"privacy" => "HomeController@privacy",
	"contact" => "HomeController@contact",

	# Questions

	"questions" => "QuestionController@questions",
	"testmatching" => "QuestionController@testmatching",

	# Events

	"events" => "EventController@events",

]);
