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
                <a href="#">课程管理</a>
                &nbsp;-
            </span>
            &nbsp;章节添加
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTopNo">
                <span>章节添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;课时名称：<input type="text" name="section_name" class="input3" />
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

        $('#btn').click(function(){
            var section_name = $("input[name='section_name']").val();
            var chapter_id = $('#qweqf').val();
            var culum_name = $('#qwe').val();
            var chapter_name = $('#qweacvadv').val();

            $.post(
                'sectionInsert',
                {chapter_name:chapter_name,chapter_id:chapter_id,culum_name:culum_name,section_name:section_name},
                function(res){
                    if(res.code==0) {
                        layer.open({
                            type:0,
                            content:'添加成功',
                            btn:['确定'],
//                            yes:function(index,layero){
//                                location.href="chapterAdd";
//                                return true;
//                            },
                            yes:function(){
                                location.href="sectionShow?chapter_id="+res.chapter_id+"&culum_name="+res.culum_name+"&chapter_name="+res.chapter_name;
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