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
//管理员添加
Route::any('admin','admin\login\login@admin');
Route::any('adminDo','admin\login\login@admin_add');
//管理员展示
Route::any('admin_show','admin\login\login@admin_show');
//管理员删除
Route::any('admin_del','admin\login\login@admin_del');
//管理员修改
Route::any('admin_update/{admin_id}','admin\login\login@admin_update');
Route::any('admin_update_do','admin\login\login@admin_update_do');
//管理员角色展示
Route::any('adminrole/{admin_id}','admin\login\login@adminrole');
//角色添加
Route::any('role','admin\role\RoleController@role');
Route::any('roleDo','admin\role\RoleController@role_add');
//角色展示
Route::any('role_show','admin\role\RoleController@rolelist');
//角色删除
Route::any('role_del','admin\role\RoleController@roleDel');
//角色修改
Route::any('role_update/{role_id}','admin\role\RoleController@roleUpdate');
Route::any('roleUpdateDo','admin\role\RoleController@roleUpdateDo');
//管理员角色展示
Route::any('rolepower/{role_id}','admin\role\RoleController@rolePower');
//权限添加
Route::any('poweradd','admin\role\PowerController@powerAdd');
Route::any('poweraddDo','admin\role\PowerController@powerAddDo');
//权限展示
Route::any('powershow','admin\role\PowerController@powerlist');
//权限删除
Route::any('powerdel','admin\role\PowerController@powerDel');
//权限修改
Route::any('powerupdate/{power_id}','admin\role\PowerController@powerUpdate');
Route::any('powerUpdateDo','admin\role\PowerController@powerUpdateDo');
//后台首页
Route::get('index','admin\index\index@index');
Route::get('left','admin\index\index@left');
Route::get('head','admin\index\index@head');
Route::get('main','admin\index\index@main');



//课程模块
Route::any('goods','admin\goods\goods@goods');
Route::any('goods_add','admin\goods\goods@goods_add');
Route::any('goods_show','admin\goods\goods@goods_show');
Route::any('goods_update','admin\goods\goods@goods_update');
Route::any('goods_update_do','admin\goods\goods@goods_update_do');
Route::any('uploadajax','admin\goods\goods@uploadajax');
Route::any('goods_del','admin\goods\goods@goods_del');
Route::any('culum_search','admin\goods\goods@culum_search');


//课程分类模块
Route::any('cate','admin\cate\cate@cate');
Route::any('cate_add','admin\cate\cate@cate_add');
Route::any('cate_show','admin\cate\cate@cate_show');
Route::any('cate_update','admin\cate\cate@cate_update');
Route::any('cate_update_do','admin\cate\cate@cate_update_do');
Route::any('cate_del','admin\cate\cate@cate_del');
Route::any('cate_search','admin\cate\cate@cate_search');
//讲师模块
Route::any('teacher','admin\Teacher\TeacherController@teacher');
Route::any('teacher_do','admin\Teacher\TeacherController@teacher_do');
Route::any('teacher_list','admin\Teacher\TeacherController@teacher_list');
Route::any('teacher_del','admin\Teacher\TeacherController@teacher_del');
Route::any('teacher_update','admin\Teacher\TeacherController@teacher_update');
Route::any('teacher_update_do','admin\Teacher\TeacherController@teacher_update_do');


//品牌模块
Route::any('brand','admin\brand\brand@brand');
Route::any('brand_show','admin\brand\brand@brand_show');
Route::get('brand_update','admin\brand\brand@brand_update');
Route::post('brand_update_do','admin\brand\brand@brand_update_do');
Route::post('brand_add','admin\brand\brand@brand_add');
Route::post('brand_del','admin\brand\brand@brand_del');


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
Route::get('mationCateShow','admin\Mation\MationController@mationCateShow');
Route::post('isShow','admin\Mation\MationController@isShow');
Route::post('mationCateDel','admin\Mation\MationController@mationCateDel');
Route::get('mationCateUpdate','admin\Mation\MationController@mationCateUpdate');
Route::post('mationCateUpdateDo','admin\Mation\MationController@mationCateUpdateDo');
//资讯
Route::get('mationAdd','admin\Mation\MationController@mationAdd');
Route::post('mationInsert','admin\Mation\MationController@mationInsert');
Route::any('mationShow','admin\Mation\MationController@mationShow');
Route::post('mationIsShow','admin\Mation\MationController@mationIsShow');
Route::post('mationDel','admin\Mation\MationController@mationDel');
Route::get('mationUpdate','admin\Mation\MationController@mationUpdate');
Route::post('mationUpdateDo','admin\Mation\MationController@mationUpdateDo');





});


Route::prefix('index')->group(function () {
    //首页
    Route::any('index','index\index\indexController@index');
    Route::any('header1','index\index\indexController@header1');
    Route::any('header2','index\index\indexController@header2');
    Route::any('main','index\index\indexController@main');
    //关于我们
    Route::any('page','index\page\pageController@page');
    Route::any('pagecontact','index\page\pageController@pagecontact');
    //咨询
    Route::any('article','index\article\articleController@article');
    Route::any('articlelist','index\article\articleController@articlelist');
    Route::any('articlecatelist','index\article\articleController@articlecatelist');
    Route::any('articleTop','index\article\articleController@articleTop');
    Route::any('articlexia','index\article\articleController@articlexia');
    //课程
    Route::any('mycourse','index\course\courseController@mycourse');//我的信息
    Route::any('coursecont','index\course\courseController@coursecont');
    Route::any('coursecont1','index\course\courseController@coursecont1');
    Route::any('courselist','index\course\courseController@courselist');
    Route::any('video','index\course\courseController@video');//视频播放
    //登陆注册
    Route::any('login','index\login\loginController@login');
    Route::any('register','index\login\loginController@register');
    //讲师
    Route::any('teacher','index\teacher\teacherController@teacher');
    Route::any('teacherlist','index\teacher\teacherController@teacherlist');
    //题库
    Route::any('question1','index\question\questionController@question1');
});



