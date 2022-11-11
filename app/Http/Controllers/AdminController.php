<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function websiteAdminCreateView()
    {
        return view('admin.pages.website-admin-cerate');
    }

    public function websiteAdminCreateStore(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $pass = $request->password;
        $confirmPass = $request->confirmPassword;

        if ($pass == $confirmPass) {
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => hash('sha1', $pass),
                'role' => 'admin'
            ]);
        }
        return redirect('login');
    }


    public function adminDashbord()
    {
        $totalUser = DB::table('users')->count();
        $totalConference = DB::table('conferences')->count();
        $totalUniversities = DB::table('universities')->count();

        // $chart = DB::table('users')->groupBy(DB::raw('DATE(created_at)'))->select('created_at',DB::raw('COUNT(id) as number'))->get();
        // $chart = DB::raw('SELECT DATE(created_at),COUNT(id) FROM users GROUP BY DATE(created_at)');
        // $c = DB::table('users')->selectRaw('select date(created_at),count(*) from users group by date(created_at)');
        // dd($chart);

        // select date(created_at),count(id) 
        // from users 
        // group by date(created_at)
        
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

        if (empty($name) || empty($email) || empty($pass) || empty($confirmPass) || empty($universityName) || empty($universityAddress)) {
            echo 'Fill all value';
        } else {
            if ($pass == $confirmPass) {
                DB::table('users')->insert([
                    'name' => $name,
                    'email' => $email,
                    'password' => hash('sha1', $pass),
                    'role' => 'uni_admin'
                ]);

                $user_id = DB::table('users')->where('email', '=', $email)->select('id')->first();

                DB::table('universities')->insert([
                    'user_id' => $user_id->id,
                    'name' => $universityName,
                    'address' => $universityAddress
                ]);

                $university_id = DB::table('universities')->where('name', '=', $universityName)->select('id')->first();

                DB::table('university_admins')->insert([
                    'user_id' => $user_id->id,
                    'university_id' => $university_id->id,
                ]);

                return redirect('admin/tables/uni-admin');
            } else {
                echo '!password';
            }
        }
    }
    //Register End

    //Tables
    public function universityAdminTableView()
    {
        $data = DB::table('users')->where('role', '=', 'uni_admin')->get();
        // dd($data);
        $totalUser = DB::table('users')->count();
        $totalConference = DB::table('conferences')->count();
        $totalUniversities = DB::table('universities')->count();

        return view(
            'admin.pages.admin-table',
            [
                'total_user' => $totalUser,
                'total_conference' => $totalConference,
                'total_universities' => $totalUniversities,
                'data' => $data
            ]
        );
    }

    public function universityTableView()
    {
        $totalUser = DB::table('users')->count();
        $totalConference = DB::table('conferences')->count();
        $totalUniversities = DB::table('universities')->count();
        $data = DB::table('universities')->get();

        return view(
            'admin.pages.university-table',
            [
                'data' => $data, 'total_user' => $totalUser,
                'total_conference' => $totalConference,
                'total_universities' => $totalUniversities,
            ]
        );
    }

    public function conferenceTableView()
    {
        $data = DB::table('users')->where('role', '=', 'uni_admin')->get();
        // dd($data);
        $totalUser = DB::table('users')->count();
        $totalConference = DB::table('conferences')->count();
        $totalUniversities = DB::table('universities')->count();

        $data = DB::table('conferences')->orderBy('submission_deadline', 'DESC')->get();
        // dd($data);
        return view(
            'admin.pages.conference-table',
            [
                'total_user' => $totalUser,
                'total_conference' => $totalConference,
                'total_universities' => $totalUniversities,
                'data' => $data
            ]
        );
    }

    public function authorTableView()
    {
        $data = DB::table('users')->where('role', '=', 'author')->get();
        // dd($data);
        $totalUser = DB::table('users')->count();
        $totalConference = DB::table('conferences')->count();
        $totalUniversities = DB::table('universities')->count();

        return view(
            'admin.pages.author-table',
            [
                'total_user' => $totalUser,
                'total_conference' => $totalConference,
                'total_universities' => $totalUniversities,
                'data' => $data
            ]
        );
    }

    public function reviewerTableView()
    {
        $data = DB::table('users')->where('role', '=', 'reviewer')->get();
        // dd($data);
        $totalUser = DB::table('users')->count();
        $totalConference = DB::table('conferences')->count();
        $totalUniversities = DB::table('universities')->count();

        return view(
            'admin.pages.reviewer-table',
            [
                'total_user' => $totalUser,
                'total_conference' => $totalConference,
                'total_universities' => $totalUniversities,
                'data' => $data
            ]
        );
    }
}
