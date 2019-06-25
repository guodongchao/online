<?php

namespace App\Http\Controllers\index\teacher;

use App\models\chapter;
use App\models\hour;
use App\models\section;
use App\models\teacherdetails;
use App\models\culum;
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
            $arr[]=chapter::where('culum_id',$v['culum_id'])->join('section','chapter.chapter_id','=','section.chapter_id')->select('section_id')->get()->toarray();
        }
        foreach ($arr as $k=>$v){
            foreach ($v as $kk=>$vv){
                $arr[$k][$kk]['hour']=hour::where('section_id',$vv['section_id'])->get()->toarray();
            }
        }
        dump($arr);
        return view("index.teacher.teacher",['teacher'=>$teacher,'culum'=>$culum]);
    }
    //优秀讲师
    public function teacherlist(Request $request){
        $arr=teacherdetails::where('teacher_status',1)->get()->toarray();
        view("index.teacher.teacherlist",['teacher'=>$arr]);
    }
}