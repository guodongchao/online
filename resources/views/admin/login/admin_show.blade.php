<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>约见管理-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
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
                        <td width="66px" class="tdColor tdC">管理员id</td>
                        <td width="355px" class="tdColor">管理员名称</td>
                        <td width="355px" class="tdColor">添加时间</td>
                        <td width="355px" class="tdColor">登陆时间</td>
                        <td width="130px" class="tdColor">操作</td>
                    </tr>
                    @foreach($list as $v)
                    <tr>
                        <td>{{$v['admin_id']}}</td>
                        <td>{{$v['admin_name']}}</td>
                        <td>{{date('Y-m-d H:i:s',$v['add_time'])}}</td>
                        @if($v['last_login_time']=='')
                            <td></td>
                        @else
                            <td>{{date('Y-m-d H:i:s',$v['last_login_time'])}}</td>
                        @endif
                        <td>
                            <a href="/admin/admin_update?admin_id={{$v['admin_id']}}"><img class="operation" src="img/update.png"></a>
                            <img class="operation delban admin_del" src="img/delete.png" admin_id="{{$v['admin_id']}}">
                            <a href="/admin/adminrole/{{$v['admin_id']}}">角色</a>
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
    $(document).on('click','.admin_del',function(){
        var admin_id=$(this).attr('admin_id');
            $.ajax({
            url:"/admin/admin_del",
            type:"post",
            data:{admin_id:admin_id},
            dataType:"json",
            success:function(data){
                alert(data.msg);
                if(data.code ==200){
                    location.href ="/admin/admin_show";
                }
            }
        })
    })
    $(document).on('click','.update',function(){
        var admin_id=$(this).attr('admin_id');
        $.ajax({
            url:"/admin/admin_update",
            type:"post",
            data:{admin_id:admin_id},
            dataType:"json",
            success:function(data){

            }
        })
    })
</script>