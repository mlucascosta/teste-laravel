<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller{

    public function index(){
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->guest('/');
    }
}
