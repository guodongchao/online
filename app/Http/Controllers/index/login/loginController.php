<?php

namespace App\Http\Controllers\index\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class loginController extends Controller
{
    //登陆
    public function login(){
        return view("index.login.login");
    }
    //注册
    public function register(){
        return view("index.login.register");
    }
}