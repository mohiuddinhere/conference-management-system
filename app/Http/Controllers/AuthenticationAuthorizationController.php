<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationAuthorizationController extends Controller
{
    public function createAccountViaLink(){
        return view('auth.pages.create-account-via-link');
    }
}
