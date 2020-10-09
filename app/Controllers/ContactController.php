<?php 

namespace app\Controllers;

use Core\View;
use App\Models\Setting;
use Core\Request;
use Core\Validation\Validator;

class ContactController 
{
    public function index()
    {
        $data['sett'] = Setting::connectTable()
            ->select("email, phone, website, map, address")
            ->getOne();

        View::load("web/contact/index", $data);
    }

    public function send()
    {
        // reading request data (Todo: refactor)
        $request = new Request;
        $name = $request->post("name");
        $email = $request->post("email");
        $subject = $request->post("subject");
        $message = $request->post("message");

        // validation 
        $request_prepared = [
            [
                'name' => 'name',
                'value' => $name,
                'rules' => 'required|str'
            ],
            [
                'name' => 'email',
                'value' => $email,
                'rules' => 'required|email'
            ],
            [
                'name' => 'subject',
                'value' => $subject,
                'rules' => 'required|str'
            ],
            [
                'name' => 'message',
                'value' => $message,
                'rules' => 'required|str'
            ],
        ];

        $errors = Validator::make($request_prepared);

        echo '<pre>';
        print_r($errors);
        echo '</pre>';
    }
}