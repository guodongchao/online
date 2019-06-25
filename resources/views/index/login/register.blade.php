<!doctype html>
<html><!-- InstanceBegin template="/Templates/dwt.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>谋刻职业教育在线测评与学习平台</title>

<link rel="stylesheet" href="css/course.css"/>
<link rel="stylesheet" href="css/register-login.css"/>
<script src="js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="css/tab.css" media="screen">
<script src="js/jquery.tabs.js"></script>
<script src="js/mine.js"></script>
</head>
<body>
<div class="register" style="background:url(images/13.jpg) right center no-repeat #fff">
    <h2>注册</h2>
    <div class="formrow">
       <label class="control-label" for="register_email">邮箱地址</label>
        <input type="text" id="u_email" onblur="check_email()">
        <span class="text-danger" id="email_span">请输入邮箱地址</span>
    </div>
    <div class="formrow">
       <label class="control-label" for="register_email">昵称</label>
        <input type="text" id="u_name" onblur="check_name()">
        <span class="text-danger" id="name_span">中、英文均可，最长14个英文或7个汉字</span>
    </div>
    <div class="formrow">
        <label class="control-label" for="register_email">密码</label>
        <input type="password" id="u_pwd" onblur="check_pwd()">
        <span class="text-danger" id="pwd_span">5-20位英文、数字、符号，区分大小写</span>
    </div>
    <div class="formrow">
        <label class="control-label" for="register_email">确认密码</label>
        <input type="password" id="u_pwds" onblur="check_pwds()">
        <span class="text-danger" id="pwds_span">再输入一次密码</span>
    </div>
        <div class="loginbtn reg">
        <button type="submit" class="uploadbtn ub1" id="btn">注册</button>
    </div>
</div>
<div class="clearh"></div>
<div class="foot">
    <div class="fcontainer">
        <div class="fwxwb">
            <div class="fwxwb_1">
                <span>关注微信</span><img width="95" alt="" src="images/num.png">
            </div>
            <div>
                <span>关注微博</span><img width="95" alt="" src="images/wb.png">
            </div>
        </div>
        <div class="fmenu">
            <p><a href="#">关于我们</a> | <a href="#">联系我们</a> | <a href="#">优秀讲师</a> | <a href="#">帮助中心</a> | <a href="#">意见反馈</a> | <a href="#">加入我们</a></p>
        </div>
        <div class="copyright">
            <div><a href="/">谋刻网</a>所有&nbsp;晋ICP备12006957号-9</div>
        </div>
    </div>
</div>
<div class="rmbar">
    <span class="barico qq" style="position:relative">
    <div  class="showqq">
        <p>官方客服QQ:<br>335049335</p>
    </div>
    </span>
    <span class="barico em" style="position:relative">
        <img src="images/num.png" width="75" class="showem">
    </span>
    <span class="barico wb" style="position:relative">
        <img src="images/wb.png" width="75" class="showwb">
    </span>
    <span class="barico top" id="top">置顶</span>
</div>
</body>
</html>
<script>
    function check_email() {
        var u_email = $('#u_email').val();
        if (u_email == '') {
            var str = "<font color='red'><img src='/img/cuo.png'>请输入邮箱</font>";
            $('#email_span').html(str);
            return false;
        }
        var email_reg = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/g;
        if (email_reg.test(u_email) == false) {
            var str = "<font color='red'><img src='/img/cuo.png'>请正确输入邮箱格式</font>";
            $('#email_span').html(str);
            return false;
        } else {
            $.ajax({
                url:"/index/emailOnly",
                data:{type:1,u_email:u_email},
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
    $('#u_email').focus(function(){
        $('#email_span').html("请输入邮箱地址");
    })
    function check_name(){
        var u_name=$('#u_name').val();
        if(u_name==''){
            var str="<font color='red'><img src='/img/cuo.png'>请输入昵称</font>";
            $('#name_span').html(str);
            return false;
        }
        var name_reg= /^[\u4e00-\u9fa5]{1,7}$|^[A-Za-z]{1,14}$/;
        if(name_reg.test(u_name)==false){
            var str="<font color='red'><img src='/img/cuo.png'>中、英文均可，最长14个英文或7个汉字</font>";
            $('#name_span').html(str);
            return  false;
        }else{
            $.ajax({
                url:"/index/only",
                data:{type:1,u_name:u_name},
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
    $('#u_name').focus(function(){
        $('#name_span').html("中、英文均可，最长14个英文或7个汉字");
    })
    function check_pwd(){
        var u_pwd=$('#u_pwd').val();
        if(u_pwd==''){
            var str="<font color='red'><img src='/img/cuo.png'>请输入密码</font>";
            $('#pwd_span').html(str);
            return false;
        }
        var pwd_reg= /^\w{5,20}$/;
        if(pwd_reg.test(u_pwd)==false){
            var str="<font color='red'><img src='/img/cuo.png'>5-20位英文、数字、符号，区分大小写</font>";
            $('#pwd_span').html(str);
            return false;
        }else{
            $('#pwd_span').html("<img src='/img/dui.png'>");
            return true;
        }
    }
    $('#u_pwd').focus(function(){
        $('#pwd_span').html("5-20位英文、数字、符号，区分大小写");
    })
    function check_pwds(){
        var u_pwd=$('#u_pwd').val();
        var u_pwds=$('#u_pwds').val();
        if(u_pwds==''){
            var str="<font color='red'><img src='/img/cuo.png'>请输入确认密码</font>";
            $('#pwds_span').html(str);
            return false;
        }
        if(u_pwd!==u_pwds){
            var str="<font color='red'><img src='/img/cuo.png'>确认密码必须与密码一致</font>";
            $('#pwds_span').html(str);
            return false;
        }else{
            $('#pwds_span').html("<img src='/img/dui.png'>");
            return true;
        }
    }
    $('#u_pwds').focus(function(){
        $('#pwds_span').html("再输入一次密码");
    })
    $('#btn').click(function(){
         var email=check_email();
         var dd=check_name();
         var aa=check_pwd();
        var cc= check_pwds();
        if(email&&dd&&aa&&cc==true) {
            var u_email = $('#u_email').val();
            var u_name = $('#u_name').val();
            var u_pwd = $('#u_pwd').val();
            $.ajax({
                url: "/index/registerDo",
                data: {u_email: u_email, u_name: u_name, u_pwd: u_pwd},
                type: "post",
                dataType: "json",
                success: function (data) {
                    alert(data.msg);
                    if (data.code == 200) {
                        location.href = "/index/login";
                    }
                }
            })
        }
    })
</script>








