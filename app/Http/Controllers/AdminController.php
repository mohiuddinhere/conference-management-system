<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller{
    
    public function adminDashbord(){
        return view('admin.pages.admin-dashbord');
    }

    public function universityAdminRegister(){
        return view('admin.pages.university-admin-register');
    }

    public function universityAdminAdd(Request $request){
        // dd($request);
        $name = $request->name;
        $email = $request->email;
        $pass = $request->password;
        $confirmPass = $request->confirmPassword;

        $universityName = $request->univarsity_name;
        $universityAddress = $request->address;

        if($pass == $confirmPass){
            $id = DB::table('all_users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => hash('sha1',$pass),
                'role' => 'uni_admin'
            ]);

            DB::table('universities')->insert([
                'user_id' => $id,
                'name' => $universityName,
                'address' => $universityAddress
            ]);

        }

    }
}
