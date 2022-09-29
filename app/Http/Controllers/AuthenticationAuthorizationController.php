<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthenticationAuthorizationController extends Controller
{
    public function createAccount($user){
        error_log($user);
        return view('auth.pages.create-account', ['user'=>$user]);
    }
    public function addUser(Request $request){
        // dd($request);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $confirmpassword = $request->confirmPassword;

        if($password == $confirmpassword){
            $password = hash('sha1',$password);

            $id = DB::table('all_users')->insert([
                "name" => $name,
                "email" => $email,
                "password" => $password,
                "role" => "uni_admin"
            ]);
        }
    }
}
