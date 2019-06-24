<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>谋刻职业教育在线测评与学习平台</title>

    <script src="js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="js/rev-setting-1.js"></script>
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/tab.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/main.css" id="main-css">
    <!--课程选项卡-->

    <script type="text/javascript">
        function nTabs(thisObj,Num){
            if(thisObj.className == "current")return;
            var tabObj = thisObj.parentNode.id;
            var tabList = document.getElementById(tabObj).getElementsByTagName("li");
            for(i=0; i <tabList.length; i++)
            {
                if (i == Num)
                {
                    thisObj.className = "current";
                    document.getElementById(tabObj+"_Content"+i).style.display = "block";
                }else{
                    tabList[i].className = "normal";
                    document.getElementById(tabObj+"_Content"+i).style.display = "none";
                }
            }
        }
    </script>
</head>

<body>

<div class="head" id="fixed">
    <div class="nav">
        <span class="navimg"><a href="main" target="main"><img border="0" src="images/logo.png"></a></span>
        <ul class="nag">
            <li><a href="courselist" target="main"  class="link1">课程</a></li>
            <li><a href="articlelist" target="main" class="link1">资讯</a></li>
            <li><a href="teacherlist" target="main" class="link1">讲师</a></li>
            <li><a href="question1" class="link1" target="main">题库</a></li>
            <li><a href="comment" class="link1" target="main">问答</a></li>
        </ul>
        <?php if(!empty(session('account'))){?>
            <span class="massage" style="z-index:999">
                <a href="mycourse"  style="width:70px" class="link2 he ico" target="main"><?php echo session('account')?></a>
                <a href="/index/quit"   style="width:70px" class="link2 he" target="_parent">退出</a>
            </span>
        <?php }else{ ?>
            <span class="massage" style="z-index:999">
                <a href="/index/login"  style="width:70px" class="link2 he " target="main">登录</a>
                <a href="/index/register"   style="width:70px" class="link2 he" target="_parent">注册</a>
            </span>
        <?php } ?>
    </div>
</div>
</body>
</html>
<script>
    function logmine(){
        document.getElementById("lne").style.display="block";
    }
    function logclose(){
        document.getElementById("lne").style.display="none";
    }

    /*右侧客服飘窗*/
    $(".label_pa li").click(function() {
        $(this).siblings("li").find("span").css("background-color", "#fff").css("color", "#666");
        $(this).find("span").css("background", "#fb5e55").css("color", "#fff");
    });
    $(".em").hover(function() {
        $(".showem").toggle();
    });
    $(".qq").hover(function() {
        $(".showqq").toggle();
    });
    $(".wb").hover(function() {
        $(".showwb").toggle();
    });
    $("#top").click(function() {
        if (scroll == "off") return;
        $("html,body").animate({
                scrollTop: 0
            },
            600);
    });
</script>
