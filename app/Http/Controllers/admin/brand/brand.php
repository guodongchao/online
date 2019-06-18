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
    //商品添加执行
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
    //商品展示
    public function brand_show(){
        return view("admin.brand.brand_show");
    }
    //商品删除
    public function brand_del(){

    }
    //商品修改视图
    public function brand_update(){
        return view("admin.brand.brand_update");
    }
    //商品修改执行
    public function brand_update_do(){

    }
}
