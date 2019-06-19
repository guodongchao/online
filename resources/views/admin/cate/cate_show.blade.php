<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>约见管理-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="layui/css/layui.css"></script>
    <script src="layui/layui.js"></script>
    <style>
        .x-show{
            font-size: 10px;
            display: inline-block;
            height:10px;
        }
        .tdColor2 {
            height: 40px;
        }
    </style>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
<div id="pageAll">


    <div class="page">
        <!-- banner页面样式 -->
        <div class="connoisseur">
            <div class="conform">
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
                        <input class="addUser" type="text" placeholder="输入课程分类名称" />
                        <button class="button">搜索</button>
                    </div>
                {{--</form>--}}
            </div>
            <!-- banner 表格 显示 -->
            <div class="conShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <td width="88px" class="tdColor tdC">课程分类id</td>
                        <td width="355px" class="tdColor">课程分类名称</td>
                        <td width="355px" class="tdColor">创建时间</td>
                        {{--<td width="355px" class="tdColor">排序</td>--}}
                        <td width="130px" class="tdColor">操作</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $val)
                    <tr cate-id="{{$val['c_cate_id']}}" fid="{{$val['c_parent_id']}}">
                        <td width="66px" class="tdColor tdC ">{{$val['c_cate_id']}}</td>
                        <td width="355px" class="tdColor">
                            <a href="#" class="layui-icon x-show" status="true" >＋</a>
                            {{$val['c_cate_name']}}
                        </td>
                        <td width="355px" class="tdColor">{{date("Y-m-d H:i:s",$val['c_create_time'])}}</td>
                        {{--<td width="355px" class="tdColor"><span class="cli" val="{{$val['c_cate_id']}}">{{$val['c_cate_sort']}}</span></td>--}}
                        <td><a href="cate_update?cate_id={{$val['c_cate_id']}}"><img class="operation" src="img/update.png"></a>
                            <img class="operation delban" src="img/delete.png" onclick="cate_del($(this),{{$val['c_cate_id']}})">
                        </td>
                    </tr>
                    @if($val['son'])
                    @foreach($val['son'] as $k=>$v)
                    <tr cate-id="{{$v['c_cate_id']}}" fid="{{$v['c_parent_id']}}">
                        <td width="66px" class="tdColor2 tdC ">{{$v['c_cate_id']}}</td>
                        <td width="355px" class="tdColor2">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{$v['c_cate_name']}}
                        </td>
                        <td width="355px" class="tdColor2">{{date("Y-m-d H:i:s",$v['c_create_time'])}}</td>
                        {{--<td width="355px" class="tdColor"><span class="cli" val="{{$val['c_cate_id']}}">{{$val['c_cate_sort']}}</span></td>--}}
                        <td><a href="cate_update?cate_id={{$v['c_cate_id']}}"><img class="operation" src="img/update.png"></a>
                            <img class="operation delban" src="img/delete.png" onclick="cate_del($(this),{{$v['c_cate_id']}})">
                        </td>
                    </tr>
                        @endforeach
                    @endif
                   @endforeach
                    </tbody>
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
    $(function(){
        $("tbody tr[fid!='0']").hide();
        // 栏目多级显示效果
        $('.x-show').click(function () {
            if($(this).attr('status')=='true'){
                $(this).html('－');
                $(this).attr('status','false');
                cateId = $(this).parents('tr').attr('cate-id');
                $("tbody tr[fid="+cateId+"]").show();
            }else{
                cateIds = [];
                $(this).html('＋');
                $(this).attr('status','true');
                cateId = $(this).parents('tr').attr('cate-id');
                getCateId(cateId);
                for (var i in cateIds) {
                    $("tbody tr[cate-id="+cateIds[i]+"]").hide().find('.x-show').html('&#xe623;').attr('status','true');
                }
            }
        })
        var cateIds = [];
        function getCateId(cateId) {
            $("tbody tr[fid="+cateId+"]").each(function(index, el) {
                id = $(el).attr('cate-id');
                cateIds.push(id);
                getCateId(id);
            });
        }
    })
    function cate_del(obj, cate_id) {
        layui.use('layer', function() { //独立版的layer无需执行这一句
            var layer = layui.layer;
                var url = "cate_del";
                layer.confirm('您确定要删除么?', {icon: 3, title:'提示'}, function(index){
                    $.ajax({
                        type: "post",
                        data: {cate_id: cate_id},
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
            var url = "/admin/cate_search";
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