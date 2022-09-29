<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UniversityAdministrationController extends Controller
{
    public function createConferencePaper(){
        return view('university-administration.pages.create-conference-paper');
    }

    public function showDashboard($user){
        return view('university-administration.pages.dashboard');
    }
}
