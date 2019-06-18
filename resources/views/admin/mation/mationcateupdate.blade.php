<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>管理员修改-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <link rel="stylesheet" href="layui/css/layui.css">
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" />
            <span>
                <a href="#">首页</a>
                &nbsp;-&nbsp;
                <a href="#">管理员管理</a>
                &nbsp;-
            </span>
            &nbsp;管理员修改
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTopNo">
                <span>管理员修改</span>
            </div>
            <div class="baBody">

                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理员名称：<input type="text" name="cate_name" value="{{$catedata->mcate_name}}" class="input3" />
                </div>
                <div class="bbD">
                    <form  class="layui-form">
                        <div class="bbD">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;是否展示：
                        @if($catedata->is_show == 1)
                                <input type="checkbox" checked  name="like[write]"   title="是否展示">
                            @else
                                <input type="checkbox"  name="like[write]"   title="是否展示">
                            @endif
                        </div>
                    </form>
                </div>
                <input type="hidden"  name="mcate_id" value="{{$catedata->mcate_id}}">
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" id="btn" href="#" >修改</button>
                        <a class="btn_ok btn_no" href="adminList">取消</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>
</body>
</html>
<script src="layui/layui.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ajaxfileupload.js"></script>
<script>
    $(function(){
        layui.use(['layer','form'], function() {
            var layer = layui.layer;
            var form = layui.form;
        })
    })

    layui.use('layer', function() {
        var layer = layui.layer;
        $('#btn').click(function(){
            var cate_name = $("input[name='cate_name']").val();
            var aa = $('.layui-unselect').hasClass('layui-form-checked');
            var mcate_id = $("input[name='mcate_id']").val();
            if(aa == false){
                var is_show = 0;
            }else{
                var is_show = 1;
            }



            $.post(
                'mationCateUpdateDo',
                {cate_name:cate_name,is_show:is_show,mcate_id:mcate_id},
                function(res){
                    if(res.code==0){
                        layer.open({
                            type:0,
                            content:'修改成功',
                            btn:['返回列表','继续修改'],
                            btn1:function(){
                                location.href="mationCateShow";
                                return true;
                            },
                            btn2:function(){
//                                location.href="adminList";
                                return true;
                            }

                        })
                    }else{
                        layer.msg(res.msg)
                    }

                },'json'
            )
        })
    })
</script>