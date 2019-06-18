<?php

namespace App\Http\Controllers\index\course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class courseController extends Controller
{
    public function coursecont(Request $request){
        return view("index.course.coursecont");
    }
    public function coursecont1(Request $request){
        return view("index.course.coursecont1");
    }
    public function courselist(Request $request){
        return view("index.course.courselist");
    }
    //视频播放
    public function video(Request $request){
        return view("index.course.video");
    }
    //我的信息
    public function mycourse(){
        return view("index.course.mycourse");
    }
}