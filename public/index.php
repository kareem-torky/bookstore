<?php

use Core\App;

require_once "../vendor/autoload.php";
require_once ROUTES . "web.php";

// $books = Core\Db::getInstance()->joinTables(['books', 'authors', 'cats'])
// ->selectMultiple([
//     'books' => ['id', 'name', 'img'],
//     'authors' => ['id', 'name'],
//     'cats' => ['id', 'name', 'brief'],
// ])->on([
//     ['books.author_id', 'authors.id'],
//     ['books.cat_id', 'cats.id'],
// ])->get();

// echo '<pre>';
// print_r($books);
// echo '</pre>';
$app = new App;