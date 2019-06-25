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
    <script src="/js/jquery.ffform.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
    <script src="/layui/layui.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/ajaxfileupload.js"></script>
</head>
<body>
<div class="container" style="border-bottom: 0;">
    修改信息
</div>
<div class="container">
    <div  class="contact"  >
        <input type="hidden" id="u_id" value="{{$userInfo['u_id']}}">
        <div class="row clearfix">
            <div class="lbl">
                <label for="email">
                    头像
                </label>
            </div>
            <div class="bbD">
                <div class="bbDd">
                    <div class="bbDImg">+</div>
                    <input type="hidden" class="uplo" value="">
                    <input type="file" class="file" id="file" name="file" />
                </div>
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
                <input type="submit"  id="btn"  value="确定">
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
    $("#file").change(function(){
        $.ajaxFileUpload({
            type : "post",          //上传类型
            url: '/admin/uploadajax',     //用于文件上传的服务器端请求地址
            secureuri: false,   //是否需要安全协议，一般设置为false
            fileElementId: 'file',  //文件上传域的ID
            dataType: 'json',   //返回值类型 一般设置为json
            success: function (data)  //服务器成功响应处理函数
            {
                $('.bbDImg').html("<img src='"+data+"' height=180px'>")
                $(".uplo").val(data);
            }
        })
    })
    $('#btn').click(function(){
        var email=check_email();
        var name=check_name();
        if(email&&name==true) {
            var u_email = $('#u_email').val();
            var u_name = $('#u_name').val();
            var u_tel = $('#u_tel').val();
            var u_img = $('.uplo').val();
            var u_id = $('#u_id').val();
            $.ajax({
                url: "/index/mysettingDo",
                data: {u_email: u_email, u_name: u_name, u_tel: u_tel,u_img:u_img,u_id:u_id},
                type: "post",
                dataType: "json",
                success: function (data) {
                    alert(data.msg);
                    if (data.code == 200) {
                        location.href = "/index/mycourse";
                    }
                }
            })
        }
    })
</script>

























