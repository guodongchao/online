<?php

namespace App\Http\Controllers\index\teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class teacherController extends Controller
{
    //讲师信息
    public function teacher(){
        return view("index.teacher.teacher");
    }
    //优秀讲师
    public function teacherlist(){
        return view("index.teacher.teacherlist");
    }
}