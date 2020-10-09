<?php 

use Core\Route;

$route = new Route;

// segment regexp
$num = "([\d]+)";
$str = "([\w-]+)";

// web routes
$route->get('', "HomeController@index");