<?php

namespace App\Http\Controllers\admin\cate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\CourseCate;

class cate extends Controller
{
    //分类添加视图
    public function cate(){
        $data = CourseCate::where("c_status",1)->where("c_parent_id",0)->get();

        return view("admin.cate.cate",['data'=>$data]);
    }
    //商品添加执行
    public function cate_add(Request $request){
        $c_cate_name = empty($request->input("c_cate_name"))?"":$request->input("c_cate_name");
        $c_parent_id = $request->input("parent_id");
        $c_cate_sort = empty($request->input("c_cate_sort"))? 1 :$request->input("c_cate_sort");
        if(!$c_cate_name){
            return ["code"=>200,"msg"=>"分类名称不能为空"];
        }
        $search = CourseCate::where("c_cate_name",$c_cate_name)->first();
        if($search){
            return ["code"=>200,"msg"=>"抱歉分类名称已存在"];
        }
        $time = time();
        $arr= [
            "c_cate_name"=>$c_cate_name,
            "c_parent_id"=>$c_parent_id,
            "c_create_time"=>$time,
            "c_cate_sort"=>$c_cate_sort
        ];
        $res = CourseCate::insert($arr);
        if($res){
            return ["code"=>100,"msg"=>"添加成功"];
        }else{
            return ["code"=>200,"msg"=>"抱歉,添加失败"];
        }

    }
    //课程分类展示
    public function cate_show(){
        $data = CourseCate::where("c_status",1)->get()->toArray();
        $sortData = $this->recursion($data);

        return view("admin.cate.cate_show",["data"=>$data]);
    }

    //递归
    public function recursion($data,$parent_id=0,$level=0){
        static $tmp;
        foreach($data as $key=>$val){
            if($val['c_parent_id'] == $parent_id){
                $val['level']=$level;
                $tmp[] = $val;

                $this->recursion($data,$val['c_cate_id'],$level+1);
            }
        }
        return $tmp;

    }
    //课程分类删除
    public function cate_del(){

    }
    //商品修改视图
    public function cate_update(Request $request){
        $c_cate_id = $request->input("cate_id");
        echo $c_cate_id;
        $data = CourseCate::where("c_status",1)->where("c_parent_id",0)->get();
        return view("admin.cate.cate_update",['data'=>$data]);
    }
    //商品修改执行
    public function cate_update_do(){

    }
}
