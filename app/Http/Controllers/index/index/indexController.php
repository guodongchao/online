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
        $where = [
            'c_status'=>1,
        ];
       $cateData =  CourseCate::where("c_status",1)->where("c_parent_id","!=",0)
                 ->orderBy("c_cate_sort","desc")
                 ->select("c_cate_id","c_cate_name")
                 ->limit(4)->get()->toArray();
        foreach($cateData as $key=>$val){

            $cateData[$key]['culum'] = culum::where("culum_show",1)->where("c_cate_id",$val['c_cate_id'])->limit(8)->get()->toArray();
            foreach($cateData[$key]['culum'] as $k=>$v){
                $cateData[$key]['culum'][$k]['num'] = userculum::where("culum_id",$v['culum_id'])->count();

            }
        }

        return view("index.index.main",['cateData'=>$cateData]);
    }
    //退出
    public function quit(){
        session()->flush('acount');
        header('refresh:0.2,/index/index');
    }

    //支付订单展示
    public function show(Request $request){
        $culum_id=$_REQUEST['culum_id'];
        $data = culum::where('culum_id',$culum_id)->first()->toarray();
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
    //异步
    public function result(){
        $arr=$_REQUEST;

        $configAll=app_path()."/extend/alipay/config.php";
//        $add=app_path()."/extend/alipay/wappay/service/AlipayTradeService.php";
//        require_once($add);
        $config=require_once($configAll);
        $alipaySevice = new \AlipayTradeService($config);
        $alipaySevice->writeLog(var_export($_REQUEST,true));
        $result = $alipaySevice->check($arr);

        $str=var_export($result,true);
        file_put_contents("/tmp/alipay.log",$str,FILE_APPEND);
        if($result) {//验证成功


            if(empty($arr)){
//                echo '该订单号不存在';die;
            }
            //支付宝交易号
            $total_amount = $_POST['total_amount'];
            if($arr['order_amount']==$total_amount){
//                echo '该订单的价格存在异常';die;
            }
//            $trade_no = $_POST['trade_no'];
//
//            //交易状态
//            $trade_status = $_POST['trade_status'];



            if($_POST['trade_status'] == 'TRADE_FINISHED') {

            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {

            }


            echo "success";		//请不要修改或删除

        }else {
            //验证失败
            echo "fail";	//请不要修改或删除

        }
    }
}
