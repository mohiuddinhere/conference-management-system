<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function authorDashbordView(){
        return view('author.pages.author-dashbord');
    }

    public function authorPaperSubmission(){
        return view('author.pages.author-paper-submission');
    }
}
