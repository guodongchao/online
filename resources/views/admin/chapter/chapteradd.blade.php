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
                <input type="hidden" id="qweqf" value="{{$culum_id}}">
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;章节名称：<input type="text" name="chapter_name" class="input3" />
                </div>
                <br>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;章节简介：
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"></label>
                        <div class="layui-form-item">
                            <div class="layui-input-block"style="width: 73%;margin-left: 8%">
                                <textarea id="LAY_demo1" style="display: none;" name="file"></textarea>
                            </div>
                        </div>
                    </div>
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
            var chapter_name = $("input[name='chapter_name']").val();
            var chapter_desc=layedit.getContent(news_contents);
            var culum_id = $('#qweqf').val();

            $.post(
                'chapterInsert',
                {chapter_name:chapter_name,chapter_desc:chapter_desc,culum_id:culum_id},
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
                                location.href="chapterShow?culum_id="+res.culum_id;
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