<?php 

namespace app\Controllers;

use App\Models\User;
use App\Models\UserContact;
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
                'rules' => 'required|str'
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

            $session = new Session;
            $session->set("errors", $errors);
            $request->redirect("register");

        } else {

            $user_id = User::connectTable()->insert([
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ])->saveAndGetId();

            UserContact::connectTable()->insert([
                'user_id' => $user_id,
                'phone' => $phone,
                'address' => $address,
            ])->save();

            // store user data in session
            $request->redirect("");

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
                'rules' => 'required|str'
            ],
        ];

        $errors = Validator::make($request_prepared);

        if(! empty($errors)) {

            $session->set("errors", $errors);
            $request->redirect("login");

        } else {

            $user = User::connectTable()->select()
            ->where("email", "=", $email)
            ->getOne();

            if($user) {
                $db_password = $user['password'];
                $is_verified = password_verify($password, $db_password);
                if($is_verified) {
                    // store user data in session
                    $session->set("logged_user", $user);
                    
                    $request->redirect("");
                } else {
                    $errors = ["password not correct"];
                    $session->set("errors", $errors);  
                    $request->redirect("login");      
                }
            } else {
                $errors = ["there's no account for this email"];
                $session->set("errors", $errors);   
                $request->redirect("login"); 
            }
        }
    }
}
