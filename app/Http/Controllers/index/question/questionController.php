<?php

namespace App\Http\Controllers\index\question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\CourseCate;
class questionController extends Controller
{

    public function question1(Request $request){
        $arr=CourseCate::get();
        return view("index.question.question1",['arr'=>$arr]);
    }
    public function question2(Request $request){
        return view("index.question.question2");
    }
    public function question3(Request $request){
        return view("index.question.question3");
    }
    public function question4(Request $request){
        return view("index.question.question4");
    }
    public function question5(Request $request){
        return view("index.question.question5");
    }
    public function question6(Request $request){
        return view("index.question.question6");
    }

}