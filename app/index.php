<?php

namespace app;

include_once 'src/App.php';

echo 'Application - Stefan Schenk';
echo '<pre>';

/**
 * Create application.
 */
$app = src\App::getInstance();

$app->routes([
	"/" => "index",
]);
