<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/ajaxfileupload.js"></script>
    <script src="layui/css/layui.css"></script>
    <script src="layui/layui.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>课程添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    课程名称：<input type="text" name="culum_name" class="input1" />
                </div>
                <div class="bbD">
                    课程分类选择框：<select class="input3" name="c_cate_id">
                        <option value="0">请选择</option>
                        @foreach($data as $key=>$val)
                        <option value="{{$val['c_cate_id']}}"><?php echo str_repeat("&nbsp;&nbsp;",$val['level'])?>{{$val['c_cate_name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="bbD">
                    课程学时：<input type="text" name="culum_hours" class="input1" />
                </div>
                <div class="bbD">
                    授课讲师：<select class="input3" name="teacher_id">
                        <option value="0">请选择</option>
                        @foreach($teacher as $key=>$val)
                            <option value="{{$val['teacher_id']}}">{{$val['teacher_name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="bbD">
                    课程价格：<input type="text" name="culum_price" class="input1" />
                </div>
                <div class="bbD">
                    课程介绍：<textarea name="culum_desc" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="bbD">
                    课程状态：<input type="radio" name="culum_status" checked value="1">上架
                              <input type="radio" name="culum_status" value="2">不上架
                </div>
                <div class="bbD">
                    课程图片：
                    <div class="bbDd">
                        <div class="bbDImg">+</div>
                        <input type="hidden" class="uplo" value="">
                        <input type="file" class="file" id="file" name="file" />
                    </div>
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" href="#" onclick="goods_add()">提交</button>
                        <a class="btn_ok btn_no" href="goods">取消</a>
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
    function goods_add() {
        layui.use('layer', function() { //独立版的layer无需执行这一句
            var layer = layui.layer;
            var data = {};
            data.culum_name = $("[name='culum_name']").val();
            data.c_cate_id = $("[name='c_cate_id']").val();
            data.culum_price = $("[name='culum_price']").val();
            data.teacher_id = $("[name='teacher_id']").val();
            data.culum_hours = $("[name='culum_hours']").val();
            data.culum_desc = $("[name='culum_desc']").val();
            data.culum_status = $("[name='culum_status']").val();
            data.culum_img = $(".uplo").val();
            console.log(data)
            var url = "goods_add";
            $.ajax({
                type: "post",
                data: data,
                url: url,
                success: function (msg) {
                    layer.msg(msg.msg);
                    if(msg.code==100){
                        window.location.href="goods_show";
                    }
                }
            })

        })
    }
</script>