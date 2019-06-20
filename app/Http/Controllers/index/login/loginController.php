<?php

namespace App\Http\Controllers\index\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\user;
class loginController extends Controller
{
    //注册
    public function register(){
        return view("index.login.register");
    }
    public function only(Request $request){
        $u_name=$request->input('u_name');
        $where=[
            'u_name'=>$u_name
        ];
        $res=user::where($where)->first();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }
    public function emailOnly(Request $request){
        $u_email=$request->input('u_email');
        $where=[
            'u_email'=>$u_email
        ];
        $res=user::where($where)->first();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }
    public function registerDo(Request $request){
        $u_email=$request->input('u_email');
        $u_name=$request->input('u_name');
        $u_pwd=$request->input('u_pwd');
        $data=[
            'u_email'=>$u_email,
            'u_name'=>$u_name,
            'u_pwd'=>md5($u_pwd),
            'add_time'=>time()
        ];
        $res=user::insert($data);
        if($res){
            return json_encode(['msg'=>'添加成功','code'=>200]);
        }else{
            return json_encode(['msg'=>'添加失败','code'=>403]);
        }
    }
    //登陆
    public function login(){
        return view("index.login.login");
    }
    public function loginDo(Request $request){
        $account=$request->input('u_name');
        $u_pwd=$request->input('u_pwd');
        $e=strpos($account,'@');
        if(!empty($e)){
            $where=[
                'u_email'=>$account
            ];
        }else{
            $where=[
                'u_name'=>$account
            ];
        }
        $data = user::where($where)->first()->toarray();
        //var_dump($where);die;
        if(empty($data) || $data['u_pwd']!==md5($u_pwd)){
            $resopnse=[
                'code'=>50001,
                'msg'=>'账号或密码错误1！'
            ];
            echo json_encode($resopnse);die;
        }else{
            $resopnse=[
                'code'=>200,
                'msg'=>'登陆成功！'
            ];
            echo json_encode($resopnse);
        }
    }
}