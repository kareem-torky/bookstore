<?php 

namespace app\Controllers;

use Core\View;
use App\Models\Cat;
use App\Models\Book;

class HomeController 
{
    public function index()
    {
        $data['top_cats'] = Cat::connectTable()
            ->select("id, name, brief")
            ->where("is_top", "=", 1)
            ->get();

        $data['new_books'] = Book::connectTable()
            ->select("id, img, name, price")
            ->orderBy("created_at", "DESC")
            ->limit(6)
            ->get();

        View::load("web/index", $data);
    }
}