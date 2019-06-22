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
    <style>
        input[type="radio"]{width:15px;height:15px;display: inline-block;text-align: center;vertical-align: middle; line-height: 15px;position: relative;margin-right:5px; }
        input[type="radio"]::before{content: "";position: absolute;top: 0;left: 0;background: #fff;width: 100%;height: 100%;border: 1px solid #d9d9d9}
        input[type="radio"]:checked::before{content: "\2713";background-color: #fff;position: absolute;top: 0;left: 0;width:100%;border: 1px solid #ff4e00;color: #ff4e00;font-size: 8px;font-weight: bold;}
    </style>
</head>
<body>
<div id="pageAll">
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>课程修改</span>
            </div>
            <div class="baBody">
                <input type="hidden" id="culum_id" value="{{$info->culum_id}}">
                <div class="bbD">
                    课程名称：<input type="text" name="culum_name" value="{{$info->culum_name}}" class="input1" />
                </div>
                <div class="bbD">
                    课程分类选择框：<select class="input3" name="c_cate_id">
                        <option value="0">请选择</option>
                        @foreach($data as $key=>$val)
                            <option value="{{$val['c_cate_id']}}" @if($info->culum_id==$val['c_cate_id']) selected @endif><?php echo str_repeat("&nbsp;&nbsp;",$val['level'])?>{{$val['c_cate_name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="bbD">
                    课程学时：<input type="text" name="culum_hours" value="{{$info->culum_hours}}" class="input1" />
                </div>
                <div class="bbD">
                    授课讲师：<select class="input3" name="teacher_id">
                        <option value="0">请选择</option>
                        @foreach($teacher as $key=>$val)
                            <option value="{{$val['teacher_id']}}" @if($val['teacher_id']==$info->teacher_id) selected @endif>{{$val['teacher_name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="bbD">
                    课程价格：<input type="text" name="culum_price" value="{{$info->culum_price}}" class="input1" />
                </div>
                <div class="bbD">
                    课程介绍：<textarea name="culum_desc"  cols="30" rows="10">{{$info->culum_desc}}</textarea>
                </div>
                <div class="bbD">
                    课程状态：
                    <input type="radio" name="culum_status"  value="1" @if($info->culum_status==1) checked @endif>更新中
                    <input type="radio" name="culum_status" value="2" @if($info->culum_status==2) checked @endif>完结
                </div>
                <div class="bbD">
                    课程状态：
                    <input type="radio" name="culum_show"  value="1" @if($info->culum_show==1) checked @endif>上架
                    <input type="radio" name="culum_show" value="2" @if($info->culum_show==2) checked @endif>不上架
                </div>
                <div class="bbD">
                    课程图片：
                    <div class="bbDd">
                        <div class="bbDImg" style="background-image:url({{$info->culum_img}});background-size:cover;">+</div>
                        <input type="hidden" class="uplo" value="{{$info->culum_img}}">
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
//        alert(0);
        layui.use('layer', function() { //独立版的layer无需执行这一句
            var layer = layui.layer;
            var data = {};
            data.culum_id = $("#culum_id").val()
            data.culum_name = $("[name='culum_name']").val();
            data.c_cate_id = $("[name='c_cate_id']").val();
            data.culum_price = $("[name='culum_price']").val();
            data.teacher_id = $("[name='teacher_id']").val();
            data.culum_hours = $("[name='culum_hours']").val();
            data.culum_desc = $("[name='culum_desc']").val();
            data.culum_show = $("[name='culum_show']").val();
            data.culum_status = $("[name='culum_status']").val();
            data.culum_img = $(".uplo").val();
//            console.log(data)
            var url = "goods_update_do";
            $.ajax({
                type: "post",
                data: data,
                url: url,
                success: function (msg) {
                    layer.msg(msg.msg,{time:2000},function(){
                        if(msg.code==100 | msg.code==200){
                            window.location.href="goods_show";
                        }
                    });
                }
            })

        })
    }
</script>