<?php 

namespace app\Controllers;

use Core\View;
use App\Models\Cat;
use App\Models\Book;

class AdminHomeController 
{
    public function index()
    {
        View::load("admin/index");
    }
}