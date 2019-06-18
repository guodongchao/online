<?php

namespace App\Http\Controllers\admin\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\models\Admin;
class login extends Controller
{
    //登陆视图
    public function login(){
        return view("admin.login.login");
    }
    //登陆执行
    public function login_do(){

    }
    //管理员添加视图
    public function admin(){
        return view("admin.login.admin");
    }
    //管理员添加执行
    public function admin_add(Request $request){
        $data = $request->input();
        $adminData =[
            'admin_name'=>$data['admin_name'],
            'admin_pwd'=>md5($data['admin_pwd']),
            'add_time'=>time(),
        ];
        $admin_id =Admin::insertGetId($adminData);
        if($admin_id){
            return json_encode(['code'=>200,'msg'=>'添加成功']);
        }else{
            return json_encode(['code'=>4003,'msg'=>'添加失败']);
        }
    }
    //管理员展示
    public function admin_show(){
        $list=Admin::get()->toarray();
        return view("admin.login.admin_show",['list'=>$list]);
    }
    //管理员删除
    public function admin_del(Request $request){
        $admin_id=$request->input('admin_id');
        $where=[
            'admin_id'=>$admin_id
        ];
        $res=Admin::where($where)->delete();
        if($res){
            return json_encode(['code'=>200,'msg'=>'删除成功']);
        }else{
            return json_encode(['code'=>4003,'msg'=>'删除失败']);
        }
    }
    //管理员修改视图
    public function admin_update(){
        return view("admin.login.admin_update");
    }
    //管理员修改执行
    public function admin_update_do(){

    }
}
