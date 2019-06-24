<?php

namespace App\Http\Controllers\index\course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\user;
use App\models\detailed;
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
        $uid=session('u_id');
        $where=[
            'u_id'=>$uid
        ];
        $img = user::where($where)->pluck('u_img')->toarray();
        return view("index.course.mycourse",['img'=>$img[0]]);
    }
    //修改密码
    public function myrepassword(){
        $uid=session('u_id');
        return view("index.course.myrepassword",['uid'=>$uid]);
    }
    //修改密码执行
    public function myrepasswordDo(Request $request){
        $old_pwd=$request->input('u_pwd');
        $new_pwd=$request->input('u_pwds');
        $u_id=$request->input('uid');
        $where=[
            'u_id'=>$u_id
        ];
        $Info=user::where($where)->first()->toarray();
        if($Info['u_pwd']!=md5($old_pwd)){
            return json_encode(['code'=>4003,'msg'=>'密码错误']);die;
        }
        $pwdData=[
            'u_pwd'=>md5($new_pwd)
        ];
        $res=user::where(['u_id'=>$u_id])->update($pwdData);
        if($res){
            return json_encode(['code'=>200,'msg'=>'修改成功']);
        }else{
            return json_encode(['code'=>5003,'msg'=>'修改失败']);die;
        }
    }
    //修改信息
    public function detail(){
        $uid=session('u_id');
        $where=[
            'u_id'=>$uid
        ];
        $userInfo =user::where($where)->first();
        $detailInfo=detailed::where($where)->first();
        $data=[
            'userInfo'=>$userInfo,
            'detailInfo'=>$detailInfo
        ];
        return view('index.course.mysetting',$data);
    }
    public function detailDo(Request $request){

    }
}






