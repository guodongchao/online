<?php

namespace App\Http\Controllers\admin\role;
use App\models\adminrole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\models\role;
use App\models\power;
use App\models\rolepower;
class RoleController extends Controller
{
    //角色添加视图‘
    public function role(){
        $power=power::get()->toarray();
        $powerInfo=$this->getSon($power);
        $data=[
            'powerInfo'=>$powerInfo
        ];

        return view("admin.role.role",$data);
    }
    public  function getSon($data,$pid=0){
        $powerInfo=[];
        foreach($data as $k=>$v){
            if($v['pid']==$pid){
                $son=$this->getSon($data,$v['power_id']);
                $v['son']=$son;
                $powerInfo[]=$v;
            }
        }
        return $powerInfo;
    }
    //角色添加
    public function role_add(Request $request){
        $data=$request->input();
        DB::beginTransaction();
        try{
            //入角色表
            $roleData =[
                'role_name'=>$data['role_name'],
            ];
            $roleinfo=role::where($roleData)->first();
            if($roleinfo){
                $arr = [
                    'code' => 404,
                    'msg' => '角色已存在'
                ];
                echo json_encode($arr);
                die;
            }
            $role_id =role::insertGetId($roleData);
            if($role_id  <0){
                throw new \Exception('角色表写入失败');
            }
            $power_id_arr=explode(',',$data['power_id']);
            $power_arr =[];
            foreach($power_id_arr as $k=>$v){
                $power_arr[$k]['role_id']=$role_id;
                $power_arr[$k]['power_id']=$v;
            }
            RolePower::insert($power_arr);//加入关联表
            //提交事务
            DB::commit();
            return json_encode(['code'=>0,'msg'=>'添加成功']);
        }catch(\Exception $e){
            //回滚
            DB::rollback();
            throw $e;
        }
    }
    //角色展示
    public function rolelist(){
        $roleInfo = role::get()->toArray();
        return view('admin.role.role_show',['roleInfo'=>$roleInfo]);
    }
    //角色删除
    public function roleDel(Request $request){
        $role_id=$request->input('role_id');
        //开启事务
        DB::beginTransaction();
        try{
            $where=[
                'role_id'=>$role_id
            ];
            $info=adminrole::where($where)->get()->toarray();
            //print_r($info);die;
            if(!empty($info)){
                return json_encode(['code'=>3001,'msg'=>'此角色被选择,不能删除']);
            }
            role::where($where)->delete();
            rolepower::where($where)->delete();
            //提交事务
            DB::commit();
            return json_encode(['code'=>200,'msg'=>'删除成功']);
        }catch(\Exception $e){
            //回滚
            DB::rollback();
            throw $e;
        }
    }
    //角色修改
    public function roleUpdate(Request $request){
        $role_id=$request->input('role_id');
        $where=[
            'role_id'=>$role_id
        ];
        $powerInfo=rolepower::where($where)->pluck('power_id')->toarray();
        $infopower = power::all()->toarray();
        $powerdata=$this->getSon($infopower);
        $data=[
            'role_id'=>$role_id,
            'powerdata'=>$powerdata,
            'powerinfo'=>$powerInfo
        ];
        return view('admin.role.roleupdata',$data);
    }
    //角色修改执行
    public function roleUpdateDo(Request $request){
        $data=$request->input();
        DB::beginTransaction();
        try{
            //入角色表
            $actData=[
                'role_id'=>$data['role_id']
            ];
            rolepower::where($actData)->delete();
            $power_id_arr=explode(',',$data['power_id']);
            $power_arr =[];
            foreach($power_id_arr as $k=>$v){
                $power_arr[$k]['role_id']=$data['role_id'];
                $power_arr[$k]['power_id']=$v;
            }
            rolepower::insert($power_arr);//加入关联表
            //提交事务
            DB::commit();
            return json_encode(['code'=>0,'msg'=>'修改成功']);
        }catch(\Exception $e){
            //回滚
            DB::rollback();
            throw $e;
        }
    }
    //角色权限展示
    public function rolePower($rode_id){
        $where=[
            'role_id'=>$rode_id
        ];
        $roleInfo=role::where($where)->first()->toarray();
        $powerInfo=rolepower::where($where)->pluck('power_id')->toarray();
        $infopower = power::all()->toarray();
        $powerdata=$this->getSon($infopower);
        $data=[
            'role_name'=>$roleInfo['role_name'],
            'powerdata'=>$powerdata,
            'powerinfo'=>$powerInfo
        ];
        return view('admin.role.rolepower',$data);
    }
}