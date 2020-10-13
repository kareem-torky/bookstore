<?php 

namespace app\Controllers;

use App\Models\Message;
use Core\View;
use App\Models\Setting;
use Core\Request;
use Core\Session;
use Core\Validation\Validator;
use Core\Db;
use App\Middlewares\UserAuth;

class BookController 
{
    public function index()
    {
        UserAuth::handle(new Request);

        $data['books'] = Db::getInstance()->joinTables(['books', 'authors'])
        ->selectMultiple([
            'books' => ['id', 'name', 'img', 'price'],
            'authors' => ['id', 'name'],
        ])->on([
            ['books.author_id', 'authors.id'],
        ])->get();

        View::load("web/books/index", $data);
    }

}