<?php

namespace App\Http\Controllers\index\question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\CourseCate;
use App\models\question;
use App\models\records;
use App\models\mistake;
use App\models\collection;
use Illuminate\Support\Facades\Redis;
class questionController extends Controller
{

    public function question1(Request $request){
        $arr=CourseCate::get();
        return view("index.question.question1",['arr'=>$arr]);
    }
    public function question11(Request $request){
//        $u_id=session('u_id');
//        $u_id=1;
        $u_id=session('u_id');
        if(empty($u_id)){
            $info=[
                'error'=>5000,
                'msg'   =>'请先登录'
            ];
            return $info;
        }
        $c_id=$request->input('c_id');
        $q_id=$request->input('q_id');
        $key='question';
        $keys='questions';
        if($q_id==0){
            $q_id=Redis::get($keys.$u_id.$c_id);
            if($q_id==null){
                Redis::set($keys.$u_id.$c_id,$q_id);
            }
            if($q_id==''){
                $q_id=0;
            }
        }else{
            $qq_id=Redis::get($keys.$u_id.$c_id,$q_id);
            if($qq_id<=$q_id){
                Redis::set($keys.$u_id.$c_id,$q_id);
            }
        }
        if($q_id==0.1){
            $q_id=0;
        }
        $info1=Redis::zrange($key.$u_id.$c_id,$q_id,$q_id);
        if($info1==false){
            $arr=question::where(['q_class'=>$c_id])->get()->toArray();
            $nums=count($arr);
            for($i=0;$i<$nums;$i++){
                $val=array_shift($arr);
                $val=json_encode($val);
                Redis::zadd($key.$u_id.$c_id,$i+1,$val);
            }
            $info1=Redis::zrange($key.$u_id.$c_id,$q_id,$q_id);
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
        $num=Redis::ZCARD($key.$u_id.$c_id);

        $info=[
            'data'=>$data,
            'num' =>$num,
            "q_id"=>$q_id+1,
            "c_id"=>$c_id,
            'error'=>0,
            'msg'   =>'OK'
        ];

        return $info;
    }
    public function question2(Request $request){
        $arr=CourseCate::get();
        return view("index.question.question2",['arr'=>$arr]);
    }
    public function question22(Request $request){
        //$u_id=1;
        $u_id=session('u_id');
        if(empty($u_id)){
            $info=[
                'error'=>5000,
                'msg'   =>'请先登录'
            ];
            return $info;
        }
        $c_id=$request->input('c_id');
        $q_id=$request->input('q_id');

        $key='examination';
        $keys='examinations';
        if($q_id==0){
            $q_id=Redis::get($keys.$u_id.$c_id);
            if($q_id==null){
                Redis::set($keys.$u_id.$c_id,$q_id);
            }
            if($q_id==''){
                $q_id=0;
            }
        }else{
            $qq_id=Redis::get($keys.$u_id.$c_id,$q_id);
            if($qq_id<=$q_id){
                Redis::set($keys.$u_id.$c_id,$q_id);
            }
        }
        if($q_id==0.1){
            $q_id=0;
        }
        $info1=Redis::zrange($key.$u_id.$c_id,$q_id,$q_id);
        if($info1==false){
            $arr=question::where(['q_class'=>$c_id])->get()->toArray();
            $nums=count($arr);
            for($i=0;$i<10;$i++){
                $val=array_rand($arr);
                $vall=$arr[$val];
                unset($arr[$val]);
                $vall=json_encode($vall);
                Redis::zadd($key.$u_id.$c_id,$i+1,$vall);
            }
            $info1=Redis::zrange($key.$u_id.$c_id,$q_id,$q_id);
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
           // var_dump($data);exit;
            foreach($data as $k=>$v){
                $v->q_answer=explode(',',$v->q_answer);
            }
        }
        $num=Redis::ZCARD($key.$u_id.$c_id);
        $info=[
            'data'=>$data,
            'num' =>$num,
            "q_id"=>$q_id+1,
            "c_id"=>$c_id,
            'error'=>0,
            'msg'   =>'OK'
        ];

        return $info;
    }
    public function question23(Request $request){
        //$u_id=1;
        $u_id=session('u_id');
        $c_id=$request->input('c_id');
        $q_id=$request->input('q_id');
        $q_id=$q_id-1;
        $radio=$request->input('radio');
        $key='examination';
        $keys='examinations';
        $info1=Redis::zrange($key.$u_id.$c_id,$q_id,$q_id);


        foreach($info1 as $k=>$v){
            $data[]=json_decode($v);
        }
        foreach($data as $kk=>$vv){
            $vv->t_result=$radio;
            $val=json_encode($vv);
        }

        //echo $key.$u_id.$c_id;
        //echo $q_id;
       // exit;
        Redis::ZREMRANGEBYRANK($key.$u_id.$c_id,$q_id,$q_id);
        Redis::zadd($key.$u_id.$c_id,$q_id+1,$val);
    }
    public function question24(Request $request){
       // $u_id=1;
        $u_id=session('u_id');
        $key='examination';
        $keys='examinations';
        $records='records';
        $type=$request->input('type');
        $c_id=$request->input('c_id');
        if($type==1){
        $score=$request->input('score');
        if($score>=90){
            $r_assess="优秀";
        }
        if($score>=60&&$score<90){
            $r_assess="及格";
        }
        if($score<60){
            $r_assess="不及格";
        }
        $c_cate_name=CourseCate::where(['c_cate_id'=>$c_id])->value('c_cate_name');
        $where=[
          'u_id'    =>$u_id,
          'r_grade' =>$score,
          'r_time'  =>time(),
          'r_assess'=>$r_assess,
          'c_cate_name'=>$c_cate_name
        ];
        $res=records::insert($where);


        $info1=Redis::zrange($key.$u_id.$c_id,0,-1);
        foreach($info1 as $k=>$v){
           $arr[]=json_decode($v);
        }
        $arr=json_encode($arr);
        $res=Redis::zadd($records.$u_id,$c_id,$arr);
        if($res){
            Redis::del($key.$u_id.$c_id);
            Redis::del($keys.$u_id.$c_id);
        }
        }
        if($type==2){
            Redis::del($key.$u_id.$c_id);
            Redis::del($keys.$u_id.$c_id);
        }
    }
    public function question3(Request $request){
        $u_id=session('u_id');
        $arr=records::where(['is_status'=>1,'u_id'=>$u_id])->paginate(5);
        return view("index.question.question3",['arr'=>$arr]);
    }
    public function question33(Request $request){
        $r_id=$request->input('r_id');
        $res=records::where(['r_id'=>$r_id])->update(['is_status'=>2]);
        if($res){
            $info=[
                'error'=>0,
                'msg'  =>"OK"
            ];
        }else{
            $info=[
                'error'=>5000,
                'msg'  =>"NO"
            ];
        }
        return $info;

    }
    public function question34(Request $request){
        $u_id=session('u_id');
        $q_id=$request->input('q_id');
        $radio=$request->input('radio');
        $arr=question::where(['q_id'=>$q_id])->first();
        //$hidden=$request->input('hidden');
        $where=[
          'q_name'    =>$arr->q_name,
          'q_result'=>$arr->q_result,
          'q_answer'=>$arr->q_answer,
          't_result'=>$radio,
          'u_id'    =>$u_id,
          'm_time'  =>time()
        ];
        $res=mistake::insert($where);
    }
    public function question4(Request $request){
        $u_id=session('u_id');
        $arr=mistake::where(['is_status'=>1,'u_id'=>$u_id])->paginate(5);
        return view("index.question.question4",['arr'=>$arr]);
    }
    public function question44(Request $request){
        $m_id=$request->input('m_id');
        $res=mistake::where(['m_id'=>$m_id])->update(['is_status'=>2]);
        if($res){
            $info=[
                'error'=>0,
                'msg'  =>"OK"
            ];
        }else{
            $info=[
                'error'=>5000,
                'msg'  =>"NO"
            ];
        }
        return $info;
    }
    public function question5(){
        $u_id=session('u_id');
        $arr=collection::where(['is_status'=>1,'u_id'=>$u_id])->get();
        foreach($arr as $k=>$v){
                $v->q_name=question::where(['q_id'=>$v->q_id])->value("q_name");
                $v->q_answer=question::where(['q_id'=>$v->q_id])->value("q_answer");
                $v->q_result=question::where(['q_id'=>$v->q_id])->value("q_result");
                $v->c_cate_name=CourseCate::where(['c_cate_id'=>question::where(['q_id'=>$v->q_id])->value("q_class")])->value("c_cate_name");
        }
        $arr=$arr->toArray();
        return view("index.question.question5",['arr'=>$arr]);
    }
    public function question55(Request $request){
        $u_id=session("u_id");
        $q_id=$request->input('q_id');
        $where=[
          'u_id'    =>$u_id,
          'q_id'    =>$q_id,
          'c_time'  =>time(),
        ];
        $arr=collection::where(['u_id'=>$u_id,'q_id'=>$q_id])->first();
        if($arr){
            $info=[
                'error'=>5000,
                'msg'  =>"请勿重复收藏"
            ];
        }else{
            $res=collection::insert($where);
            if($res){
                $info=[
                    'error'=>0,
                    'msg'  =>"OK"
                ];
            }else{
                $info=[
                    'error'=>5000,
                    'msg'  =>"NO"
                ];
            }
        }

        return $info;
    }
    public function question56(Request $request){
        $c_id=$request->input('c_id');
        $res=collection::where(['c_id'=>$c_id])->update(['is_status'=>2]);
        if($res){
            $info=[
                'error'=>0,
                'msg'  =>"OK"
            ];
        }else{
            $info=[
                'error'=>5000,
                'msg'  =>"NO"
            ];
        }
        return $info;
    }

}