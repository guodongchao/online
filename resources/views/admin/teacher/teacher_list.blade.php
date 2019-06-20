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
                <a href="#">讲师管理</a>
                &nbsp;-
            </span>
            &nbsp;讲师管理
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        {{--<div class="banneradd bor">--}}
        <div class="baTopNo">
            <span>讲师管理</span>
        </div>
        <div class="baBody">

            <table border="1" cellspacing="0" cellpadding="0">
                <tr>
                <tr>
                    <td width="66px" class="tdColor tdC">讲师id</td>
                    <td width="200px" class="tdColor">讲师名称</td>
                    <td width="200px" class="tdColor">讲师涉及能力</td>
                    <td width="220px" class="tdColor">讲师简介</td>
                    <td width="220px" class="tdColor">讲师授课风格</td>
                    <td width="220px" class="tdColor">讲师头像</td>
                    <td width="220px" class="tdColor">讲师状态</td>
                    <td width="220px" class="tdColor">讲师入职时间</td>
                    <td width="250px" class="tdColor">操作</td>
                </tr>
                @foreach($data as $v)
                    <tr >
                        <td class="abc" height="60">{{$v['teacher_id']}}</td>
                        <td class="abc">{{$v['teacher_name']}}</td>
                        <td class="abc">{{$v['teacher_type']}}</td>
                        <td class="abc">{{$v['teacher_desc']}}</td>
                        <td class="abc">{{$v['teacher_style']}}</td>
                        <td class="abc"><img src="{{$v['teacher_img']}}" alt="" width="200px" height="100px"></td>
                        <td class="abc">@if($v['teacher_status']==1)
                                            在职
                            @else
                                            离职
                            @endif
                        </td>
                        <td><?php echo date("Y-m-d H:i:s",$v['teacher_time'])?></td>
                        <td>
                            <a href="teacher_update?teacher_id={{$v['teacher_id']}}"><img class="operation" src="img/update.png"></a>
                            <img class="operation delban" teacher_id="{{$v['teacher_id']}}" src="img/delete.png">
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="paging">
        <div id="pull_right">
            <div class="pull-right">
                {!! $data->render() !!}
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

        });





        layui.use('layer', function() {
            var layer = layui.layer;
            $('.delban').click(function(){
                var _this = $(this);
                var teacher_id = $(this).attr('teacher_id');
                layer.open({
                    type:0,
                    content: '是否确认删除？',
                    btn:['确认','取消'],
                    yes:function(index,layero){
                        $.post(
                            'teacher_del',
                            {teacher_id:teacher_id},
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