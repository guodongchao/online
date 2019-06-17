<?php

namespace App\Http\Controllers\admin\goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class goods extends Controller
{
    //商品添加视图
    public function goods(){
        return view("admin.goods.goods");
    }
    //商品添加执行
    public function goods_add(){

    }
    //商品展示
    public function goods_show(){
        return view("admin.goods.goods_show");
    }
    //商品删除
    public function goods_del(){

    }
    //商品修改视图
    public function goods_update(){
            return view("admin.goods.goods_update");
    }
    //商品修改执行
    public function goods_update_do(){

    }
}
