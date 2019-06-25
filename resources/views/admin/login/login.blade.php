<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>登录-有点</title>
    <link rel="stylesheet" type="text/css" href="css/public.css" />
    <link rel="stylesheet" type="text/css" href="css/page.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/public.js"></script>
</head>
<body>

<!-- 登录页面头部 -->
<div class="logHead">
    <img src="img/logLOGO.png" />
</div>
<!-- 登录页面头部结束 -->

<!-- 登录body -->
<div class="logDiv">
    <img class="logBanner" src="img/logBanner.png" />
    <div class="logGet">
        <!-- 头部提示信息 -->
        <div class="logD logDtip">
            <p class="p1">登录</p>
            <p class="p2">有点人员登录</p>
        </div>
        <!-- 输入框 -->
        <div class="lgD">
            <img class="img1" src="img/logName.png" />
            <input type="text" id="admin_name" placeholder="输入用户名" />
        </div>
        <div class="lgD">
            <img class="img1" src="img/logPwd.png" />
            <input type="text" id="admin_pwd" placeholder="输入用户密码" />
        </div>
        <div class="lgD logD2">
            <input type="hidden" id="sid" value="<?php echo $sid;?>"/>
            <input type="text" name="code" id="code" class="getYZM">
            <div class="logYZM">
                <img src="<?php echo $url;?>" id="img">
            </div>
        </div>
        <div class="logC">
            <button id="btn">登 录</button>
        </div>
    </div>
</div>
<!-- 登录body  end -->

<!-- 登录页面底部 -->
<div class="logFoot">
    <p class="p1">版权所有：南京设易网络科技有限公司</p>
    <p class="p2">南京设易网络科技有限公司 登记序号：苏ICP备11003578号-2</p>
</div>
<!-- 登录页面底部end -->
</body>
</html>
<script>
    $(function(){
        //点击替换验证码
        $('#img').click(function(){
            $(this).prop('src',$(this).prop('src'));
        })
        //传递数据
        $('#btn').click(function(){
            var admin_name=$('#admin_name').val();
            var admin_pwd=$('#admin_pwd').val();
            var sid = $('#sid').val();
            var code = $('#code').val();
            console.log(sid)
             console.log(code)
            $.ajax({
                url:'/admin/loginDo',
                data:{sid:sid,code:code,admin_name:admin_name,admin_pwd:admin_pwd},
                type:'post',
                dataType:'json',
                success:function (data){
                    alert(data.msg)
                    if(data.status==200){
                        location.href ="/admin/index";
                    }
                }
            });
        })
    })
</script>