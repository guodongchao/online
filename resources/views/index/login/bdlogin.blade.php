<!doctype html>
<html><!-- InstanceBegin template="/Templates/dwt.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>谋刻职业教育在线测评与学习平台</title>

    <link rel="stylesheet" href="css/course.css"/>
    <link rel="stylesheet" href="/layui/css/layui.css"/>
    <link rel="stylesheet" href="css/register-login.css"/>
    <script src="js/jquery-1.8.0.min.js"></script>
    <link rel="stylesheet" href="css/tab.css" media="screen">
    <script src="js/jquery.tabs.js"></script>
    <script src="js/mine.js"></script>
    <script src="/layui/layui.js"></script>
</head>
<body>
<div class="login" style="background:url(images/12.jpg) right center no-repeat #fff">
    <h2>微信绑定</h2>
    <input type="hidden" id="openid" openid="{{$openid}}">
    <div>
        <p class="formrow">
            <label class="control-label" for="register_email">帐号</label>
            <input type="text" placeholder="请输入Email地址 / 用户昵称" id="u_name">
        </p>

    </div>
    <div>
        <p class="formrow">
            <label class="control-label" for="register_email">密码</label>
            <input type="password" id="u_pwd">
        </p>
    </div>
    <div class="loginbtn">
        <label><input type="checkbox"  checked="checked"> <span class="jzmm">记住密码</span> </label>&nbsp;&nbsp;
        <button type="submit" class="uploadbtn ub1" id="btn">绑定</button>

    </div>
    <div class="loginbtn lb">
        <a href="register" class="link-muted">还没有账号？立即免费注册</a>
        <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
        <a href="forgetpassword" target="main" class="link-muted">找回密码</a>
    </div>
    <div class="hezuologo">
        <span class="hezuo">使用合作网站账号登录</span>
        <div class="hezuoimg">
            <a href="#"><img src="images/hezuoqq.png" class="hzqq" title="QQ" width="40" height="40"/></a>
            {{--<a href="{{$url}}"><img src="images/weixin.png" class="hzwx" title="微信" width="40" height="40"/></a>--}}
            <a href="getImg" target="main"  id="getImg"><img src="images/weixin.png" class="hzwx" title="微信" width="40" height="40"/></a>
            <a href="#"><img src="images/hezuowb.png" class="hzwb" title="微博" width="40" height="40"/></a>
        </div>

    </div>
</div>
<!-- InstanceEndEditable -->


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
<!--右侧浮动-->
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
    $('#btn').click(function(){
        var u_name=$('#u_name').val();
        if(u_name==''){
            alert('账号不能为空');
            return false;
        }
        var u_pwd=$('#u_pwd').val();
        if(u_pwd==''){
            alert('密码不能为空');
            return false;
        }
        var openid=$('#openid').val();
        console.log(openid)
        $.ajax({
            url:"/index/bdweixin",
            type:"post",
            data:{u_name:u_name,u_pwd:u_pwd,openid:openid},
            success:function(data){
                alert(data.msg);
                if(data.code ==200){
                    location.href ="/index/index";
                }
            }
        })
    })



</script>