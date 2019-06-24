<!DOCTYPE html>
<!-- saved from url=(0042)flipin.html -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>谋刻职业教育在线测评与学习平台</title>
    <link href="/css/demo.css" rel="stylesheet" type="text/css">
    <!--Framework-->
    <script src="/js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="/js/jquery-ui.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/tab.css" media="screen">
    <script src="js/jquery.tabs.js"></script>
    <script src="js/mine.js"></script>
    <script src="js/jquery-1.8.0.min.js"></script>
    <!--End Framework-->
    <script src="/js/jquery.ffform.js" type="text/javascript"></script>
</head>
<body>
<div class="container" style="border-bottom: 0;">
    修改信息
</div>
<div class="container">
    <div  class="contact"  id="form">
        <input type="hidden" id="u_id" value="{{$userInfo['u_id']}}">
        <div class="row clearfix">
            <div class="lbl">
                <label for="email">
                    头像
                </label>
            </div>
            <div class="ctrl">
                @if(empty($userInfo['u_img']))
                    <div style="text-align:left;"><img src="images/0-0.JPG" width="80" ></div>
                @else
                    <div style="text-align:left;"><img src="{{$userInfo['u_img']}}" width="80" ></div>
                @endif
            </div>
        </div>
        <div class="row clearfix">
            <div class="lbl">
                <input type="hidden"  id="old_name" value="{{$userInfo['u_name']}}">
                <label for="name">
                    昵称
                </label>
            </div>
            <div class="ctrl">
                <input type="text" id="u_name" value="{{$userInfo['u_name']}}" data-required="true" data-validation="text" onblur="check_name()">
                <span class="text-danger" id="name_span"></span>
            </div>
        </div>
        <div class="row clearfix">
            <div class="lbl">
                <input type="hidden"  id="old_email" value="{{$userInfo['u_email']}}">
                <label for="email">
                    邮箱
                </label>
            </div>
            <div class="ctrl">
                <input type="text" id="u_email" value="{{$userInfo['u_email']}}" data-required="true" data-validation="email" onblur="check_email()">
                <span class="text-danger" id="email_span"></span>
            </div>
        </div>
        <div class="row clearfix">
            <div class="lbl">
                <label for="email">
                    手机号
                </label>
            </div>
            <div class="ctrl">
                <input type="text" id="u_tel" value="{{$detailInfo['u_tel']}}" data-required="true" data-validation="custom">
            </div>
        </div>
        <div class="row  clearfix">
            <div class="span10 offset2">
                <input type="submit" name="submit" id="submit" class="submit" value="确定">
            </div>
        </div>
        <div id="validation">
        </div>
    </div>
</div>
</body>
</html>
<script>
    function check_email() {
        var u_email = $('#u_email').val();
        var old_email = $('#old_email').val();
        if (u_email == '') {
            var str = "<font color='red'><img src='/img/cuo.png'>请输入邮箱</font>";
            $('#email_span').html(str);
            return false;
        }
        var email_reg = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/g;
        var flag;
        if (email_reg.test(u_email) == false) {
            var str = "<font color='red'><img src='/img/cuo.png'>请正确输入邮箱格式</font>";
            $('#email_span').html(str);
            return false;
        } else {
            $.ajax({
                url:"/index/emailOnly",
                data:{type:2,u_email:u_email,old_email:old_email},
                type:"post",
                dataType:"json",
                success:function(msg){
                    if(msg==1){
                        $('#email_span').html("<font color='red'><img src='/img/cuo.png'>邮箱已存在</font>");
                        flag = false;
                    }else if(msg==2){
                        $('#email_span').html("<img src='/img/dui.png'>");
                        flag = true;
                    }
                }
            })
            return flag;
        }
    }
    function check_name() {
        var u_name = $('#u_name').val();
        var old_name = $('#old_name').val();
        var u_id = $('#u_id').val();
        if (u_name == '') {
            var str = "<font color='red'><img src='/img/cuo.png'>请输入昵称</font>";
            $('#name_span').html(str);
            return false;
        }
        var name_reg = /^[\u4e00-\u9fa5]{1,7}$|^[A-Za-z]{1,14}$/;
        var flag;
        if (name_reg.test(u_name) == false) {
            var str = "<font color='red'><img src='/img/cuo.png'>中、英文均可，最长14个英文或7个汉字</font>";
            $('#name_span').html(str);
            return false;
        } else {
            $.ajax({
                url:"/index/only",
                data:{type:2,u_name:u_name,old_name:old_name},
                type:"post",
                dataType:"json",
                success:function(msg){
                    if(msg==1){
                        $('#name_span').html("<font color='red'><img src='/img/cuo.png'>昵称已存在</font>");
                        flag = false;
                    }else if(msg==2){
                        $('#name_span').html("<img src='/img/dui.png'>");
                        flag = true;
                    }
                }
            })
            return flag;
        }
    }
</script>

























