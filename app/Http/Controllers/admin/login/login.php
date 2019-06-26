<?php

namespace App\Http\Controllers\admin\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\models\admin;
use App\models\role;
use App\models\adminrole;
class login
{
    //登陆视图
    public function login(){
        session_start();
        $sid = session_id();
        $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/admin/codelist/'.$sid;
        //print_r($url);die;
        $data = [
            'sid'   =>  $sid,
            'url'   =>  $url
        ];
        return view("admin.login.login",$data);
    }
    //生成验证码
    public function showCode(Request $request,$sid){
        session_id($sid);
        session_start();
        $str="2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY";
        $b=substr(str_shuffle($str),rand(4,20),4);
        $rand = $b ;
        $_SESSION = [
            'rand'  =>  $b
        ];
        // Set the content-type
        header('Content-Type: image/png');
        // Create the image
        $im = imagecreatetruecolor(120, 50);
        // Create some colors
        $white = imagecolorallocate($im, 255, 255, 255);
        $black = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 399, 50, $white);
        // The text to draw
        //$text = $rand;
        // Replace path by your own font path
        $font = '/usr/local/fonts/CAMBRIA.TTF';
        // Add some shadow to the text
        //imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);
        $len = strlen($rand);
        $i = 0;
        while($i<$len){
            // Add the text
            if(is_numeric($rand[$i])){
                imagettftext($im, 20, rand(-20,20), 20*$i, 40, $black, $font, $rand[$i]);
            }else{
                imagettftext($im, 20, 0 , 20*$i, 40, $black, $font, $rand[$i]);
            }
            $i++;
        }
        // Using imagepng() results in clearer text compared with imagejpeg()
        imagepng($im);
        imagedestroy($im);
        exit;
    }
    //登陆执行
    public function login_do(Request $request){
        $sid=$request->input('sid');
        $code=$request->input('code');
        session_id($sid);
        session_start();
        $count = $_SESSION['rand'];
        if($count!=$code){
            $response = [
                'status'    =>  400,
                'msg'       =>  '验证码错误',
            ];
            return json_encode($response);die;
        }
        $admin_name=$request->input('admin_name');
        $admin_pwd=$request->input('admin_pwd');
        $adminInfo=admin::where(['admin_name'=>$admin_name])->first();
        if(md5($admin_pwd)!=$adminInfo->admin_pwd){
            $response = [
                'status'    =>  400,
                'msg'       =>  '账号或密码错误',
            ];
            return json_encode($response);die;
        }else{
            $request->session()->put('admin_id',$adminInfo->admin_id);
            $request->session()->put('admin_name',$admin_name);
            $response = [
                'status'    =>  200,
                'msg'       =>  '登陆成功',
            ];
            return json_encode($response);
        }
    }
    //管理员添加视图
    public function admin(){
        $roleInfo=role::get()->toarray();
        $data=[
            'roleInfo'=>$roleInfo
        ];
        return view("admin.login.admin",$data);
    }
    //管理员添加执行
    public function admin_add(Request $request){
        $data = $request->input();
        DB::beginTransaction();
        try{
            $where=[
                'admin_name'=>$data['admin_name']
            ];
            $res =admin::where($where)->first();
            if($res){
                return json_encode(['code'=>5002,'msg'=>'管理员已存在']);
                die;
            }
            $adminData =[
                'admin_name'=>$data['admin_name'],
                'admin_pwd'=>md5($data['admin_pwd']),
                'add_time'=>time(),
            ];
            $admin_id =admin::insertGetId($adminData);
            if($admin_id<0){
                throw new \Exception('管理员表写入失败');
            }
            $role_id_arr=explode(',',$data['role_id']);
            $role_arr =[];
            foreach($role_id_arr as $k=>$v){
                $role_arr[$k]['admin_id']=$admin_id;
                $role_arr[$k]['role_id']=$v;
            }
            adminrole::insert($role_arr);//加入关联表
            //提交事务
            DB::commit();
            return json_encode(['code'=>200,'msg'=>'添加成功']);
        }catch(\Exception $e){
            //回滚
            DB::rollback();
            throw $e;
        }
    }
    //管理员展示
    public function admin_show(){
        $list=admin::get()->toarray();
        return view("admin.login.admin_show",['list'=>$list]);
    }
    //管理员删除
    public function admin_del(Request $request){
        $admin_id=$request->input('admin_id');
        //开启事务
        DB::beginTransaction();
        try{
            $where=[
                'admin_id'=>$admin_id
            ];
            admin::where($where)->delete();
            adminrole::where($where)->delete();
            //提交事务
            DB::commit();
            return json_encode(['code'=>200,'msg'=>'删除成功']);
        }catch(\Exception $e){
            //回滚
            DB::rollback();
            throw $e;
        }
    }
    //管理员修改视图
    public function admin_update(Request $request){
        $admin_id=$request->input('admin_id');
        $where=[
            'admin_id'=>$admin_id
        ];
        $adminInfo=adminrole::where($where)->pluck('role_id')->toarray();
        $roleInfo=role::get()->toarray();
        $data=[
            'roleInfo'=>$roleInfo,
            'adminInfo'=>$adminInfo,
            'admin_id'=>$admin_id
        ];
        return view("admin.login.admin_update",$data);
    }
    //管理员修改执行
    public function admin_update_do(Request $request){
        $role_id = $request->input('role_id');
        $admin_id = $request->input('admin_id');
        //开启事务
        DB::beginTransaction();
        try{
            $where=[
                'admin_id'=>$admin_id
            ];
            adminrole::where($where)->delete();
            $role_id_arr=explode(',',$role_id);
            $role_arr =[];
            foreach($role_id_arr as $k=>$v){
                $role_arr[$k]['admin_id']=$admin_id;
                $role_arr[$k]['role_id']=$v;
            }
            adminrole::insert($role_arr);//加入关联表
            //提交事务
            DB::commit();
            return json_encode(['code'=>200,'msg'=>'修改成功']);
        }catch(\Exception $e){
            //回滚
            DB::rollback();
            throw $e;
        }
    }
    //管理员角色展示
    public function adminrole($admin_id){
        $where=[
            'admin_id'=>$admin_id
        ];
        $info=admin::where($where)->first()->toarray();
        $adminInfo=adminrole::where($where)->pluck('role_id')->toarray();
        $roleInfo=role::get()->toarray();
        $data=[
            'admin_name'=>$info['admin_name'],
            'roleInfo'=>$roleInfo,
            'adminInfo'=>$adminInfo,
        ];
        return view("admin.login.admin_role",$data);
    }
    //退出
    public function adminquit(){
        session()->flush('admin_name');
        session()->flush('admin_id');
        header('refresh:0.2,/admin/login');
    }
}
