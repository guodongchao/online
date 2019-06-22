<?php

namespace App\Http\Controllers\index\course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\models\user;

class courseController extends Controller
{
    public function coursecont(Request $request){ //详细课程介绍
        return view("index.course.coursecont");
    }
    public function coursecont1(Request $request){    //章节,问答,资料区
        $u_id =$request->input("u_id",1);
        $culum_id =$request->input("culum_id",1);   //课程id
        $quest_id = $request->input("quest_id");    //查看问题的id

//        $secKey = "req".$quest_id;  //第二及以后的key值
        if($quest_id){
            $data = Redis::lrange($quest_id,0,-1);

        }else{
            $strKey = "clum_$culum_id";  //第一层
            $data = Redis::lrange($strKey,0,-1);
        }

        foreach($data as $key=>$val){
            $arr[] = Redis::hgetall($val);
        }
//        dump($arr);die;
        if(!isset($arr)){
            $arr=[];
        }

        return view("index.course.coursecont1",['data'=>$arr,'quest_id'=>$quest_id]);
    }
    public function courselist(Request $request){       //课程展示
        return view("index.course.courselist");
    }
    //视频播放
    public function video(Request $request){
        return view("index.course.video");
    }
    public function quest(Request $request){      //提出问题
        $u_id =$request->input("u_id",1);
        $content =$request->input("content");
        $contentInfo =$request->input("contentInfo");
        $culum_id =$request->input("culum_id");
        $quest_id = $request->input("quest_id");  //查看问题的id
        $time = time();
        $uniq = Redis::incr($u_id);

        $userInfo = user::where("u_id",$u_id)->first()->toArray();

        if($quest_id){   //第二层及以后
//            $hashKey = "secClum".$culum_id."uid".$u_id.$uniq;
            $secKey = "req".$quest_id;  //第二及以后的key值
            $hashKey = "sec".$quest_id;  //二次后的value
            Redis::lpush($secKey,$hashKey);

        }else{
            $hashKey = "clum".$culum_id."uid".$u_id.$uniq;   //第一层
            $strKey = "clum_$culum_id";  //第一层
            Redis::lpush($strKey,$hashKey);

        }
        echo $hashKey;
        $data = [
            'quest_title'=>$content,
            'quest_info'=>$contentInfo,
            'time'=>$time,
            'quest_id'=>$hashKey
        ];
        $quest_id = $hashKey;
        $arr = array_merge($userInfo,$data);

        dump($arr);
        $res = Redis::hMset($hashKey,$arr);  //将问题存入哈希里

        if($res){
            return ["code"=>100,"msg"=>"发布成功","quest_id"=>$quest_id,'arr'=>$arr];
        }else{
            return ["code"=>200,"msg"=>"发布失败","quest_id"=>$quest_id];
        }

    }

    public function questSecord(Request $request){   //第二次问题
        $quest_id = $request->input("quest_id");

        $u_id = $request->input("u_id",1);
        $secKey = "req".$quest_id;  //第二及以后的key值
        $questData = Redis::hgetall($quest_id);

        $data = Redis::lrange($secKey,0,-1);
//        dump($data);

        if($data) {
            foreach ($data as $value) {

                $arr[] = Redis::hgetall($value);
            }
        }else{
            $arr = [];
        }
//        dump($arr);
        $view = view("index.course.courseAjax",['data'=>$arr,'quest'=>$questData,'quest_id'=>$quest_id]);
        $content = response($view)->getContent();
        return $content;
    }
    //我的信息
    public function mycourse(){
        return view("index.course.mycourse");
    }
}