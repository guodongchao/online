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
                <img class="icon2" src="/img/coin06.png" /> 商品模块
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="goods" target="main">商品添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="goods_show" target="main">商品展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin07.png" />
                <img class="icon2" src="/img/coin08.png" /> 分类模块
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="cate" target="main">分类添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="cate_show" target="main">分类展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin10.png" />
                <img class="icon2" src="/img/coin09.png" /> 品牌模块
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a href="brand" target="main" class="cks">品牌添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a href="brand_show" target="main" class="cks">品牌展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin11.png" />
                <img class="icon2" src="/img/coin12.png" /> 商品类型模块
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a href="type" target="main" class="cks">商品类型添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a href="type_show" target="main" class="cks">商品类型展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin14.png" />
                <img class="icon2" src="/img/coin13.png" /> 商品属性模块
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="attr" target="main">商品属性添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="attr_show" target="main">商品属性展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
        </dl>
        <dl class="system_log">
            <dt>
                <img class="icon1" src="/img/coin15.png" />
                <img class="icon2" src="/img/coin16.png" /> 活动模块
                <img class="icon3" src="/img/coin19.png" />
                <img class="icon4" src="/img/coin20.png" />
            </dt>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="message" target="main">活动添加</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>
            <dd>
                <img class="coin11" src="/img/coin111.png" />
                <img class="coin22" src="/img/coin222.png" />
                <a class="cks" href="sign" target="main">活动展示</a>
                <img class="icon5" src="/img/coin21.png" />
            </dd>

        </dl>

    </div>

</div>
</body>

</html>
