<?php

namespace App\Http\Controllers\index\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index(){
        return view("index.index.index");
    }
    public function header1(){
        return view("index.index.header1");
    }
    public function header2(){
        return view("index.index.header2");
    }
    public function main(){
        return view("index.index.main");
    }
    public function quit(){
        session()->flush('acount');
        header('refresh:0.2,/index/index');
    }


}
