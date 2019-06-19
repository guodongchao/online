<?php

namespace App\Http\Controllers\admin\Teacher;

use Illuminate\Http\Request;
use App\models\teacher;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    //添加讲师视图
    public function teacher(Request $request){
        return view('admin.teacher.teacher');
    }
    //添加讲师执行
    public function teacher_do(Request $request){

    }
    //讲师视图
    public function teacher_list(Request $request){
        return view('admin.teacher.teacher_list');
    }
    //删除讲师
    public function teacher_del(Request $request){

    }
    //讲师修改视图
    public function teacher_update(Request $request){
        return view("admin.teacher.yeacher_update");
    }
    //讲师修改执行
    public function teacher_update_do(Request $request){

    }
}
