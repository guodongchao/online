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
        $u_id=1;
        $c_id=$request->input('c_id');
        $q_id=$request->input('q_id');
        if($q_id==0){
            $q_id=Redis::get('questions'.$u_id.$c_id);
            if($q_id==null){
                Redis::set('questions'.$u_id.$c_id,$q_id);
            }
        }else{
            $qq_id=Redis::get('questions'.$u_id.$c_id,$q_id);
            if($qq_id<=$q_id){
                Redis::set('questions'.$u_id.$c_id,$q_id);
            }
        }
        if($q_id==0.1){
            $q_id=0;
        }
        $info1=Redis::zrange('question'.$u_id.$c_id,0,0);
        if($info1==false){
            $arr=question::where(['q_class'=>$c_id])->get()->toArray();
            $nums=count($arr);
            for($i=0;$i<$nums;$i++){
                $val=array_shift($arr);
                $val=json_encode($val);
                Redis::zadd('question'.$u_id.$c_id,$i+1,$val);
            }
            $info1=Redis::zrange('question'.$u_id.$c_id,$q_id,$q_id);
            foreach($info1 as $k=>$v){
                $data[]=json_decode($v);
            }
            foreach($data as $k=>$v){
                $v->q_answer=explode(',',$v->q_answer);
            }
        }else{
            foreach($info1 as $k=>$v){
                $data[]=json_decode($v);
            }
            foreach($data as $k=>$v){
                $v->q_answer=explode(',',$v->q_answer);
            }
        }
        $num=Redis::ZCARD('question'.$u_id.$c_id);

        $info=[
            'data'=>$data,
            'num' =>$num,
            "q_id"=>$q_id+1,
            "c_id"=>$c_id
        ];

       return $info;
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