<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/qrcode.min.js"></script>
</head>
<body>
<div id="qrcode"></div>
<input type="hidden" value="{{$codeurl}}" id="url">
<input type="hidden" value="{{$order_sn}}" id="order_sn">

</body>
</html>
</body>
</html>
<script>
    // 设置参数方式
    var  codeurl = $("#url").val();
    var qrcode = new QRCode('qrcode', {
        text: codeurl,
        width: 256,
        height: 256,
        colorDark : '#000000',
        colorLight : '#ffffff',
        correctLevel : QRCode.CorrectLevel.H
    });
    setInterval(function(){
        var order_sn = $("#order_sn").val();
        var url="checkPay";
        $.ajax({
            type:"post",
            url:url,
            data:{order_sn:order_sn},
            success:function(msg){
                if(msg.code==100){
                    alert(msg.msg);
                    setTimeout(function(){
                        location.href="courselist";
                    },1000)
                }
            }
        })
    },3000)
</script>