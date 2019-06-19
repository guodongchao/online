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
        $action_name=$request->input('action_name');
        $is_show=$request->input('is_show');
        $datawhere=[
            'action_name'=>$action_name
        ];
        $info=AdminCtion::where($datawhere)->first();
        if($info){
            $arr = [
                'code' => 404,
                'msg' => '功能已存在'
            ];
            echo json_encode($arr);
            die;
        }
        $action_url=$request->input('action_url');
        $pid=$request->input('pid');
        $data=[
            'action_name'=>$action_name,
            'action_url'=>$action_url,
            'pid'=>$pid,
            'is_show'=>$is_show
        ];
        $res=AdminCtion::insertGetId($data);
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
}