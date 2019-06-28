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
    <frame src="header1" name="headmenu" id="mainFrame" title="mainFrame"><!-- 引用头部 -->

<body>
<input type="hidden" id="uid" value="{{$uid}}">
<div class="register" style="background:url(images/13.jpg) right center no-repeat #fff">
    <h2>修改密码</h2>
    <div class="formrow">
        <label class="control-label" for="register_email">旧密码</label>
        <input type="password" id="u_pwd" onblur="check_pwd()">
        <span id="old_span"></span>
    </div>
    <div class="formrow">
        <label class="control-label" for="register_email">新密码</label>
        <input type="password" id="u_pwds" onblur="check_pwds()">
        <span id="new_span" class="text-danger"></span>
    </div>
    <div class="loginbtn reg">
        <button type="submit" class="uploadbtn ub1" id="btn">确定</button>
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
    function check_pwd(){
        var u_pwd=$('#u_pwd').val();
        if(u_pwd.length<5){
            var str="<font color='red'><img src='/img/cuo.png'>密码输入错误</font>";
            $('#old_span').html(str);
            return false;
        }else{
            $('#old_span').html("");
            return true;
        }
    }
    function check_pwds(){
        var u_pwds=$('#u_pwds').val();
        if(u_pwds==''){
            var str="<font color='red'><img src='/img/cuo.png'>请输入新密码</font>";
            $('#new_span').html(str);
            return false;
        }
        var pwd_reg= /^\w{5,20}$/;
        if(pwd_reg.test(u_pwds)==false){
            var str="<font color='red'><img src='/img/cuo.png'>5-20位英文、数字、符号，区分大小写</font>";
            $('#new_span').html(str);
            return false;
        }else{
            $('#new_span').html("");
            return true;
        }
    }
    $('#btn').click(function(){
        var old_pwd=check_pwd();
        var new_pwd= check_pwds();
        if(old_pwd&&new_pwd==true) {
            var u_pwd = $('#u_pwd').val();
            var u_pwds = $('#u_pwds').val();
            var uid = $('#uid').val();
            $.ajax({
                url: "/index/myrepasswordDo",
                data: {u_pwds:u_pwds,u_pwd:u_pwd,uid:uid},
                type: "post",
                dataType: "json",
                success: function (data) {
                    alert(data.msg);
                    if (data.code == 200) {
                        location.href = "/index/quit";
                    }
                }
            })
        }
    })
</script>








