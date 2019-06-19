<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>新闻添加-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <link rel="stylesheet" href="layui/css/layui.css">
    <script src="layui/layui.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/ajaxfileupload.js"></script>
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
                <a href="#">新闻管理</a>
                &nbsp;-
            </span>
            &nbsp;新闻展示
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        {{--<div class="banneradd bor">--}}
        <div class="baTopNo">
            <span>新闻展示</span>
        </div>
        <div class="baBody">
            <div class="bbD">
                <div class="cfD" style="text-align: center;">
                    <form action="mationShow" method="post">
                        <select class="input3" name="cate_id">
                            <option value="0">请选择</option>
                            @foreach($catedata as $k=>$v)
                                <option value="{{$v->mcate_id}}" @if( $cate_id == $v->mcate_id) selected @endif >{{$v->mcate_name}}</option>
                            @endforeach
                        </select>
                        <input class="userinput" value="{{$search}}" name="search" type="text" placeholder="输入新闻标题">
                        <button type="submit" class="userbtn">搜索</button>
                    </form>
                </div>
            </div>
            <br><br>
            <table border="1" cellspacing="0" cellpadding="0">
                <tr>
                <tr>
                    <td width="66px" class="tdColor tdC">序号</td>
                    <td width="200px" class="tdColor">新闻标题</td>
                    <td width="250px" class="tdColor">是否展示</td>
                    <td width="280px" class="tdColor">添加时间</td>
                    <td width="230px" class="tdColor">操作</td>
                </tr>
                @foreach($mationInfo as $v)
                    <tr mation_id={{$v->mation_id}}>
                        <td class="abc" height="60">{{$v->mation_id}}</td>
                        <td class="abc">{{$v->mation_title}}</td>
                        <td class="abc" width="50px">
                            <form  class="layui-form">
                                <div class="layui-form-item sdasd" >
                                    @if($v->is_show ==1)
                                        <input type="checkbox" checked  name="like[write]"   title="是否展示">
                                    @else
                                        <input type="checkbox"  name="like[write]"   title="是否展示">
                                    @endif
                                </div>
                            </form>
                        </td>
                        <td><?php echo date("Y-m-d H:i:s",$v->create_time)?></td>
                        <td mation_id={{$v->mation_id}}>
                            <a href="mationUpdate?mation_id={{$v->mation_id}}"><img class="operation" src="img/update.png"></a>
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
                {!! $mationInfo->appends(["cate_id"=>$cate_id,'search'=>$search]) !!}
            </div>
        </div>
    </div>
    <!-- 上传广告页面样式end -->
    {{--</div>--}}
</div>
</body>
</html>
<script>
    $(".pagination li a").each(function(i,v){
        var href=$(this).attr('href');
        href=href.replace("http://","");
        var sss=href.indexOf("/");
        href="http://192.168.217.128:8090"+href.substring(sss);
        $(this).attr("href",href);
    });



    layui.use(['layer','form'], function() {
        var layer = layui.layer;
        var form = layui.form;

        //是否展示
        $('.layui-unselect').click(function(){
            var _this = $(this);
            var aa = _this.hasClass('layui-form-checked');
            var mation_id = _this.parents('tr').attr('mation_id');
            if(aa == false){
                var is_show = 0;
            }else{
                var is_show = 1;
            }
            $.post(
                'mationIsShow',
                {is_show:is_show,mation_id:mation_id},
                function(res){
                    if(res.code==0){
                        layer.msg(res.msg);
                    }else{
                        layer.msg(res.msg);
                    }
                },'json'
            )
        })




    })
    layui.use('layer', function() {
        var layer = layui.layer;
        $('.delban').click(function(){
            var _this = $(this);
//            alert(111)
            var mation_id = $(this).parent().attr('mation_id');

            layer.open({
                type:0,
                content: '是否确认删除？',
                btn:['确认','取消'],
                yes:function(index,layero){
                    $.post(
                        'mationDel',
                        {mation_id:mation_id},
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
        //设为头条
        $('.layui-btn-normal').click(function(){
            var _this = $(this);
//            alert(111)
            var news_id = $(this).parent().attr('news_id');
            $.post(
                'newsDo',
                {news_id:news_id},
                function(res){
                    layer.msg(res.msg);
                },'json'
            )
        })
        $(".gonggao").click(function(){
            var news_id = $(this).parent().attr('news_id');
            $.post(
                'gaiGongGao',
                {news_id:news_id},
                function(res){
                    layer.msg(res.msg);
                },'json'
            )
        })

        $('.zxcvbn').click(function(){
            var news_id = $(this).parent().attr('news_id');
            $.post(
                'jingtai',
                {news_id:news_id},
                function(res){
                    layer.msg(res.msg);
                },'json'
            )
        })

//        //搜索
//        $('#adbgabd').click(function(){
//            var name = $('#namesa').val();
//            $.post(
//                'newsList',
//                {name:name},
//                function(res){
//                    console.log(res)
//                }
//            )
//        })

    })
</script>