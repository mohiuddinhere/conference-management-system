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

    public function addAuthor(Request $request)
    {
        if ($request->user == 'author') {
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;
            $confirmpassword = $request->confirmPassword;

            //inserting all values to users table
            if ($password == $confirmpassword) {
                $password = hash('sha1', $password);

                $id = DB::table('users')->insert([
                    "name" => $name,
                    "email" => $email,
                    "password" => $password,
                    "role" => $request->user
                ]);
            }

            // getting user id from the users table
            $userId = DB::table('users')->where('email', $email)->value('id');
            // dd($userId);

            $dataInsert = DB::table('unique_identifiers')->insert([
                'users_uniqueIdentifier_id' => $userId,
                'author_orcidID' => random_int(1000000000000000, 9999999999999999)
            ]);
        }
        return redirect('login');
    }

    public function addUser(Request $request)
    {
        // dd($user);
        if ($request->user == 'uni_admin' || $request->user ==  'reviewer') {
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
        return redirect('login');
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
        $user_name = $data->name;


        $request->session()->put('user_id', $id); //Storing Session Data
        $request->session()->put('user_name', $user_name);
        $request->session()->put('role', $role);

        DB::table('traffic_logs')->insert(
            [
                'user_id' => $id
            ]
        );

        if ($role == 'admin') {
            return redirect('admin/dashboard');
        } elseif ($role == 'uni_admin') {
            return redirect('uni-admin/dashboard');
        } elseif ($role == 'author') {
            return redirect('author/dashboard');
        } elseif ($role == 'reviewer') {
            return redirect('reviewer/dashboard');
        } else {
            echo '!pass && email';
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}
