<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationAuthorizationController extends Controller
{
    public function createAccount($user){
        return view('auth.pages.create-account');
    }
}
