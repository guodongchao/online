<?php

namespace App\Http\Controllers\index\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index(){
        return view("index.index");
    }
    public function header1(){
        //判断有误用户登录
        $u_id = 0;
        return view("index.common1",['u_id'=>$u_id]);
    }
    public function header2(){
        //判断有误用户登录
        $u_id = 0;
        return view("index.common2",['u_id'=>$u_id]);
        
    }
    public function foot(){
        return view("index.foot");
    }
}
