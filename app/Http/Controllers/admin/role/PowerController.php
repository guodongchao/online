<?php

namespace App\Http\Controllers\admin\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\models\role;
use App\models\power;
use App\models\rolepower;
class PowerController extends Controller
{
    //添加权限
    public function powerAdd(){
        $where=[
            'pid'=>0
        ];
        $info=power::where($where)->get()->toarray();
        $data=[
            'powerinfo'=>$info
        ];
        return view('admin.power.poweradd',$data);
    }
    //权限执行
    public function powerAddDo(Request $request){
        $power_name=$request->input('power_name');
        $is_show=$request->input('is_show');
        $datawhere=[
            'power_name'=>$power_name
        ];
        $info=power::where($datawhere)->first();
        if($info){
            $arr = [
                'code' => 404,
                'msg' => '功能已存在'
            ];
            echo json_encode($arr);
            die;
        }
        $power_url=$request->input('power_url');
        $pid=$request->input('pid');
        $data=[
            'power_name'=>$power_name,
            'power_url'=>$power_url,
            'pid'=>$pid,
            'is_show'=>$is_show
        ];
        $res=power::insertGetId($data);
        if($res){
            $arr = [
                'code' => 0,
                'msg' => '添加成功'
            ];
            echo json_encode($arr);
        }else{
            $arr = [
                'code' => 4004,
                'msg' => '添加失败'
            ];
            echo json_encode($arr);
            die;
        }
    }
    //权限展示
    public function powerlist(){
        $powerInfo = power::simplePaginate(6);
        //print_r($powerInfo);die;
        return view('admin.power.powershow',['powerInfo'=>$powerInfo]);
    }
    //权限删除
    public function powerDel(Request $request){
        $power_id=$request->input('power_id');
        DB::beginTransaction();
        try{
            $where=[
                'power_id'=>$power_id
            ];
            power::where($where)->delete();
            rolepower::where($where)->delete();
            DB::commit();
            return json_encode(['code'=>200,'msg'=>'删除成功']);
        }catch(\Exception $e){
            //回滚
            DB::rollback();
            throw $e;
        }
    }
    //权限修改
    public function powerUpdate(Request $request){
        $power_id=$request->input('power_id');
        $actWhere=[
            'power_id'=>$power_id
        ];
        $actInfo=power::where($actWhere)->first()->toarray();
        $where=[
            'pid'=>0
        ];
        $info=power::where($where)->get()->toarray();
        $data=[
            'powerinfo'=>$info,
            'actInfo'=>$actInfo,
        ];
        return view('admin.power.powerupdata',$data);
    }
    //权限修改执行
    public function powerUpdateDo(Request $request)
    {
        $power_id = $request->input('power_id');
        $power_url = $request->input('power_url');
        $is_show = $request->input('is_show');
        $pid = $request->input('pid');
        $datawhere = [
            'power_id' => $power_id
        ];
        $where=[
            'is_show'=>$is_show,
            'pid'=>$pid,
            'power_url'=>$power_url
        ];
        $res = power::where($datawhere)->update($where);
        if ($res) {
            $arr = [
                'code' => 0,
                'msg' => '修改成功'
            ];
            echo json_encode($arr);
        } else {
            $arr = [
                'code' => 4004,
                'msg' => '修改失败'
            ];
            echo json_encode($arr);
            die;
        }
    }
}