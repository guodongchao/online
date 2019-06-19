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
                        <td width="66px" class="tdColor tdC">角色id</td>
                        <td width="355px" class="tdColor">角色名称</td>
                        <td width="130px" class="tdColor">操作</td>
                    </tr>
                    @foreach($roleInfo as $v)
                    <tr>
                        <td>{{$v['role_id']}}</td>
                        <td>{{$v['role_name']}}</td>
                        <td>
                            <a href="/admin/role_update/{{$v['role_id']}}"><img class="operation" src="img/update.png"></a>
                            <img class="operation delban role_del" src="img/delete.png" role_id="{{$v['role_id']}}">
                            <a href="/admin/rolepower/{{$v['role_id']}}">权限</a>
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
    $(document).on('click','.role_del',function(){
        var role_id=$(this).attr('role_id');
        $.ajax({
            url:"/admin/role_del",
            type:"post",
            data:{role_id:role_id},
            dataType:"json",
            success:function(data){
                alert(data.msg);
                if(data.code ==200){
                    location.href ="/admin/role_show";
                }
            }
        })
    })
</script>