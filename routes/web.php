<?php 

use Core\Route;

$route = new Route;

// segment regexp
$num = "([\d]+)";
$str = "([\w-]+)";

// web routes
$route->get('', "HomeController@index");
$route->get('contact-us', "ContactController@index");
$route->post('contact-us/send', "ContactController@send");
$route->get("books/page/$num", "BookController@index");

// auth routes
$route->get("register", "AuthController@register");
$route->post("do-register", "AuthController@doRegister");

$route->get("login", "AuthController@login");
$route->post("do-login", "AuthController@doLogin");

$route->get("logout", "AuthController@logout", "UserAuth");

// cart and order routes
$route->get("cart/add/$num", "CartController@add");
$route->get("cart", "CartController@index", "UserAuth");
$route->post("cart/store", "CartController@store", "UserAuth");
$route->get("cart/empty", "CartController@empty", "UserAuth");


$route->get("dashboard", "AdminHomeController@index");

