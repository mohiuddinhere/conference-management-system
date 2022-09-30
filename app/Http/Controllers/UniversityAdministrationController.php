<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;
use App\Models\Track;

class UniversityAdministrationController extends Controller
{
    public function createConferencePaper(){
        return view('university-administration.pages.create-conference-paper');
    }

    public function storeConference(Request $r){
        $title = $r->title;
        $submissionDeadline = $r->submissionDeadline;
        $conferenceDate = $r->conferenceDate;
        $track_name = $r->track_name;

        $conf = new Conference();
        $conf->title = $title;
        $conf->submission_deadline = $submissionDeadline;
        $conf->conference_date = $conferenceDate;
        
        $conf->save();

        $conf_id = $conf->id;

        foreach($track_name as $t){
            $track = new Track();
            $track->name = $t;
            $track->conference_id = $conf_id;

            $track->save();
        }

        return redirect()->back()->with('success', 'Conference Created Successfully');
        
    }

    public function showDashboard($user){
        return view('university-administration.pages.dashboard');
    }

    public function conferenceList(){
        return view('university-administration.pages.conference-list');
    }
}
