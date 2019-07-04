<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/admin/css/shipingUpload.css">
    <script src="./js/jquery-3.1.1.min.js"></script>
    <title>Document</title>
</head>
<body>
<div id="content"  >
    <p class="_p"><span>课时名称</span>：<input id="title" type="text" class="form-control" placeholder="请输入课时名称"></p>
    <p class="_p">
        <input type="hidden" id="agvagva" value="{{$section_id}}">
        <input type="hidden" id="waqesdrfygu">
        <span>选择视频： </span>
        <!--文件选择按钮-->
        <a class="list" href="javascript:;">
            <input id="file" type="file" name="myfile" onchange="UpladFile();" /><span>选择视频</span>
        </a>
        <!--上传速度显示-->
        <span id="time"></span>
    </p>
    <!--显示消失-->
    <ul class="el-upload-list el-upload-list--text" style="display:  none;">
        <li tabindex="0" style="height:40px;width:80%;line-height: 40px;padding-left:10px; " class="el-upload-list__item is-success" >
            <a class="el-upload-list__item-name">
                <i class="el-icon-document"></i><span id="videoName">food.jpeg</span>
            </a>
            <label class="el-upload-list__item-status-label" >
                <i class="el-icon-upload-success el-icon-circle-check" ></i>
            </label>
            <i class="el-icon-close" onclick="del();"></i>
            <i class="el-icon-close-tip"></i>
        </li>
    </ul>

    <!--进度条-->
    <div class="el-progress el-progress--line" style="display: none;">
        <div class="el-progress-bar">
            <div class="el-progress-bar__outer" style="height: 6px;">
                <div class="el-progress-bar__inner" style="width: 0%;">
                </div>
            </div>
        </div>
        <div class="el-progress__text" style="font-size: 14.4px;">0%</div>
    </div>
    <p class="_p"><span>上传视频</span>：<button class="btn btn-primary" type="button" onclick="sub();">上传</button>
        <button class="btn btn-primary" type="button" style="background-color: crimson;" onclick="del();">取消</button></p>

    <!--预览框-->
    <div class="preview">

    </div>
    <input type="hidden" id="duration" value="">
</div>
</body>
</html>

<script type="text/javascript">
    var xhr;//异步请求对象
    var ot; //时间
    var oloaded;//大小
    //上传文件方法
    function UpladFile() {
        var fileObj = document.getElementById("file").files[0]; // js 获取文件对象
        if(fileObj.name){
            $(".el-upload-list").css("display","block");
            $(".el-upload-list li").css("border","1px solid #20a0ff");
            $("#videoName").text(fileObj.name);
        }else{
            alert("请选择文件");
        }
    }
    /*点击取消*/
    function del(){
        $("#file").val('');
        $(".el-upload-list").css("display","none");
    }
    /*点击提交*/
    function sub(){
        var fileObj = document.getElementById("file").files[0]; // js 获取文件对象
        if(fileObj==undefined||fileObj==""){
            alert("请选择文件");
            return false;
        };
        var title = $.trim($("#title").val());
        if(title==''){
            alert("请填写视频标题");
            return false;
        }
        var url = "uploadShiping"; // 接收上传文件的后台地址
        var form = new FormData(); // FormData 对象
        form.append("mf", fileObj); // 文件对象
        form.append("title", title); // 标题
        xhr = new XMLHttpRequest(); // XMLHttpRequest 对象
        xhr.open("post", url, true); //post方式，url为服务器请求地址，true 该参数规定请求是否异步处理。
        xhr.onload = uploadComplete; //请求完成
        xhr.onerror = uploadFailed; //请求失败
        xhr.upload.onprogress = progressFunction; //【上传进度调用方法实现】
        xhr.upload.onloadstart = function() { //上传开始执行方法
            ot = new Date().getTime(); //设置上传开始时间
            oloaded = 0; //设置上传开始时，以上传的文件大小为0
        };
        xhr.send(form); //开始上传，发送form数据
    }

    //上传进度实现方法，上传过程中会频繁调用该方法
    function progressFunction(evt) {
        // event.total是需要传输的总字节，event.loaded是已经传输的字节。如果event.lengthComputable不为真，则event.total等于0
        if(evt.lengthComputable) {
            $(".el-progress--line").css("display","block");
            /*进度条显示进度*/
            $(".el-progress-bar__inner").css("width", Math.round(evt.loaded / evt.total * 100) + "%");
            $(".el-progress__text").html(Math.round(evt.loaded / evt.total * 100)+"%");
        }

        var time = document.getElementById("time");
        var nt = new Date().getTime(); //获取当前时间
        var pertime = (nt - ot) / 1000; //计算出上次调用该方法时到现在的时间差，单位为s
        ot = new Date().getTime(); //重新赋值时间，用于下次计算

        var perload = evt.loaded - oloaded; //计算该分段上传的文件大小，单位b
        oloaded = evt.loaded; //重新赋值已上传文件大小，用以下次计算

        //上传速度计算
        var speed = perload / pertime; //单位b/s
        var bspeed = speed;
        var units = 'b/s'; //单位名称
        if(speed / 1024 > 1) {
            speed = speed / 1024;
            units = 'k/s';
        }
        if(speed / 1024 > 1) {
            speed = speed / 1024;
            units = 'M/s';
        }
        speed = speed.toFixed(1);
        //剩余时间
        var resttime = ((evt.total - evt.loaded) / bspeed).toFixed(1);
        time.innerHTML = '上传速度：' + speed + units + ',剩余时间：' + resttime + 's';
        if(bspeed == 0)
            time.innerHTML = '上传已取消';
    }
    //上传成功响应
    function uploadComplete(evt) {
        //服务断接收完文件返回的结果  注意返回的字符串要去掉双引号
        if(evt.target.responseText){
             str = "/admin/shiping/"+evt.target.responseText;
            $(".preview").append("<video class='video-active' id='video-active' controls='controls' autoplay='' name='media'><source src="+str+" type='video/mp4'></video>");
            var s_time=0;
            var num=0;
            $("#video-active").on(
                "timeupdate",
                function(event) {
                    s_time = this.duration;
                    //当前播放时间 this.currentTime;
                    num++;
                    if(s_time>0&&num<2){
                        var hour_name = $('#title').val();
                        var section_id = $('#agvagva').val();
                        var video_desc = $('#waqesdrfygu').val();
                        var show_time=s_time;
                        $.post(
                            'hourInsert',
                            {hour_name:hour_name,section_id:section_id,video_desc:video_desc,show_time:show_time},
                            function(res){
                                console.log(res)
                                if(res.code==0){
                                    alert('添加成功');
                                    window.location.href = 'hourShow?section_id='+res.section_id;
                                }else{
                                    alert('添加失败');
                                }
                            },'json'
                        )
                    }
                    // onTrackedVideoFrame(this.currentTime, this.duration);
                });
//             console.log(evt);
            $('#waqesdrfygu').val(str);

//            alert("上传成功！");

        }else{
            alert("上传失败");
        }
    }
    //上传失败
    function uploadFailed(evt) {
        alert("上传失败！");
    }
    function onTrackedVideoFrame(currentTime, duration){
        $("#current").text(currentTime);
        $("#duration").val(duration);
    }
</script>