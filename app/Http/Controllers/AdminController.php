<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function adminDashbord()
    {
        $totalUser = DB::table('all_users')->count();
        $totalConference = DB::table('conferences')->count();
        $totalUniversities = DB::table('universities')->count();

        return view(
            'admin.pages.admin-dashbord',
            [
                'total_user' => $totalUser,
                'total_conference' => $totalConference,
                'total_universities' => $totalUniversities
            ]
        );
    }

    //Register
    public function universityAdminRegister()
    {
        return view('admin.pages.university-admin-register');
    }

    public function universityAdminAdd(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $pass = $request->password;
        $confirmPass = $request->confirmPassword;

        $universityName = $request->univarsity_name;
        $universityAddress = $request->address;

        if ($pass == $confirmPass) {
            DB::table('all_users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => hash('sha1', $pass),
                'role' => 'uni_admin'
            ]);

            $data = DB::table('all_users')->where('email', '=', $email)->select('id')->first();

            DB::table('universities')->insert([
                'user_id' => $data->id,
                'name' => $universityName,
                'address' => $universityAddress
            ]);
        }
        return redirect('admin/tables/uni-admin');
    }
    //Register End

    public function universityAdminTableView(){
        $data = DB::table('all_users')->where('role', '=', 'uni_admin')->get();
        // dd($data);
        return view('admin.pages.admin-table', ['data' => $data]);
    }
}
