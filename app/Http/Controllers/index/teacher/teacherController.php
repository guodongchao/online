<?php

namespace App\Http\Controllers\index\teacher;

use App\models\chapter;
use App\models\hour;
use App\models\section;
use App\models\teacherdetails;
use App\models\culum;
use App\models\userculum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class teacherController extends Controller
{
    //讲师信息
    public function teacher(Request $request){
        $teacher_id=$request->input('teacher_id');
        $teacher=teacherdetails::where('teacher_id',$teacher_id)->first()->toarray();
        $where=[
            'teacher_id'=>$teacher_id,
            'is_del'=>1
        ];
        $culum=culum::where($where)->get()->toarray();
        foreach ($culum as $k=>$v){
            $culum[$k]['num']=userculum::where('culum_id',$v['culum_id'])->count();
            $culum[$k]['hour']=hour::where('culum_id',$v['culum_id'])->pluck('show_time')->toarray();
            $culum[$k]['hour_time']=array_sum($culum[$k]['hour']);
        }

        return view("index.teacher.teacher",['teacher'=>$teacher,'culum'=>$culum]);
    }
    //优秀讲师
    public function teacherlist(Request $request){
        $arr=teacherdetails::where('teacher_status',1)->get()->toarray();
        view("index.teacher.teacherlist",['teacher'=>$arr]);
    }
}