<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>约见管理-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="layui/css/layui.css"></script>
    <script src="layui/layui.js"></script>
    <script src="admin/css/page3.css"></script>
    <style>
        input[type="checkbox"]{width:20px;height:20px;display: inline-block;text-align: center;vertical-align: middle; line-height: 20px;position: relative;}
        input[type="checkbox"]::before{content: "";position: absolute;top: 0;left: 0;background: #fff;width: 100%;height: 100%;border: 1px solid #d9d9d9}
        input[type="checkbox"]:checked::before{content: "\2713";background-color: #fff;position: absolute;top: 0;left: 0;width:100%;border: 1px solid #ff4e00;color: #ff4e00;font-size: 13px;font-weight: bold;}
    </style>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
<div id="pageAll">


    <div class="page">
        <!-- banner页面样式 -->
        <div class="connoisseur">
            {{--<div class="conform">--}}
                {{--<form>--}}
                    {{--<div class="cfD">--}}
                        {{--时间段：<input class="vinput" type="text" />&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;--}}
                        {{--<input class="vinput vpr" type="text" /> 审核状态：<label><input--}}
                                    {{--type="radio" checked="checked" name="styleshoice1" />&nbsp;未审核</label> <label><input--}}
                                    {{--type="radio" name="styleshoice1" />&nbsp;待审核</label> <label><input--}}
                                    {{--type="radio" name="styleshoice1" />&nbsp;待约见</label> <label><input--}}
                                    {{--type="radio" name="styleshoice1" />&nbsp;已完成</label> <label class="lar"><input--}}
                                    {{--type="radio" name="styleshoice1" />&nbsp;已作废</label> 推荐状态：<label><input--}}
                                    {{--type="radio" checked="checked" name="styleshoice2" />&nbsp;未付款</label> <label><input--}}
                                    {{--type="radio" name="styleshoice2" />&nbsp;已付款</label>--}}
                    {{--</div>--}}
                    <div class="cfD">
                        <input class="addUser" type="text" placeholder="输入课程名称/课程分类" />
                        <button class="button">搜索</button>
                    </div>
                {{--</form>--}}
            {{--</div>--}}
            <!-- banner 表格 显示 -->
            <div class="conShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <td width="100px" class="tdColor tdC">课程id</td>
                        <td width="200px" class="tdColor">课程名称</td>
                        <td width="260px" class="tdColor">课程价格</td>
                        <td width="275px" class="tdColor">所需学时</td>
                        <td width="290px" class="tdColor">所属分类</td>
                        <td width="200px" class="tdColor">课程图片</td>
                        <td width="290px" class="tdColor">讲师</td>
                        <td width="200px" class="tdColor">学习人数</td>
                        <td width="290px" class="tdColor">课程简介</td>
                        <td width="200px" class="tdColor">是否上架</td>
                        <td width="200px" class="tdColor">已完结</td>
                        <td width="130px" class="tdColor">操作</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if($data)
                    @foreach($data as $key=>$val)
                    <tr>
                        <td width="100px" >{{$val->culum_id}}</td>
                        <td width="200px" >{{$val->culum_name}}</td>
                        <td width="260px">{{$val->culum_price}}</td>
                        <td width="275px">{{$val->culum_hours}}</td>
                        <td width="290px">{{$val->c_cate_name}}</td>
                        <form  class="layui-form">
                        <td width="290px">
                            <img style="height:100px;width: 100px;" src="{{$val->culum_img}}" alt="">
                        </td>
                        </form>
<<<<<<< HEAD
                        <td width="290px">{{$val->teacher_name}}</td>
                        <td width="290px">{{$val->culum_desc}}</td>
                        <td width="150px" class="layui-form">
=======
                        <td width="290px" class="tdColor">{{$val->teacher_name}}</td>
                        <td width="200px" class="tdColor">{{$val->study_num}}</td>
                        <td width="290px" class="tdColor">{{$val->culum_desc}}</td>
                        <td width="200px" class="tdColor layui-form">
>>>>>>> 9e6ff9c2a34a5eee165833107fd6e54da07bd586
                            @if($val->culum_show==1)
                            <input type="checkbox"  value="1" checked>
                            @else
                            <input type="checkbox"  value="2">
                            @endif
                        </td>
<<<<<<< HEAD
                        <td width="150px">
=======
                        <td width="200px" class="tdColor">
>>>>>>> 9e6ff9c2a34a5eee165833107fd6e54da07bd586
                            @if($val->culum_status==1)
                                <input type="checkbox"  value="1" checked>
                            @else
                                <input type="checkbox"  value="2">
                            @endif
                        </td>
                        <td><a href="goods_update?id={{$val->culum_id}}"><img class="operation" src="img/update.png"></a>
                            <img class="operation delban" src="img/delete.png" onclick="goods_del($(this),{{$val->culum_id}})">
                        </td>
                    </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                {{--<div id="pull_right">--}}
                    {{--<div class="pull-right">--}}
                        {{--{!! $data->render() !!}--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>

</body>

</html>
<script>

    function goods_del(obj,id) {
        layui.use('layer', function() { //独立版的layer无需执行这一句
            var layer = layui.layer;
            var url = "goods_del";
            layer.confirm('您确定要删除么?', {icon: 3, title:'提示'}, function(index){
                $.ajax({
                    type: "post",
                    data: {id: id},
                    url: url,
                    success: function (msg) {
                        layer.msg(msg.msg,{icon: 6})
                        if (msg.code == 100) {
                            obj.parent().parent().empty()
                        }
                    }
                })

                layer.close(index);
            });
        })
    }
    $(".button").click(function(){
        layui.use('layer', function() { //独立版的layer无需执行这一句
            var layer = layui.layer;
            var search = $(".addUser").val();
            var url = "/admin/culum_search";
            $.ajax({
                type: "post",
                url: url,
                data: {search: search},
                success: function (msg) {
                    if (msg.code==201){
                        layer.msg("请填写您要搜索的内容");
                    }else{
                        $("tbody").empty();
                        $("tbody").append(msg.msg);

                    }
                }
            })
        })
    })
</script>