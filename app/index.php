<?php

// namespace app;

// echo "yay1";
// include_once 'src/App.php';
ini_set("display_errors", 1);

// echo "yay2";
// $app = src\App::getInstance();

// echo "yay3";
// $router = new Router();

// var_dump($router->routes);

// $router->printRoutes();

// $router->go('/test');

// return $app;

include 'public/route.php';

echo 'starting up...';

$route = new Route();

$route->add('/');
$route->add('/about');
$route->add('/contact');


echo '<pre>';
print_r($route);

$route->submit();