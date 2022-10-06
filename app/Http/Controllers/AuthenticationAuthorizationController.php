<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Session;

class AuthenticationAuthorizationController extends Controller
{
    public function createAccount($user)
    {
        error_log($user);
        return view('auth.pages.create-account', ['user' => $user]);
    }
    public function addUser(Request $request)
    {
        // dd($user);
        if ($request->user == 'uni_admin' || $request->user == 'author' || $request->user ==  'reviewer') {
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
                    "role" => $request->user
                ]);
            }
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

        $id = $data->id;
        $role = $data->role;


        $request->session()->put('user_id', $id); //Storing Session Data

        if ($role == 'admin') {
            return redirect('admin/dashbord');
        } elseif ($role == 'uni_admin') {
            return redirect('uni-admin/dashboard');
        } elseif ($role == 'author') {
            return redirect('author/dashboard');
        } elseif ($role == 'reviewer') {
            return redirect('reviewer/dashboard');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}
