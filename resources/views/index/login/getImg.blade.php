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
    <script src="js/qrcode.js"></script>
    <script src="js/qrcode.min.js"></script>

</head>
<body>
<div class="login" style="background:url(images/12.jpg) right center no-repeat #fff">


    <input type="hidden" value="{{$state}}" id="state">
    <input type="hidden" value="{{$url}}" id="url">
    <div id="qrcode"></div>

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
    var url = $("#url").val();
    var qrcode = new QRCode('qrcode', {
        text: url,
        width: 256,
        height: 256,
        colorDark : '#000000',
        colorLight : '#ffffff',
        correctLevel : QRCode.CorrectLevel.H
    });
    setInterval(function(){
        var state = $("#state").val();
        var url = "is_log";
        $.ajax({
            type:"post",
            data:{state:state},
            url:url,
            success:function(msg){
                console.log(msg.msg);
                if(msg.code==100){
                    window.location.href="index";
                }
            }
        })
    },3000)




</script>