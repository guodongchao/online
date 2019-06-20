<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>首页左侧导航</title>
    <link rel="stylesheet" type="text/css" href="/css/public.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/public.js" ></script>
    <head></head>

<body id="bg">
<!-- 左边节点 -->
<div class="container">

    <div class="leftsidebar_box">
        <a href="{:U('Admin/Index/main')}" " target="main"><div class="line">
            <img src="/img/coin01.png" />&nbsp;&nbsp;首页
        </div></a>
        <!-- <dl class="system_log">
        <dt><img class="icon1" src="/img/coin01.png" /><img class="icon2"src="/img/coin02.png" />
            首页<img class="icon3" src="/img/coin19.png" /><img class="icon4" src="/img/coin20.png" /></dt>
    </dl> -->
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin03.png" /><img
                        class="icon2" src="/img/coin04.png" /> 网站管理<img
                        class="icon3" src="/img/coin19.png" /><img
                        class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" /><img
                        class="coin22" src="/img/coin222.png" /><a
                        class="cks" href="{:U('Admin/User/user')}" target="main">管理员管理</a><img
                        class="icon5" src="/img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin05.png" />
                <img class="icon2" src="/img/coin06.png" /> 管理员模板
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="admin" target="main">管理员添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="admin_show" target="main">管理员展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin05.png" />
                <img class="icon2" src="/img/coin06.png" /> 课程模块
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="goods" target="main">课程添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="goods_show" target="main">课程展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="chapterAdd" target="main">章节添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="chapterShow" target="main">章节展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin07.png" />
                <img class="icon2" src="/img/coin08.png" /> 课程分类模块
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="cate" target="main">课程分类添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="cate_show" target="main">课程分类展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>

        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin10.png" />
                <img class="icon2" src="/img/coin09.png" /> 题库模块
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a href="brand" target="main" class="cks">题库添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a href="brand_show" target="main" class="cks">题库展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin11.png" />
                <img class="icon2" src="/img/coin12.png" /> 权限管理
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a href="poweradd" target="main" class="cks">添加权限</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a href="powershow" target="main" class="cks">权限展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin14.png" />
                <img class="icon2" src="/img/coin13.png" /> 角色管理
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="role" target="main">角色添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="role_show" target="main">角色展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin15.png" />
                <img class="icon2" src="/img/coin16.png" /> 讲师模块
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="teacher" target="main">教师添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="teacher_list" target="main">教师展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>

        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin15.png" />
                <img class="icon2" src="/img/coin16.png" /> 公告模块
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="notice" target="main">公告添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="notice_list" target="main">公告展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin15.png" />
                <img class="icon2" src="/img/coin16.png" />资讯模块
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="mationCateAdd" target="main">资讯分类添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="mationCateShow" target="main">资讯分类展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="mationAdd" target="main">资讯添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="mationShow" target="main">资讯展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>

        </dl>

    </div>

</div>
</body>

</html>
