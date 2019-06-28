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

Route::any('admin/login','admin\login\login@login');
Route::any('admin/loginDo','admin\login\login@login_do');
//生成验证码
Route::any('admin/codelist/{sid}','admin\login\login@showCode');

//,'middleware' =>['rbac']
Route::group(['prefix'=>'admin','middleware' =>['rbac']],function () {
    //后台首页
    Route::get('index','admin\index\index@index');
    Route::get('left','admin\index\index@left');
    Route::get('head','admin\index\index@head');
    Route::get('main','admin\index\index@main');

    Route::any('weinxin','admin\weixin\weiXinController@weinxin');//微信配置
    //退出
    Route::any('adminquit','admin\login\login@adminquit');
    //管理员添加
    Route::any('admin','admin\login\login@admin');
    Route::any('adminDo','admin\login\login@admin_add');
    //管理员展示
    Route::any('admin_show','admin\login\login@admin_show');
    //管理员删除
    Route::any('admin_del','admin\login\login@admin_del');
    //管理员修改
    Route::any('admin_update','admin\login\login@admin_update');
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
    Route::any('role_update','admin\role\RoleController@roleUpdate');
    Route::any('roleUpdateDo','admin\role\RoleController@roleUpdateDo');
    //角色权限展示
    Route::any('rolepower/{role_id}','admin\role\RoleController@rolePower');
    //权限添加
    Route::any('poweradd','admin\role\PowerController@powerAdd');
    Route::any('poweraddDo','admin\role\PowerController@powerAddDo');
    //权限展示
    Route::any('powershow','admin\role\PowerController@powerlist');
    //权限删除
    Route::any('powerdel','admin\role\PowerController@powerDel');
    //权限修改
    Route::any('powerupdate','admin\role\PowerController@powerUpdate');
    Route::any('powerUpdateDo','admin\role\PowerController@powerUpdateDo');

    //课程模块goods
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
    //课程小节操作goods文件夹下
    Route::any('section','admin\goods\section@section');
    Route::any('sectionAdd','admin\goods\section@sectionAdd');
    Route::any('sectionAddDo','admin\goods\section@sectionAddDo');
    Route::any('sectionUpd','admin\goods\section@sectionUpd');
    Route::any('sectionUpdDo','admin\goods\section@sectionUpdDo');
    Route::any('sectionDel','admin\goods\section@sectionDel');
    Route::any('sectionSearch','admin\goods\section@sectionSearch');
    //讲师模块
    Route::any('teacher','admin\Teacher\TeacherController@teacher');
    Route::any('teacher_do','admin\Teacher\TeacherController@teacher_do');
    Route::any('teacher_list','admin\Teacher\TeacherController@teacher_list');
    Route::any('teacher_del','admin\Teacher\TeacherController@teacher_del');
    Route::any('teacher_update','admin\Teacher\TeacherController@teacher_update');
    Route::any('teacher_update_do','admin\Teacher\TeacherController@teacher_update_do');
    //公告模块
    Route::any('notice','admin\Notice\NoticeController@notice');
    Route::any('notice_do','admin\Notice\NoticeController@notice_do');
    Route::any('notice_list','admin\Notice\NoticeController@notice_list');
    Route::any('n_cate','admin\Notice\NoticeController@n_cate');
    Route::any('cate_del','admin\Notice\NoticeController@cate_del');
    Route::any('notice_del','admin\Notice\NoticeController@notice_del');
    Route::any('notice_update','admin\Notice\NoticeController@notice_update');
    Route::any('notice_update_do','admin\Notice\NoticeController@notice_update_do');
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
    //课程章节
    Route::get('chapterAdd','admin\Mation\MationController@chapterAdd');
    Route::post('chapterInsert','admin\Mation\MationController@chapterInsert');

    //上传视频
    Route::any('uploadShiping','admin\shiping\shiping@uploadShiping');
    Route::any('upd','admin\shiping\shiping@upd');
    Route::any('hourInsert','admin\shiping\shiping@hourInsert');

    //小结执行添加
    Route::post('sectionInsert','admin\Mation\MationController@sectionInsert');
    //章节展示
    Route::get('chapterShow','admin\Mation\MationController@chapterShow');
    //小结添加页面
    Route::get('sectionAdd','admin\Mation\MationController@sectionAdd');
    //小结展示
    Route::get('sectionShow','admin\Mation\MationController@sectionShow');
    //章节删除
    Route::post('chapterDel','admin\Mation\MationController@chapterDel');
    //课时展示页面
    Route::get('hourShow','admin\Mation\MationController@hourShow');

    Route::get('hourAdd','admin\Mation\MationController@hourAdd');
    //小结删除
    Route::post('sectionDels','admin\Mation\MationController@sectionDels');
    //章节修改页面
    Route::get('chapterUpdate','admin\Mation\MationController@chapterUpdate');
    //章节执行修改
    Route::post('chapterUpdateDo','admin\Mation\MationController@chapterUpdateDo');
    //小节修改页面
    Route::get('sectionUpdate','admin\Mation\MationController@sectionUpdate');
    //小节执行修改
    Route::post('sectionUpdateDo','admin\Mation\MationController@sectionUpdateDo');
    //课时删除
    Route::post('hourDel','admin\Mation\MationController@hourDel');

});


Route::group(['prefix'=>'index','middleware' =>['blog']],function () {
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
    Route::any('articlePage','index\article\articleController@articlePage');
    //课程
    Route::any('mycourse','index\course\courseController@mycourse');//我的信息
    Route::any('coursecont','index\course\courseController@coursecont');  //详细课程
    Route::any('coursecont1','index\course\courseController@coursecont1');   //章节,问答,资料区
    Route::any('courselist','index\course\courseController@courselist');//课程展示
    Route::any('courselistData','index\course\courseController@courselistData');//课程下某个分类下的科目
    Route::any('courseSearch','index\course\courseController@courseSearch');//课程下某个分类下的科目
    Route::any('coursecont2','index\course\courseController@coursecont2');//课程下某个分类下的科目

    Route::any('myHour','index\course\courseController@myHour');//观看某个课时的时间



    Route::any('shoucang','index\course\courseController@shoucang');//课程下某个分类下的科目

    Route::any('video','index\course\courseController@video');//视频播放
    Route::any('quest','index\course\courseController@quest');//课程下的问答
    Route::any('questSecord','index\course\courseController@questSecord');//课程下的问答
    //我的问答
    Route::any('mycourse2','index\course\courseController@mycourse2');
    //我的笔记
    Route::any('mycourse3','index\course\courseController@mycourse3');
    //笔记删除
    Route::any('noteDel','index\course\courseController@noteDel');
    //查看笔记
    Route::any('noteShow','index\course\courseController@noteShow');
    //我的作业
    Route::any('mycourse4','index\course\courseController@mycourse4');
    //修改密码
    Route::any('myrepassword','index\course\courseController@myrepassword');
    Route::any('myrepasswordDo','index\course\courseController@myrepasswordDo');
    //修改信息
    Route::any('mysetting','index\course\courseController@detail');
    Route::any('mysettingDo','index\course\courseController@detailDo');
    //上传头像
    Route::any('headajax','index\course\courseController@uploadajax');
    //注册
    Route::any('register','index\login\loginController@register');
    Route::any('registerDo','index\login\loginController@registerDo');
    //验证唯一
    Route::any('only','index\login\loginController@only');
    Route::any('emailOnly','index\login\loginController@emailOnly');
    //登录
    Route::any('login','index\login\loginController@login');
    Route::any('loginDo','index\login\loginController@loginDo');
    Route::any('send','index\login\loginController@send');  //微信第三方登录回调地址

    //退出
    Route::any('quit','index\index\indexController@quit');
    //讲师
    Route::any('teacher','index\teacher\teacherController@teacher');
    Route::any('teacherlist','index\teacher\teacherController@teacherlist');
    //题库
    Route::any('question1','index\question\questionController@question1');
    Route::any('question11','index\question\questionController@question11');

    Route::any('question2','index\question\questionController@question2');
    Route::any('question22','index\question\questionController@question22');
    Route::any('question23','index\question\questionController@question23');
    Route::any('question24','index\question\questionController@question24');

    Route::any('question3','index\question\questionController@question3');
    Route::any('question33','index\question\questionController@question33');
    Route::any('question34','index\question\questionController@question34');

    Route::any('question4','index\question\questionController@question4');
    Route::any('question44','index\question\questionController@question44');

    Route::any('question5','index\question\questionController@question5');
    Route::any('question55','index\question\questionController@question55');
    Route::any('question56','index\question\questionController@question56');

    //问答
    Route::any('comment','index\comment\commentController@comment');
    Route::any('comment_do','index\comment\commentController@comment_do');
});




