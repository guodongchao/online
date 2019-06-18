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

Route::prefix('admin')->group(function () {


//后台登陆
Route::any('login','admin\login\login@login');
Route::any('admin','admin\login\login@admin');
Route::any('admin_show','admin\login\login@admin_show');
Route::any('admin_update','admin\login\login@admin_update');

//后台首页
Route::get('index','admin\index\index@index');
Route::get('left','admin\index\index@left');
Route::get('head','admin\index\index@head');
Route::get('main','admin\index\index@main');
//商品模块
Route::any('goods','admin\goods\goods@goods');
Route::any('goods_show','admin\goods\goods@goods_show');
Route::any('goods_update','admin\goods\goods@goods_update');
//分类模块
Route::any('cate','admin\cate\cate@cate');
Route::any('cate_show','admin\cate\cate@cate_show');
Route::any('cate_update','admin\cate\cate@cate_update');
//品牌模块
Route::any('brand','admin\brand\brand@brand');
Route::any('brand_show','admin\brand\brand@brand_show');
Route::any('brand_update','admin\brand\brand@brand_update');
//商品类型模块
Route::any('type','admin\type\type@type');
Route::any('type_show','admin\type\type@type_show');
Route::any('type_update','admin\type\type@type_update');
//商品属性添加
Route::any('attr','admin\attribute\attribute@attr');
Route::any('attr_show','admin\attribute\attribute@attr_show');
Route::any('attr_update','admin\attribute\attribute@attr_update');


//资讯分类
Route::get('mationCateAdd','admin\Mation\MationController@mationCateAdd');
Route::post('mationCateInsert','admin\Mation\MationController@mationCateInsert');





});


Route::prefix('index')->group(function () {
    Route::any('index','index\index\indexController@index');
    Route::any('header1','index\index\indexController@header1');
    Route::any('header2','index\index\indexController@header2');
    Route::any('foot','index\index\indexController@foot');

});



