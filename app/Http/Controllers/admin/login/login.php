<?php

namespace App\Http\Controllers\admin\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\models\admin;
use App\models\role;
use App\models\adminrole;
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
    public function admin_update($admin_id){
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
}
