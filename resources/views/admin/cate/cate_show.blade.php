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
                        <td width="88px" class="tdColor tdC">课程分类id</td>
                        <td width="355px" class="tdColor">课程分类名称</td>
                        <td width="355px" class="tdColor">创建时间</td>
                        <td width="355px" class="tdColor">排序</td>
                        <td width="130px" class="tdColor">操作</td>
                    </tr>
                    @foreach($data as $val)
                    <tr>
                        <td width="66px" class="tdColor tdC">{{$val['c_cate_id']}}</td>
                        <td width="355px" class="tdColor">{{$val['c_cate_name']}}</td>
                        <td width="355px" class="tdColor">{{date("Y-M-D H:i:s",$val['c_create_time'])}}</td>
                        <td width="355px" class="tdColor">{{$val['c_cate_sort']}}</td>
                        <td><a href="cate_update?cate_id={{$val['c_cate_id']}}"><img class="operation" src="img/update.png"></a>
                            <img class="operation delban" src="img/delete.png" onclick="cate_del()">
                        </td>
                    </tr>
                   @endforeach
                </table>
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>

</body>

</html>
<script>
    function cate_del() {
        alert(111);
    }
</script>