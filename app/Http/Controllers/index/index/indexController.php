<?php

namespace App\Http\Controllers\index\index;

use App\models\record;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\CourseCate;
use App\models\culum;
use App\models\userculum;


class indexController extends Controller
{
    public function index(){
        return view("index.index.index");
    }
    public function header1(){
        return view("index.index.header1");
    }
    public function header2(){
        return view("index.index.header2");
    }
    public function main(){
        if(file_exists("./online/main.html")){
            $view=file_get_contents("./online/main.html");
        }else{
            $where = [
                'c_status'=>1,
            ];
            $cateData =  CourseCate::where($where)->where("c_parent_id","!=",0)
                ->orderBy("c_cate_sort","desc")
                ->select("c_cate_id","c_cate_name")
                ->limit(4)->get()->toArray();
            foreach($cateData as $key=>$val){

                $cateData[$key]['culum'] = culum::where("culum_show",1)->where("c_cate_id",$val['c_cate_id'])->limit(8)->get()->toArray();
                foreach($cateData[$key]['culum'] as $k=>$v){
                    $cateData[$key]['culum'][$k]['num'] = userculum::where("culum_id",$v['culum_id'])->count();

                }
            }
            $view=view("index.index.main",['cateData'=>$cateData]);
            file_put_contents("./online/main.html",$view);
        }
        return $view;
    }
    //退出
    public function quit(){
        session()->flush('acount');
        session()->flush('u_id');
        return ['code'=>1];
    }

    //支付订单展示
    public function show(Request $request){
        $arr['culum_id']=$_REQUEST['culum_id'];
        $arr['u_id'] = session("u_id");
        if(!$arr['u_id']){
            echo "<script>alert('未登录,请先登录');location.href='login'</script>";
            die;
        }
        $arr['order_sn']=MD5(rand(1,9999).time());
        $data = culum::where('culum_id',$arr['culum_id'])->first()->toArray();
        $arr['record_name']= $data['culum_name'];
        $arr['record_img'] = $data['culum_img'];
        $arr['create_time'] = time();
        $arr['pay_name'] = "支付宝";
        $arr['total'] = $data['culum_price'];

        $res = record::insert($arr);
        return view('index.index.show',['arr'=>$data]);
    }
    //支付执行
    public function addshow(Request $request){
        $arr=$request->input();
        $orderSn=$arr['WIDout_trade_no'];
        $orderName=$arr['WIDsubject'];
        $orderMoney=$arr['WIDtotal_amount'];
        $orderDesc=$arr['WIDbody'];
        $timeout_express="1m";

        $payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
        $payRequestBuilder->setBody($orderDesc);
        $payRequestBuilder->setSubject($orderName);
        $payRequestBuilder->setOutTradeNo($orderSn);
        $payRequestBuilder->setTotalAmount($orderMoney);
        $payRequestBuilder->setTimeExpress($timeout_express);

        $configAll=app_path()."/extend/alipay/config.php";
        $config=require_once($configAll);

        $payResponse = new \AlipayTradeService($config);

        $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);
    }

    public function sync(){
        echo "<script>alert('支付成功');location.href='courselist'</script>";
    }
    //异步
    public function result(){
        $arr=$_REQUEST;

        $configAll=app_path()."/extend/alipay/config.php";

        $config=require_once($configAll);
        $alipaySevice = new \AlipayTradeService($config);
        $alipaySevice->writeLog(var_export($_REQUEST,true));
        $result = $alipaySevice->check($arr);

        $str=var_export($result,true);
        file_put_contents("/tmp/alipay.log",$str,FILE_APPEND);

        if($result) {//验证成功

            $out_trade_no = $arr['out_trade_no'];                       //商户订单号

            $order_amount = $arr['total_amount'];                         //交易金额

            if($arr['trade_status'] == 'TRADE_FINISHED') {               //交易状态失败

            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {                 //交易状态成功

                $where = [
                    "order_sn"=>$out_trade_no,
                    "total"=>$order_amount
                ];
                $res = record::where($where)->first();

                if($res){

                    $res2 = record::where( $where )->update(['status'=>2]);               //修改订单表中的数据

                    $data=record::where('order_sn',$out_trade_no)->first();
                    $inserData=[
                        'u_id'=>$data->u_id,
                        'culum_id'=>$data->culum_id,
                        'user_culum_time'=>time()
                    ];
                    userculum::insert($inserData);           //修改订单详情表中的状态

                    echo "success";       //请不要修改或删除
                }else{

                }
            }

            echo "success";       //请不要修改或删除

        }else {
            //验证失败
            echo "fail";   //请不要修改或删除

        }

    }

    //微信支付
    public function weixin_buy(Request $request){
        $arr['culum_id']=$request->input("culum_id");
        $arr['u_id'] = session("u_id");
        if(!$arr['u_id']){
            echo "<script>alert('未登录,请先登录');location.href='login'</script>";
            die;
        }
        $arr['order_sn']=MD5(rand(1,9999).time());
        $data = culum::where('culum_id',$arr['culum_id'])->first();
        $arr['record_name']= $data->culum_name;
        $arr['record_img'] = $data->culum_img;
        $arr['create_time'] = time();
        $arr['pay_name'] = "微信";
        $arr['total'] = "0.01";

        $res = record::insert($arr);

        $url="https://api.mch.weixin.qq.com/pay/unifiedorder";
        $string=md5(time());
        $key="7c4a8d09ca3762af61e59520943AB26O";
//        $order_sn=date("YmdHim",time());
        $ip=$_SERVER['REMOTE_ADDR'];
        $notify_url="http://dc.qianqianya.xyz/index/donative";
        $arr=[
            'appid'=>'wxd5af665b240b75d4',
            'mch_id'=>1500086022,
            'nonce_str'=>$string,
            'sign_type'=>"MD5",
            'body'=>'您好',
            'out_trade_no'=>$arr['order_sn'],
            'total_fee'=>1,
            'spbill_create_ip'=>$ip,
            'notify_url'=>$notify_url,
            'trade_type'=>"NATIVE"
        ];
        ksort($arr);
        $str=urldecode(http_build_query($arr));
        $str.="&key=$key";
        $sign=md5($str);
        $arr['sign']=$sign;
        $obj=new \weixin();
        $arrInfo=$obj->arr2Xml($arr);
        $info=$obj->sendPost($url,$arrInfo);
        $objXml=simplexml_load_string($info);
        $codeurl=$objXml->code_url;
        return view('index.index.native',['codeurl'=>$codeurl]);
    }
    public function donative(){    //异步
        date_default_timezone_set('prc');
        $xml=file_get_contents("php://input");
        $arr=json_decode(json_encode(simplexml_load_string($xml,'simpleXMLElement',LIBXML_NOCDATA)),true);
        file_put_contents("/tmp/weixin1.log",$arr,FILE_APPEND);
        $sign=$arr['sign'];
        unset($arr['sign']);
        $newSign=$this->checkSign($arr);
        $newSign=strtoupper($newSign);
        $order_sn=$arr['out_trade_no'];
        if($sign==$newSign){
            $res=record::where('order_sn',$order_sn)->update(['status'=>2]);
            $data=record::where('order_sn',$order_sn)->first();
            $inserData=[
                'u_id'=>$data->u_id,
                'culum_id'=>$data->culum_id,
                'user_culum_time'=>time()
            ];
            userculum::insert($inserData);
        }
    }
    //获取sign
    public function checkSign($arr){
        ksort($arr);
        $str=urldecode(http_build_query($arr));
        $key="7c4a8d09ca3762af61e59520943AB26O";
        $str.="&key=$key";
        $sign=md5($str);
        return $sign;
    }
}
