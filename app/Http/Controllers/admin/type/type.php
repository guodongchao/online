<?php

namespace App\Http\Controllers\admin\type;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class type extends Controller
{
    //分类添加视图
    public function type(){
        return view("type.type");
    }
    //商品添加执行
    public function type_add(){

    }
    //商品展示
    public function type_show(){
        return view("type.type_show");
    }
    //商品删除
    public function type_del(){

    }
    //商品修改视图
    public function type_update(){
        return view("type.type_update");
    }
    //商品修改执行
    public function type_update_do(){

    }
}
