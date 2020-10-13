<?php 

namespace App\Middlewares;

use Core\Auth;

class UserAuth
{
    public static function handle($request)
    {
        if(! Auth::check()) {
            $request->redirect("login");
            die();
        }
    }
}