<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>约见管理-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
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
                    {{--<div class="cfD">--}}
                        {{--<input class="addUser" type="text" placeholder="输入用户名/ID/手机号/城市" />--}}
                        {{--<button class="button">搜索</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
            <!-- banner 表格 显示 -->
            <div class="conShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="200px" class="tdColor tdC">id</td>
                        <td width="200px" class="tdColor">题名</td>
                        <td width="200px" class="tdColor">题类型</td>
                        <td width="200px" class="tdColor">题分类</td>
                        <td width="200px" class="tdColor">题选择答案</td>
                        <td width="200px" class="tdColor">题正确答案</td>
                        <td width="200px" class="tdColor">添加人</td>
                        <td width="200px" class="tdColor">操作</td>
                    </tr>
                    @foreach($arr as $k=>$v)
                    <tr>
                            <td width="200px" class="tdColor tdC">{{$v['q_id']}}</td>
                            <td width="200px" class="tdColor">{{$v['q_name']}}</td>
                            <td width="200px" class="tdColor">
                                @if($v['q_type']==1)
                                        选择题
                                @else
                                    判断
                                @endif
                            </td>
                            <td width="200px" class="tdColor">{{$v['q_class']}}</td>
                            <td width="200px" class="tdColor">{{$v['q_answer']}}</td>
                            <td width="200px" class="tdColor">{{$v['q_result']}}</td>
                            <td width="200px" class="tdColor">{{$v['u_id']}}</td>
                            <td><a href="brand_update?q_id={{$v['q_id']}}"><img class="operation" src="img/update.png"></a>
                                <img class="operation delban" src="img/delete.png" onclick="brand_del({{$v['q_id']}})">
                            </td>
                    </tr>
                    @endforeach
                </table>
            </div>
                    <div class="pull-right">{{$arr->links()}}</div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>

</body>

</html>
<script>
    function brand_del(q_id) {
        var data={
            q_id:q_id
        }
        $.ajax({
            type:'post',
            data:data,
            url:'/admin/brand_del',
            dataType:'json',
            success:function(data){
                alert(data.msg)
                if(data.error==0){
                    window.location.reload();
                }

            }
        })
    }
</script>