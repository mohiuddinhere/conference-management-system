<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller{
    
    public function conferenceArrangementRequests(){
        return view('admin.pages.conference-arrangement-request');
    }
}
