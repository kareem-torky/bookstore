<?php 

namespace app\Controllers;

use App\Models\Message;
use Core\View;
use App\Models\Setting;
use Core\Request;
use Core\Session;
use Core\Validation\Validator;
use Core\Db;

class BookController 
{
    public function index()
    {
        $data['books'] = Db::getInstance()->joinTables(['books', 'authors'])
        ->selectMultiple([
            'books' => ['id', 'name', 'img', 'price'],
            'authors' => ['id', 'name'],
        ])->on([
            ['books.author_id', 'authors.id'],
        ])->get();

        View::load("web/books/index", $data);
    }

    // public function send()
    // {
    //     // reading request data (Todo: refactor)
    //     $request = new Request;
    //     extract($_POST);

    //     // validation 
    //     $request_prepared = [
    //         [
    //             'name' => 'name',
    //             'value' => $name,
    //             'rules' => 'required|str'
    //         ],
    //         [
    //             'name' => 'email',
    //             'value' => $email,
    //             'rules' => 'required|email'
    //         ],
    //         [
    //             'name' => 'subject',
    //             'value' => $subject,
    //             'rules' => 'required|str'
    //         ],
    //         [
    //             'name' => 'message',
    //             'value' => $message,
    //             'rules' => 'required|str'
    //         ],
    //     ];

    //     $errors = Validator::make($request_prepared);

    //     if(! empty($errors)) {
    //         $session = new Session;
    //         $session->set("errors", $errors);
    //     } else {
    //         Message::connectTable()->insert([
    //             'name' => $name,
    //             'email' => $email,
    //             'subject' => $subject,
    //             'message' => $message,
    //         ])->save();
    //     }

    //     $request->redirect("contact-us");
    // }
}