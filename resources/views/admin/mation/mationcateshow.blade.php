<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>导航栏添加-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <link rel="stylesheet" href="layui/css/layui.css">
    <style type="text/css">
        #pull_right{
            text-align:center;
        }
        .pull-right {
            /*float: left!important;*/
        }
        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }
        .pagination > li {
            display: inline;
        }
        .pagination > li > a,
        .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #428bca;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .pagination > li:first-child > a,
        .pagination > li:first-child > span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        .pagination > li:last-child > a,
        .pagination > li:last-child > span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .pagination > li > a:hover,
        .pagination > li > span:hover,
        .pagination > li > a:focus,
        .pagination > li > span:focus {
            color: #2a6496;
            background-color: #eee;
            border-color: #ddd;
        }
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
            z-index: 2;
            color: #fff;
            cursor: default;
            background-color: #428bca;
            border-color: #428bca;
        }
        .pagination > .disabled > span,
        .pagination > .disabled > span:hover,
        .pagination > .disabled > span:focus,
        .pagination > .disabled > a,
        .pagination > .disabled > a:hover,
        .pagination > .disabled > a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }
        .clear{
            clear: both;
        }
    </style>
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" />
            <span>
                <a href="#">首页</a>
                &nbsp;-&nbsp;
                <a href="#">导航栏管理</a>
                &nbsp;-
            </span>
            &nbsp;导航栏展示
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        {{--<div class="banneradd bor">--}}
        <div class="baTopNo">
            <span>导航栏展示</span>
        </div>
        <div class="baBody">

            <table border="1" cellspacing="0" cellpadding="0">
                <tr>
                <tr>
                    <td width="66px" class="tdColor tdC">序号</td>
                    <td width="200px" class="tdColor">分类标题</td>
                    <td width="200px" class="tdColor">是否展示</td>
                    <td width="220px" class="tdColor">添加时间</td>
                    <td width="250px" class="tdColor">操作</td>
                </tr>
                @foreach($catedata as $v)
                    <tr mcate_id={{$v->mcate_id}}>
                        <td class="abc" height="60">{{$v->mcate_id}}</td>
                        <td class="abc">{{$v->mcate_name}}</td>
                        <td class="abc" width="50px">
                            <form  class="layui-form">
                                <div class="layui-form-item sdasd" >
                                    @if($v->is_show == 1)
                                        <input type="checkbox" checked  name="like[write]"   title="是否展示">
                                    @else
                                        <input type="checkbox"  name="like[write]"   title="是否展示">
                                    @endif
                                </div>
                            </form>
                        </td>
                        <td><?php echo date("Y-m-d H:i:s",$v->create_time)?></td>
                        <td mcate_id={{$v->mcate_id}}>
                            <a href="mationCateUpdate?mcate_id={{$v->mcate_id}}"><img class="operation" src="img/update.png"></a>
                            <img class="operation delban" src="img/delete.png">
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="paging">
        <div id="pull_right">
            <div class="pull-right">
                {!! $catedata->render() !!}
            </div>
        </div>
    </div>
    <!-- 上传广告页面样式end -->
    {{--</div>--}}
</div>
</body>
</html>
<script src="layui/layui.js"></script>
<script type="text/javascript" src="js/ajaxfileupload.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
    $(function(){
        layui.use(['layer','form'], function() {
            var layer = layui.layer;
            var form = layui.form;
            //是否展示
            $('.layui-unselect').click(function(){
                var _this = $(this);
                var aa = _this.hasClass('layui-form-checked');
                var mcate_id = _this.parents('tr').attr('mcate_id');
                if(aa == false){
                    var is_show = 0;
                }else{
                    var is_show = 1;
                }
                $.post(
                    'isShow',
                    {is_show:is_show,mcate_id:mcate_id},
                    function(res){
                        if(res.code==0){
                            layer.msg(res.msg);
                        }else{
                            layer.msg(res.msg);
                        }
                    },'json'
                )
            })
        });





        layui.use('layer', function() {
            var layer = layui.layer;
            $('.delban').click(function(){
                var _this = $(this);
//            alert(111)
                var mcate_id = $(this).parent().attr('mcate_id');

                layer.open({
                    type:0,
                    content: '是否确认删除？',
                    btn:['确认','取消'],
                    yes:function(index,layero){
                        $.post(
                            'mationCateDel',
                            {mcate_id:mcate_id},
                            function(res){
                                if(res.code==0){
                                    layer.msg(res.msg);
                                    _this.parents('tr').remove();
                                }else{
                                    layer.msg(res.msg);
                                }
                            },'json'
                        )
                    },
                    btn2:function(){
                        return true;
                    }
                })
            })
        })
    })
</script>