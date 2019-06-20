<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>新闻添加-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <link rel="stylesheet" href="layui/css/layui.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="layui/layui.js"></script>
    <script type="text/javascript" src="layui/layui.js"></script>
    <script type="text/javascript" src="js/ajaxfileupload.js"></script>
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" />
            <span>
                <a href="#">首页</a>
                &nbsp;-&nbsp;
                <a href="#">公告管理</a>
                &nbsp;-
            </span>
            &nbsp;公告添加
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTopNo">
                <span>公告添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    公告内容：<input type="text" name="notice_name"  style="width: 500px;height: 40px;"/>
                </div>

                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" id="btn" href="#" >提交</button>
                    </p>
                </div>
            </div>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>
</body>
</html>

<script>
    layui.use(['layer','form','layedit'], function() {
        var layer = layui.layer;
        var form = layui.form;
        var layedit = layui.layedit;

        //富文本编辑器的文件上传
        layedit.set({
            uploadImage:{
                url:"unitimagesadd"//接口url
                ,type:'post'//默认post
            }
        });

        //构建一个默认的编辑器
        var news_contents=layedit.build('LAY_demo1');


        $('#btn').click(function(){
            var n_name = $("[name='notice_name']").val();
            var data={};
            data.n_name=n_name;
            $.post(
                'notice_do',
                {data:data},
                function(res){
                    if(res.code==0) {
                        layer.open({
                            type:0,
                            content:'添加成功',
                            btn:['继续添加','列表展示'],
                            yes:function(index,layero){
                                location.href="notice";
                                return true;
                            },
                            btn2:function(){
                                location.href="notice_list";
                                return true;
                            }
                        })
                    }else if(res.code==1){
                        layer.msg(res.msg);
                    }
                },'json'
            )
        })
    })

</script>