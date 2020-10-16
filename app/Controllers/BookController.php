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
use App\Models\Book;

class BookController 
{
    public function index($page)
    {
        $page_length = 3;
        $offset = ($page - 1) * $page_length;

        $data['page'] = $page;

        $books_total_num = Book::connectTable()
        ->select("COUNT(*) AS cnt")
        ->getOne()['cnt'];

        $data['pages_total_num'] = ceil($books_total_num / $page_length);

        if($page > $data['pages_total_num']) {
            $request = new Request;
            $request->redirect("books/page/1");
        }

        $data['books'] = Db::getInstance()->joinTables(['books', 'authors'])
        ->selectMultiple([
            'books' => ['id', 'name', 'img', 'price'],
            'authors' => ['id', 'name'],
        ])->on([
            ['books.author_id', 'authors.id'],
        ])->paginate($page_length, $offset);

        
        View::load("web/books/index", $data);
    }
}