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
                <a href="#">讲师管理</a>
                &nbsp;-
            </span>
            &nbsp;讲师添加
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTopNo">
                <span>讲师添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    <input type="hidden" name="teacher_id" value="{{$data['teacher_id']}}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;讲师名称：<input type="text" name="teacher_name" class="input3" value="{{$data['teacher_name']}}" />
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;讲师涉及能力：<input type="text" name="teacher_type" class="input3" value="{{$data['teacher_type']}}" />
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;讲师授课风格：<input type="text" name="teacher_style" class="input3" value="{{$data['teacher_style']}}" />
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;讲师头像：
                    <div class="bbDd">&nbsp;&nbsp;
                        <div class="bbDImg"><img src="{{$data['teacher_img']}}" width="300px" height="200px" alt=""></div>
                        <input type="hidden" class="uplo" value="{{$data['teacher_img']}}">
                        <input type="file" class="file" id="file" name="file" />
                    </div>
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;讲师简介：
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"></label>
                        <div class="layui-form-item">
                            <div class="layui-input-block"style="width: 73%;margin-left: 8%">
                                <textarea id="LAY_demo1" style="display: none;" name="file">{{$data['teacher_desc']}}</textarea>
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
    $("#file").change(function(){
        // console.log(1)
        $.ajaxFileUpload({
            type : "post",          //上传类型
            url: 'uploadajax',     //用于文件上传的服务器端请求地址
            secureuri: false,   //是否需要安全协议，一般设置为false
            fileElementId: 'file',  //文件上传域的ID
            dataType: 'json',   //返回值类型 一般设置为json
            success: function (data)  //服务器成功响应处理函数
            {
                // $('.bbDImg').empty()
                $('.bbDImg').html("<img src='"+data+"' height=180px'>")
                $(".uplo").val(data);

                // console.log(data)
            }

        })
    })
</script>
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
            var teacher_id=$("[name='teacher_id']").val()
            var teacher_name = $("[name='teacher_name']").val();
            var teacher_type = $("[name='teacher_type']").val();
            var teacher_style = $("[name='teacher_style']").val();
            var uplo = $(".uplo").val();
            var teacher_desc=layedit.getContent(news_contents);
            var data={};
            data.teacher_id=teacher_id;
            data.teacher_name=teacher_name;
            data.teacher_type=teacher_type;
            data.teacher_style=teacher_style;
            data.teacher_img=uplo;
            data.teacher_desc=teacher_desc;
            $.post(
                'teacher_update_do',
                {data:data},
                function(res){
                    if(res.code==0) {
                        layer.msg(res.msg,{time:3000},function () {
                            window.location.href="teacher_list";
                        });
                    }else if(res.code==1){
                        layer.msg(res.msg);
                    }
                },'json'
            )
        })
    })

</script>