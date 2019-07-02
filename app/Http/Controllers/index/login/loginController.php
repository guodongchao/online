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
        $old_name=$request->input('old_name');
        $type=$request->input('type');
        if($type==1){
            $where=[
                'u_name'=>$u_name
            ];
            $res=user::where($where)->first();
        }else{
            $res=user::where('u_name','!=',$old_name)->where(['u_name'=>$u_name])->first();
        }
        if($res){
            return 1;
        }else{
            return 2;
        }
    }
    public function emailOnly(Request $request){
        $u_email=$request->input('u_email');
        $old_email=$request->input('old_email');
        $type=$request->input('type');
        if($type==1){
            $where=[
                'u_email'=>$u_email
            ];
            $res=user::where($where)->first();
        }else{
            $res=user::where('u_email','!=',$old_email)->where(['u_email'=>$u_email])->first();
        }

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
        $appid = "wx31275c9ac738c18a";
        $redirect_uri = urlEncode("http://dc.qianqianya.xyz/index/send");   //回调地址
        $scope ="snsapi_userinfo";
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=$scope&state=STATE#wechat_redirect";
        return view("index.login.login",['url'=>$url]);

    }

    //第三方登录回调地址
    public function send(Request $request){
        $appid = "wx31275c9ac738c18a";
        $secret = "54736d5a59cece1c81b3d7d9e3c71258";
        $arr = $request->input();
        $code = $arr['code'];
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $jsonData = file_get_contents($url);
        $data = json_decode($jsonData,true);
        $openid = $data['openid'];
        $userInfo = user::where("u_openid",$openid)->first();
        if($userInfo){
            return redirect("/index/index");
        }else{
            return "<script>alert('登录的微信号未绑定账号,请先绑定后再用此方式登录')</script>>";
        }

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
        $data = user::where($where)->first();
        //var_dump($where);die;
            if(empty($data) || $data->u_pwd!=md5($u_pwd)){
            $resopnse=[
                'code'=>50001,
                'msg'=>'账号或密码错误1！'
            ];
            echo json_encode($resopnse);die;
        }else{
            $request->session()->put('account',$account);
            $request->session()->put('u_id',$data['u_id']);
            $resopnse=[
                'code'=>200,
                'msg'=>'登陆成功！'
            ];
            echo json_encode($resopnse);

        }
    }
}