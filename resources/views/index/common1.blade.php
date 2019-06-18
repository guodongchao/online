<script src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/rev-setting-1.js"></script>
<link rel="stylesheet" href="css/register-login.css"/>
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/tab.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/main.css" id="main-css">
<style>
    .tkbtn{
        display: inline-block;
        width: 60px;
        height: 35px;
        line-height: 35px;
        text-align: center;
        background-color: #00a2d4;
        font-size: 14px;
        color: #ffffff;

    }
</style>
<div class="head" id="fixed">
    <div class="nav">
        <span class="navimg"><a href="index.html"><img border="0" src="images/logo.png"></a></span>
        <ul class="nag">
            <li><a href="courselist.html" class="link1">课程</a></li>
            <li><a href="articlelist.html" class="link1">资讯</a></li>
            <li><a href="teacher.html" class="link1">讲师</a></li>
            <li><a href="exam_index.html" class="link1" target="_blank">题库</a></li>
            <li><a href="askarea.html" class="link1" target="_blank">问答</a></li>
        </ul>

        <span class="massage">
        @if(empty($u_id))
                <span class="exambtn_lore" style="padding-left:450px;">
                 <a class="tkbtn tklog" href="foot" target="main">登录</a>
                 <a class="tkbtn tkreg" href="register.html">注册</a>
            </span>
                @else
                        <!--登录后-->
                <div class="logined">
                    <a href="mycourse.html"  onMouseOver="logmine()" style="width:70px" class="link2 he ico" target="_blank">sherley</a>
                <span id="lne" style="display:none" onMouseOut="logclose()" onMouseOver="logmine()">
                    <span style="background:#fff;">
                        <a href="mycourse.html" style="width:70px; display:block;" class="link2 he ico" target="_blank">sherley</a>
                    </span>
                    <div class="clearh"></div>
                    <ul class="logmine" >
                        <li><a class="link1" href="#">我的课程</a></li>
                        <li><a class="link1" href="#">我的题库</a></li>
                        <li><a class="link1" href="#">我的问答</a></li>
                        <li><a class="link1" href="#">退出</a></li>
                    </ul>
                </span>
                </div>
            @endif
        </span>
    </div>
</div>