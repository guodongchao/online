<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('asd','index\index@asd');
//Route::get('bbb/{id}',function($id){
//    if($id<5){
//        return view('index.index');
//    }else{
//        return redirect("http://www.baidu.com");
//    }
//})->where('id','[0-9]*');
//
//Route::get("test",function(){
//    echo 555555555;
//});
//
//Route::prefix('info')->group(function () {
//    Route::get('go', function () {
//       echo 444;
//    })->name('info.test');
//    Route::get('users', function () {
//        echo 5555;
//    })->name('info.users');
//});


//后台登陆
Route::any('login','login\login@login');
Route::any('admin','login\login@admin');
Route::any('admin_show','login\login@admin_show');
Route::any('admin_update','login\login@admin_update');

//后台首页
Route::get('index','index\index@index');
Route::get('left','index\index@left');
Route::get('head','index\index@head');
Route::get('main','index\index@main');
//商品模块
Route::any('goods','goods\goods@goods');
Route::any('goods_show','goods\goods@goods_show');
Route::any('goods_update','goods\goods@goods_update');
//分类模块
Route::any('cate','cate\cate@cate');
Route::any('cate_show','cate\cate@cate_show');
Route::any('cate_update','cate\cate@cate_update');
//品牌模块
Route::any('brand','brand\brand@brand');
Route::any('brand_show','brand\brand@brand_show');
Route::any('brand_update','brand\brand@brand_update');
//商品类型模块
Route::any('type','type\type@type');
Route::any('type_show','type\type@type_show');
Route::any('type_update','type\type@type_update');
//商品属性添加
Route::any('attr','attribute\attribute@attr');
Route::any('attr_show','attribute\attribute@attr_show');
Route::any('attr_update','attribute\attribute@attr_update');





