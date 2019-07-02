<?php

namespace App\Http\Controllers\index\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\user;
use Illuminate\Support\Facades\Redis;
use App\models\wx;

class loginController extends Controller
{
    //注册
    public function register()
    {
        return view("index.login.register");
    }

    public function only(Request $request)
    {
        $u_name = $request->input('u_name');
        $old_name = $request->input('old_name');
        $type = $request->input('type');
        if ($type == 1) {
            $where = [
                'u_name' => $u_name
            ];
            $res = user::where($where)->first();
        } else {
            $res = user::where('u_name', '!=', $old_name)->where(['u_name' => $u_name])->first();
        }
        if ($res) {
            return 1;
        } else {
            return 2;
        }
    }

    public function emailOnly(Request $request)
    {
        $u_email = $request->input('u_email');
        $old_email = $request->input('old_email');
        $type = $request->input('type');
        if ($type == 1) {
            $where = [
                'u_email' => $u_email
            ];
            $res = user::where($where)->first();
        } else {
            $res = user::where('u_email', '!=', $old_email)->where(['u_email' => $u_email])->first();
        }

        if ($res) {
            return 1;
        } else {
            return 2;
        }
    }

    public function registerDo(Request $request)
    {
        $u_email = $request->input('u_email');
        $u_name = $request->input('u_name');
        $u_pwd = $request->input('u_pwd');
        $data = [
            'u_email' => $u_email,
            'u_name' => $u_name,
            'u_pwd' => md5($u_pwd),
            'add_time' => time()
        ];
        $res = user::insert($data);
        if ($res) {
            return json_encode(['msg' => '添加成功', 'code' => 200]);
        } else {
            return json_encode(['msg' => '添加失败', 'code' => 403]);
        }
    }

    //登陆
    public function login()
    {
//        $appid = "wx31275c9ac738c18a";
//        $redirect_uri = urlEncode("http://dc.qianqianya.xyz/index/send");   //回调地址
//        $scope = "snsapi_userinfo";
//        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=$scope&state=STATE#wechat_redirect";
//        return view("index.login.login", ['url' => $url]);
        return view("index.login.login");

    }

    //第三方登录回调地址
    public function send(Request $request)
    {
        $appid = "wx31275c9ac738c18a";
        $secret = "54736d5a59cece1c81b3d7d9e3c71258";
        $arr = $request->input();
        $code = $arr['code'];
        $state = $arr['state'];
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $jsonData = file_get_contents($url);
        $data = json_decode($jsonData, true);
        $openid = $data['openid'];
        $token = $data['access_token'];
//        二维码微信直接登录
//        $userInfo = wx::where("openid", $openid)->first();
//        if (!$userInfo) {
//            $wx_id =  wx::insertGetId(['openid'=>$openid,'add_time'=>time()]);  //添加数据库
//        }else{
//            $wx_id = $userInfo->wx_id;
//        }
//        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=$token&openid=$openid&lang=zh_CN";
//        $userInfoJson = file_get_contents($url);
//        $userInfo = json_decode($userInfoJson,true);
//        $u_name = $userInfo['nickname'];
//        $img = $userInfo['headimgurl'];
//        session(['openid'=>$wx_id,'u_name'=>$u_name,'img'=>$img]);
//        Redis::set($state,$wx_id);

        //微信必须绑定微信才可
        $userInfo = user::where("u_openid", $openid)->first();

        if (!$userInfo) {
            //没绑定.存openid
            Redis::set($state,$openid);
//            $arr=['code'=>100,'msg'=>];
//            echo "<script>alert('未绑定,请先绑定')</script>";
//            return redirect("/index/bdlogin",['openid'=>$openid]);
        }else{
            //绑定.存u_id
            Redis::set("u_id",$userInfo->u_id);
//            echo "<script>alert('登录成功')</script>>";
//            $request->session()->put('account',$userInfo->u_name);
//            $request->session()->put('u_name',$userInfo->u_name);
//            $request->session()->put('u_id', $userInfo->u_id);
//            return redirect("/index/index");
        }


//        echo "<script>alert('登录成功')</script>>";
//        return redirect("/index/index");

            //return redirect("/index/index");


    }

    public function loginDo(Request $request)
    {
        $account = $request->input('u_name');
        $u_pwd = $request->input('u_pwd');
        $e = strpos($account, '@');
        if (!empty($e)) {
            $where = [
                'u_email' => $account
            ];
        } else {
            $where = [
                'u_name' => $account
            ];
        }
        $data = user::where($where)->first();
            if(empty($data) || $data->u_pwd!=md5($u_pwd)){

            if (empty($data) || $data->u_pwd!=md5($u_pwd)) {
                $resopnse = [
                    'code' => 50001,
                    'msg' => '账号或密码错误1！'
                ];
                echo json_encode($resopnse);
                die;
            } else {
                $request->session()->put('account', $account);
                $request->session()->put('u_name', $data['u_name']);
                $request->session()->put('u_id', $data['u_id']);

                $resopnse = [
                    'code' => 200,
                    'msg' => '登陆成功！'
                ];

                echo json_encode($resopnse);

            }
        }
    }

    public function getImg(Request $request){
        $state = MD5(time()).rand(1,10000);
        $appid = "wx31275c9ac738c18a";
        $redirect_uri = urlEncode("http://dc.qianqianya.xyz/index/send");   //回调地址
        $scope = "snsapi_userinfo";
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=$scope&state=$state#wechat_redirect";
        return view("index.login.getImg",['url'=>$url,'state'=>$state]);
    }

    public function is_log(Request $request){
        $state = $request->input("state");
        $value = Redis::get($state);
        $u_id =  Redis::get("u_id");

        if($value){
            return ['code'=>200,"msg"=>"请先绑定.$value"];   //有值,去绑定页面
        }
        if($u_id){
            return ["code"=>100,"msg"=>"登录成功"];    //u_id有值,已经绑定了
        }

    }
    public function bdweixinView(Request $request){
        return view("index.login.bdlogin");
    }


    public function bdweixin(Request $request){

        $account = $request->input('u_name');
        $u_pwd = $request->input('u_pwd');
        $openid = $request->input('openid');
        $result = user::where("u_openid",$openid)->first();
        dump($result);

        if(count($result)){
            $resopnse = [
                'code' => 101,
                'msg' => '抱歉！该微信账号已绑定其他账号'
            ];
            return $resopnse;
        }
        $e = strpos($account, '@');
        if (!empty($e)) {
            $where = [
                'u_email' => $account
            ];
        } else {
            $where = [
                'u_name' => $account
            ];
        }
        $data = user::where($where)->first();
        if($data) {
            //var_dump($where);die;
            if (empty($data) || $data->u_pwd!=md5($u_pwd)) {
                $resopnse = [
                    'code' =>100,
                    'msg' => '账号或密码错误1！'
                ];
               return $resopnse;
            } else {
                $res = user::where($where)->update(['u_openid'=>$openid]);
                if($res) {
                    $request->session()->put('account', $account);
                    $request->session()->put('u_name', $data['u_name']);
                    $request->session()->put('u_id', $data['u_id']);

                    $resopnse = [
                        'code' => 200,
                        'msg' => '绑定成功！'
                    ];
                }else{
                    $resopnse = [
                        'code' => 102,
                        'msg' => '网络错误！'
                    ];
                }
                return $resopnse;
            }
        }
    }
}