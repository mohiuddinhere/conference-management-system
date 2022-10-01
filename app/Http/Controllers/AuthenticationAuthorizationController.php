<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthenticationAuthorizationController extends Controller
{
    public function createAccount($user)
    {
        error_log($user);
        return view('auth.pages.create-account', ['user' => $user]);
    }
    public function addUser(Request $request)
    {
        // dd($request);
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $confirmpassword = $request->confirmPassword;

        if ($password == $confirmpassword) {
            $password = hash('sha1', $password);

            $id = DB::table('users')->insert([
                "name" => $name,
                "email" => $email,
                "password" => $password,
                "role" => "uni_admin"
            ]);
        }
    }

    public function loginView()
    {
        return view('auth.pages.login-view');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = hash('sha1', $request->password);
        $data = DB::table('users')->where('email', '=', $email)->where('password', '=', $password)->first();
        $role = $data->role;
        if($role == 'admin'){
            return redirect('admin/dashbord');
        }elseif($role == 'uni_admin') {
            return redirect('dashboard/uni-admin');
        }elseif($role == 'auther'){
            return redirect('dashboard/{user}');
        }elseif($role == 'reviewer'){
            return redirect('dashboard/{user}');
        }
    }
}
