<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Conference;
use App\Models\Track;
use App\Models\UniversityAdmin;
use App\Models\Users;


class UniversityAdministrationController extends Controller
{
    public function createConferencePaper()
    {
        return view('university-administration.pages.create-conference-paper');
    }

    public function storeConference(Request $r)
    {
        $user_id = $r->session()->get('user_id');
        $data = DB::table('university_admins')->where('user_id', '=', $user_id)->first();
        $university_id = $data->university_id;
        // dd($university_id);


        $title = $r->title;
        $submissionDeadline = $r->submissionDeadline;
        $conferenceDate = $r->conferenceDate;
        $track_name = $r->track_name;

        $conf = new Conference();
        $conf->university_id = $university_id;
        $conf->title = $title;
        $conf->submission_deadline = $submissionDeadline;
        $conf->conference_date = $conferenceDate;

        $conf->save();

        $conf_id = $conf->id;

        foreach ($track_name as $t) {
            $track = new Track();
            $track->name = $t;
            $track->conference_id = $conf_id;

            $track->save();
        }
        return redirect()->back()->with('success', 'Conference Created Successfully');
    }

    public function editConference($id)
    {
        $conf = new Conference();
        $conference = $conf->find($id)->first();

        $track = new Track();
        $t = $track->where('conference_id', '=', $id)->get();

        return view('university-administration.pages.edit-conference', ['conference' => $conference, 't' => $t]);
    }

    public function updateConference(Request $r, $id)
    {
        $title = $r->title;
        $submissionDeadline = $r->submissionDeadline;
        $conferenceDate = $r->conferenceDate;
        $track_name = $r->track_name;

        $conf = Conference::find($id);
        $conf->title = $title;
        $conf->submission_deadline = $submissionDeadline;
        $conf->conference_date = $conferenceDate;

        $conf->update();

        $conf_id = $conf->id;

        $track = Track::where('conference_id', $id)->delete();

        foreach ($track_name as $t) {
            $track = new Track();
            $track->name = $t;
            $track->conference_id = $conf_id;

            $track->save();
        }
        return redirect('uni-admin/conference-list');
    }

    public function showDashboard()
    {
        $user = new Users();
        $user_data = $user->where('role', 'uni_admin')->count();


        return view('university-administration.pages.dashboard', compact('user_data'));
    }

    public function conferenceList()
    {
        $conf = new Conference();
        $conferences = $conf->all();

        return view('university-administration.pages.conference-list', compact('conferences'));
    }

    public function createAdmin()
    {
        return view('university-administration.pages.create-admin');
    }

    public function storeAdmin(Request $r)
    {
        $name = $r->name;
        $email = $r->email;
        $password = $r->password;
        $confirmPassword = $r->confirmPassword;

        if ($password == $confirmPassword) {
            $obj = new Users();
            $obj->name = $name;
            $obj->email = $email;
            $obj->password = hash('sha1', $password);
            $obj->role = "uni_admin";

            if ($obj->save()) {

                $user_id = $r->session()->get('user_id');
                $university_id = DB::table('university_admins')->where('user_id', '=', $user_id)->first();
                $new_added_admin = DB::table('users')->where('email', '=', $email)->select('id')->first();
                DB::table('university_admins')->insert([
                    'user_id' => $new_added_admin->id,
                    'university_id' => $university_id->university_id,
                ]);

                return redirect()->back()->with('success', 'Registered Successfully');
            }
        }
    }

    public function adminList(Request $r)
    {
        $user_id = $r->session()->get('user_id');
        $university_id = DB::table('university_admins')
        ->where('user_id', '=', $user_id)->first();
        $university_id = $university_id->university_id;
        $data = DB::table('university_admins')
            ->rightJoin('users', 'users.id', '=', 'university_admins.user_id')
            ->where('university_id', '=', $university_id)
            ->get();
        // dd($university_id);

        return view('university-administration.pages.admin-list', compact('data'));
    }

    public function editAdmin($id)
    {
        $obj = new Users();
        $admins = $obj->find($id)->first();

        return view('university-administration.pages.edit-admin', compact('admins'));
    }

    public function updateAdmin(Request $r, $id)
    {
        $password = $r->password;
        $confirmPass = $r->confirmPassword;

        if ($password == $confirmPass) {
            $admin = Users::find($id);
            $admin->name = $r->name;
            $admin->email = $r->email;
            $admin->password = $password;
            $admin->role = "uni_admin";

            if ($admin->save()) {
                return redirect('uni-admin/admin-list');
            }
        }
    }

    public function deleteAdmin($id)
    {
        DB::table('university_admins')->where('user_id', '=', $id)->delete();
        DB::table('users')->where('id', '=', $id)->delete();

        return redirect('uni-admin/admin-list');
    }
}
