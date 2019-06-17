<?php

namespace App\Http\Controllers\admin\attribute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class attribute extends Controller
{
    //分类添加视图
    public function attr(){
        return view("admin.attr.attr");
    }
    //商品添加执行
    public function attr_add(){

    }
    //商品展示
    public function attr_show(){
        return view("admin.attr.attr_show");
    }
    //商品删除
    public function attr_del(){

    }
    //商品修改视图
    public function attr_update(){
        return view("admin.attr.attr_update");
    }
    //商品修改执行
    public function attr_update_do(){

    }
}
