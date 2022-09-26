<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function authorPaperSubmission(){
        return view('author.pages.author-paper-submission');
    }
}
