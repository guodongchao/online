<?php
namespace App\Http\Middleware;

use Closure;
use App\models\power;
use App\models\adminrole;
use App\models\rolepower;
class AdminToken
{
    /**
     * 运行请求过滤器
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin_id=session('admin_id');
        $aurl= \Request::getRequestUri();
        if(empty($admin_id)&&$aurl!='/admin/login'){
            echo "<script> alert('请登录');parent.location.href='/admin/login'; </script>";exit;
        }
        $where=[
            'admin_id'=>$admin_id,
        ];
        $roleInfo=adminrole::where($where)->get()->toarray();
        foreach($roleInfo as $key=>$val){
            $rolewhere=[
                'role_id'=>$val['role_id']
            ];
            $powerInfo=rolepower::where($rolewhere)->get()->toarray();
        }
        $powerId=[];
        foreach($powerInfo as $k=>$v){
            $powerId[]=$v['power_id'];
        }
        $url=[];
        foreach($powerId as $k=>$v){
            $powurl=[
                'power_id'=>$v
            ];
            $powUrl=power::where($powurl)->pluck('power_url')->toarray();
            $url[]=$powUrl;
        }
        $is_fo=strpos($_SERVER['REQUEST_URI'],"?");
        if(empty($is_fo)){
            $Rurl= \Request::getRequestUri();
        }else{
            $Rurl= substr($_SERVER['REQUEST_URI'],0,strpos($_SERVER['REQUEST_URI'],"?"));
        }
        //echo strpos($_SERVER['REQUEST_URI'],"?");die;
        foreach($url as $k=>$v){
            foreach($v as $key=>$value){
                $url[$k]=$value;
            }
        }
        //print_r($url);die;
        if(!in_array($Rurl,$url)){
            echo "<script> alert('无权访问');parent.location.href='/admin/index'; </script>";exit;
        }
        return $next($request);
    }
}