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
                <a href="#">公告管理</a>
                &nbsp;-
            </span>
            &nbsp;公告展示
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        {{--<div class="banneradd bor">--}}
        <div class="baTopNo">
            <span>公告展示</span>
        </div>
        <div class="baBody">

            <table border="1" cellspacing="0" cellpadding="0">
                <tr>
                <tr>
                    <td width="66px" class="tdColor tdC">公告id</td>
                    <td width="200px" class="tdColor">公告内容</td>
                    <td width="200px" class="tdColor">选择分类</td>
                    <td width="200px" class="tdColor">公告分类展示</td>
                    <td width="220px" class="tdColor">公告添加时间</td>
                    <td width="250px" class="tdColor">操作</td>
                </tr>
                @foreach($data['data'] as $v)
                    <tr>
                        <td class="abc" height="60">{{$v['n_id']}}</td>
                        <td class="abc">{{$v['n_name']}}</td>
                        <td>
                            <div class="bbD">
                                课程分类选择框：<select class="input3" name="c_cate_id">
                                    <option value="0">请选择</option>
                                    @foreach($arr as $key=>$val)
                                        <option value="{{$val['c_cate_id']}}"><?php echo str_repeat("&nbsp;&nbsp;",$val['level'])?>{{$val['c_cate_name']}}</option>
                                    @endforeach
                                </select>
                                    <button class="btn_ok btn_yes" onclick="cate({{$v['n_id']}},$(this))" style="width: 100px;height: 30px;background-color: blue; border: none;color: white;" id="btn" href="#" >提交</button>
                            </div>
                        </td>
                        <td>
                            @foreach($v['cate_id'] as $kk=>$vv)
                                {{$vv['c_cate_name']}}
                                <img class="operation"  onclick="cate_del({{$v['n_id']}},{{$vv['c_cate_id']}})" src="img/delete.png"><br>
                            @endforeach
                        </td>
                        <td><?php echo date("Y-m-d H:i:s",$v['n_time'])?></td>
                        <td>
                            <a href="notice_update?n_id={{$v['n_id']}}"><img class="operation" src="img/update.png"></a>
                            <img class="operation delban" n_id="{{$v['n_id']}}" src="img/delete.png">
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    {{--<div class="paging">--}}
        {{--<div id="pull_right">--}}
            {{--<div class="pull-right">--}}
                {{--{!! $data->render() !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- 上传广告页面样式end -->
    {{--</div>--}}
</div>
</body>
</html>
<script src="layui/layui.js"></script>
<script type="text/javascript" src="js/ajaxfileupload.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
    //添加分类
    function cate(n_id,aa){
        var n_id=n_id;
        var c_cate_id=aa.siblings('select').val();
        var data={};
        data.n_id=n_id;
        data.c_cate_id=c_cate_id;
        $.post('n_cate',{data:data},function (res) {
                alert(res.msg);
                window.location.href="notice_list";
        },'json')
    }
    //删除分类
    function cate_del(n_id,c_cate_id){
        var n_id=n_id;
        var c_cate_id=c_cate_id;
        var data={};
        data.n_id=n_id;
        data.c_cate_id=c_cate_id;
        $.post('cate_del',{data:data},function (res) {
            alert(res.msg);
            window.location.href="notice_list";
        },'json')
    }
    $(function(){
        layui.use(['layer','form'], function() {
            var layer = layui.layer;
            var form = layui.form;

        });





        layui.use('layer', function() {
            var layer = layui.layer;
            $('.delban').click(function(){
                var _this = $(this);
                var n_id = $(this).attr('n_id');
                layer.open({
                    type:0,
                    content: '是否确认删除？',
                    btn:['确认','取消'],
                    yes:function(index,layero){
                        $.post(
                            'notice_del',
                            {n_id:n_id},
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
            });
        })
    })
</script>