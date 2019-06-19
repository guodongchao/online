<?php

namespace App\Http\Controllers\admin\brand;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\question;
class brand extends Controller
{
    //分类添加视图
    public function brand(){
        return view("admin.brand.brand");
    }
    //添加执行
    public function brand_add(Request $request){
        $data=$request->input();
        $where=[
            'q_name'=>$data['q_name'],
            'q_type'=>$data['q_type'],
            'q_class'=>1,
            'q_answer'=>$data['q_answer'],
            'q_result'=>$data['q_result'],
            'u_id'=>1,
            'q_time'=>time(),
        ];
        $res=question::insert($where);
        if($res){
            $info=[
                'error'=>0,
                'msg'=>"OK"
            ];
        }else{
            $info=[
                'error'=>5000,
                'msg'=>"ON"
            ];
        }
        return $info;
    }
    //展示
    public function brand_show(){
        $arr=question::where(['is_status'=>1])->get();
        return view("admin.brand.brand_show",['arr'=>$arr]);
    }
    //删除
    public function brand_del(Request $request){
        $q_id=$request->input('q_id');
        $res=question::where(['q_id'=>$q_id])->update(['is_status'=>2]);
        if($res){
            $info=[
                'error'=>0,
                'msg'=>"OK"
            ];
        }else{
            $info=[
                'error'=>5000,
                'msg'=>"ON"
            ];
        }
        return $info;
    }
    //商品修改视图
    public function brand_update(Request $request){
        $q_id=$request->input('q_id');
        $arr=question::where(['q_id'=>$q_id])->first();
        return view("admin.brand.brand_update",['arr'=>$arr]);
    }
    //商品修改执行
    public function brand_update_do(Request $request){
        $arr=$request->input();
        $where=[
            'q_name'=>$arr['q_name'],
            'q_type'=>$arr['q_type'],
            'q_class'=>1,
            'q_answer'=>$arr['q_answer'],
            'q_result'=>$arr['q_result'],
        ];
        $res=question::where(['q_id'=>$arr['q_id']])->update($where);
        if($res){
            $info=[
                'error'=>0,
                'msg'=>"OK"
            ];
        }else{
            $info=[
                'error'=>5000,
                'msg'=>"ON"
            ];
        }
        return $info;
    }
}
