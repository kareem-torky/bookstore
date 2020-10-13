<?php 

namespace Core;
use App\Models\User;
use App\Models\UserContact;

class Auth 
{
    public static function attempt(string $email, string $password)
    {
        $request = new Request;
        $session = new Session;

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

    public static function insertAndLogin($username, $email, $password, $phone, $address)
    {
        $request = new Request;
        $session = new Session;

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
        $user = User::connectTable()->select()
        ->where("id", "=", $user_id)
        ->getOne();

        $session->set("logged_user", $user);

        $request->redirect("");
    }

    public static function logout()
    {
        $request = new Request;
        $session = new Session;

        $session->remove("logged_user");
        $request->redirect("");
    }

    public static function check()
    {
        $session = new Session;
        return $session->has("logged_user");
    }
}