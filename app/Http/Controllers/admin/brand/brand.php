<?php

namespace App\Http\Controllers\admin\brand;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class brand extends Controller
{
    //分类添加视图
    public function brand(){
        return view("admin.brand.brand");
    }
    //商品添加执行
    public function brand_add(Request $request){
        $data=$request->input();
        
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
