<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UniversityAdministrationController extends Controller
{
    public function createConferencePaper(){
        return view('university-administration.pages.create-conference-paper');
    }
}
