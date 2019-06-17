<?php

namespace App\Http\Controllers\admin\cate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class cate extends Controller
{
    //分类添加视图
    public function cate(){
        return view("admin.cate.cate");
    }
    //商品添加执行
    public function cate_add(){

    }
    //商品展示
    public function cate_show(){
        return view("admin.cate.cate_show");
    }
    //商品删除
    public function cate_del(){

    }
    //商品修改视图
    public function cate_update(){
        return view("admin.cate.cate_update");
    }
    //商品修改执行
    public function cate_update_do(){

    }
}
