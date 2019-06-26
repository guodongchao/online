<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>约见管理-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/page3.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>
<body>
<div id="pageAll">
    <div class="page">
        <!-- banner页面样式 -->
        <div class="connoisseur">
            <!-- banner 表格 显示 -->
            <div class="conShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">权限id</td>
                        <td width="355px" class="tdColor">功能名称</td>
                        <td width="355px" class="tdColor">方法路由</td>
                        <td width="355px" class="tdColor">是否在导航栏展示</td>
                        <td width="130px" class="tdColor">操作</td>
                    </tr>
                    @foreach($powerInfo as $v)
                    <tr>
                        <td>{{$v['power_id']}}</td>
                        <td>{{$v['power_name']}}</td>
                        <td>{{$v['power_url']}}</td>
                        @if($v['is_show']==1)
                            <td>是</td>
                        @else
                            <td>否</td>
                        @endif
                        <td>
                            <a href="/admin/powerupdate?power_id={{$v['power_id']}}"><img class="operation" src="img/update.png"></a>
                            <img class="operation delban power_del" src="img/delete.png" power_id="{{$v['power_id']}}">
                        </td>
                    </tr>
                    @endforeach
                </table>
                {!! $powerInfo->render() !!}
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>

</body>

</html>
<script>
    $(document).on('click','.power_del',function(){
        var power_id=$(this).attr('power_id');
        $.ajax({
            url:"/admin/powerdel",
            type:"post",
            data:{power_id:power_id},
            dataType:"json",
            success:function(data){
                alert(data.msg);
                if(data.code ==200){
                    location.href ="/admin/powershow";
                }
            }
        })
    })
</script>