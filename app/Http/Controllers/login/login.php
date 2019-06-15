<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class login extends Controller
{
    //登陆视图
    public function login(){
        return view("login.login");
    }
    //登陆执行
    public function login_do(){

    }
    //管理员添加视图
    public function admin(){
        return view("login.admin");
    }
    //管理员添加执行
    public function admin_add(){

    }
    //管理员展示
    public function admin_show(){
        return view("login.admin_show");
    }
    //管理员删除
    public function admin_del(){

    }
    //管理员修改视图
    public function admin_update(){
        return view("login.admin_update");
    }
    //管理员修改执行
    public function admin_update_do(){

    }
}
