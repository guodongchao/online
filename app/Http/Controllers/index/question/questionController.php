<?php

namespace App\Http\Controllers\index\question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\CourseCate;
use App\models\question;
use Illuminate\Support\Facades\Redis;
class questionController extends Controller
{

    public function question1(Request $request){
        $arr=CourseCate::get();
        return view("index.question.question1",['arr'=>$arr]);
    }
    public function question11(Request $request){
        $c_id=$request->input('c_id');
        $u_id=1;
        $arr=question::where(['q_class'=>$c_id])->get();
        $num=count($arr);
        for($i=0;$i<$num;$i++){
            $val=array_shift($arr);
            $val=json_encode($val);
            Redis::zadd('question'.$u_id,$val);
        }

        echo json_encode('aa',true);
    }
    public function question2(Request $request){
        $arr=CourseCate::get();
        return view("index.question.question2",['arr'=>$arr]);
    }
    public function question3(Request $request){
        $arr=CourseCate::get();
        return view("index.question.question3",['arr'=>$arr]);
    }
    public function question4(Request $request){
        $arr=CourseCate::get();
        return view("index.question.question4",['arr'=>$arr]);
    }

}