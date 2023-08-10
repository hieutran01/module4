<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getLogin(){
        return 'login page here.';
    }
    public function getProfile(){
        return redirect()->route('login');

    }
}
