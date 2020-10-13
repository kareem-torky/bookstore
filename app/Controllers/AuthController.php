<?php 

namespace app\Controllers;

use App\Middlewares\UserAuth;
use App\Models\User;
use App\Models\UserContact;
use Core\Auth;
use Core\View;
use Core\Request;
use Core\Session;
use Core\Validation\Validator;
use Core\Db;

class AuthController 
{
    public function register()
    {
        View::load("web/auth/register");
    }

    public function doRegister()
    {
        $session = new Session;
        $request = new Request;
        extract($_POST);

        // validation 
        $request_prepared = [
            [
                'name' => 'username',
                'value' => $username,
                'rules' => 'required|str'
            ],
            [
                'name' => 'email',
                'value' => $email,
                'rules' => 'required|email'
            ],
            // todo: password validation
            [
                'name' => 'password',
                'value' => $password,
                'rules' => 'required|password'
            ],
            [
                'name' => 'phone',
                'value' => $phone,
                'rules' => 'required|str'
            ],
            [
                'name' => 'address',
                'value' => $address,
                'rules' => 'required|str'
            ],
        ];

        $errors = Validator::make($request_prepared);

        if(! empty($errors)) {

            $session->set("errors", $errors);
            $request->redirect("register");

        } else {

           Auth::insertAndLogin($username, $email, $password, $phone, $address);

        }
    }

    public function login()
    {
        View::load("web/auth/login");
    }

    public function doLogin()
    {
        $request = new Request;
        $session = new Session;
        extract($_POST);

        // validation 
        $request_prepared = [
            
            [
                'name' => 'email',
                'value' => $email,
                'rules' => 'required|email'
            ],
            // todo: password validation
            [
                'name' => 'password',
                'value' => $password,
                'rules' => 'required|password'
            ],
        ];

        $errors = Validator::make($request_prepared);

        if(! empty($errors)) {

            $session->set("errors", $errors);
            $request->redirect("login");

        } else {
            Auth::attempt($email, $password);
        }
    }

    public function logout()
    {
        UserAuth::handle(new Request);
        Auth::logout();
    }
}
