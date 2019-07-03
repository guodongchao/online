<!doctype html>
<html><!-- InstanceBegin template="/Templates/dwt.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>谋刻职业教育在线测评与学习平台</title>
    <link rel="stylesheet" href="css/course.css"/>
    <link rel="stylesheet" href="css/member.css"/>
    <script src="js/jquery-1.8.0.min.js"></script>
    <link rel="stylesheet" href="css/tab.css" media="screen">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.tabs.js"></script>
    <script src="js/mine.js"></script>
    <script type="text/javascript">
        $(function(){


            $('.demo2').Tabs({
                event:'click'
            });



        });
    </script>
    <style type="text/css">
        .yuan a{

            width: 30px;

            height: 30px;

            line-height: 30px;

            text-align: center;

            display: inline-block;

            background: white;

            text-decoration: none;

            color: #000000;

            border-radius: 50%;
            background: #99FFFF;

        }

        /*.yuan a:hover{*/

            /*background: red;*/

            /*color: #fff;*/

        /*}*/
        /*.progress{*/
            /*width: 100px;*/
            /*height:100px;*/
            /*background-color: #CCFFFF;*/
            /*border-radius:50%;*/
            /*-moz-border-radius:50%;*/
            /*-webkit-border-radius: 50%;*/
            /*font-size: 20px;*/
            /*text-align:center;*/
        /*}*/
    </style>
    <!-- InstanceEndEditable -->
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->

</head>

<body>


<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="clearh"></div>
<div class="membertab">
    <div class="memblist">
        <div class="membhead">
            <div style="text-align:center;"><img src="images/0-0.JPG" width="80" ></div>
            <div style="width:220px;text-align:center;">
                <p class="membUpdate mine">某某某</p>
                <p class="membUpdate mine"><a href="mysetting" target="main">修改信息</a>&nbsp;|&nbsp;<a href="myrepassword" target="main">修改密码</a></p>
                <div class="clearh"></div>
            </div>
        </div>
        <div class="memb">

            <ul>
                <li><a class="mb3" href="question1" target="main">模拟练习</a></li>
                <li class="currnav"><a class="mb4" href="question2" target="main">模拟考试</a></li>
                <li><a class="mb12" href="question3" target="main">考试记录</a></li>
                <li><a class="mb2" href="question4" target="main" target="_blank">错题集</a></li>
                <li><a class="mb1" href="question5" target="main" target="_blank">收藏集</a></li>
            </ul>

        </div>


    </div>

    <input type="hidden" id="score" value="0">
    <div class="membcont">
        <h3 class="mem-h3">模拟考试</h3>
        <div class="box demo2" style="width:820px;">
            {{--<ul class="tab_menu" style="margin-left:30px;">--}}
                {{--<li class="current">学习中</li>--}}
                {{--<li>已学完</li>--}}
                {{--<li>收藏</li>--}}
            {{--</ul>--}}
            <div id="remainTime" style="font-size:20px;font-weight:800;color:#FF9900" align="right"></div>
            <input type='hidden'name='num' value='10'>
            <input type='hidden'name='q_id' value='1'>
            <div class="tab_box" id="test">
                <div>
                    <ul class="memb_course">
                        @foreach($arr as $k=>$v)
                            <li>
                                <div class="courseli">
                                    <a href="video" target="main" target="_blank"><img width="230" src="images/c8.jpg"></a>
                                    <p class="memb_courname"><a href="video" target="main" class="blacklink">{{$v['c_cate_name']}}</a></p>
                                    <div class="mpp">
                                        <div class="lv" style="width:20%;"></div>
                                    </div>
                                    <p class="goon"><a href="javascript:;" onclick="check_begin({{$v['c_cate_id']}},0)" target="main"><span>开始练习</span></a></p>
                                </div>
                            </li>
                        @endforeach

                        <div style="height:10px;" class="clearfix"></div>
                    </ul>

                </div>
                <div class="hide">
                    <div>
                        <ul class="memb_course">

                            <li>
                                <div class="courseli">
                                    <a href="video" target="main" target="_blank"><img width="230" src="images/c8.jpg"></a>
                                    <p class="memb_courname"><a href="coursecont" target="main" class="blacklink">会计基础</a></p>
                                    <div class="mpp">
                                        <div class="lv" style="width:100%;"></div>
                                    </div>
                                    <p class="goon"><a href="coursecont" target="main"><span>查看课程</span></a></p>
                                </div>
                            </li>
                            <li>
                                <div class="courseli">
                                    <a href="video" target="main" target="_blank"><img width="230" src="images/c8.jpg"></a>
                                    <p class="memb_courname"><a href="coursecont" target="main" class="blacklink">会计基础</a></p>
                                    <div class="mpp">
                                        <div class="lv" style="width:100%;"></div>
                                    </div>
                                    <p class="goon"><a href="coursecont" target="main"><span>查看课程</span></a></p>
                                </div>
                            </li>


                            <div class="clearfix" style="height:10px;"></div>
                        </ul>

                    </div>
                </div>
                <div class="hide">
                    <div>
                        <ul class="memb_course">
                            <li>
                                <div class="courseli mysc">
                                    <a href="video" target="main" target="_blank"><img width="230" src="images/c8.jpg" class="mm"></a>
                                    <p class="memb_courname"><a href="video" target="main" class="blacklink">会计基础</a></p>
                                    <div class="mpp">
                                        <div class="lv" style="width:20%;"></div>
                                    </div>
                                    <p class="goon"><a href="#"><span>继续学习</span></a></p>
                                    <div class="mask"><span class="qxsc"  title="移除收藏">▬</span></div>
                                </div>
                            </li>
                            <li>
                                <div class="courseli mysc">
                                    <a href="video" target="main" target="_blank"><img width="230" src="images/c8.jpg" class="mm"></a>
                                    <p class="memb_courname"><a href="video" target="main" class="blacklink">会计基础</a></p>
                                    <div class="mpp">
                                        <div class="lv" style="width:20%;"></div>
                                    </div>
                                    <p class="goon"><a href="#"><span>继续学习</span></a></p>
                                    <div class="mask"><span class="qxsc"  title="移除收藏">▬</span></div>
                                </div>
                            </li>
                            <div class="clearfix" style="height:10px;"></div>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="clearh"></div>
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

`

	<span class="barico em" style="position:relative">
	  <img src="images/num.png" width="75" class="showem">
	</span>
	<span class="barico wb" style="position:relative">
	  <img src="images/wb.png" width="75" class="showwb">
	</span>
    <span class="barico top" id="top">置顶</span>
</div>
</body>
<script>
    $('#top').hide();
  function  check_time(){
        var now=new Date();
        // alert(now);
        var end=new Date();//结束的时间：年，月，日，分，秒（月的索引是0~11）
        end=Number(end)+900000;
        /*两个时间相减,得到的是毫秒ms,变成秒*/
        var result=Math.floor(end-now)/1000;
        var interval=setInterval(sub,1000); //定时器 调度对象
        /*封装减1秒的函数*/
        function sub(){
            if (result>1) {
                result = result - 1;
                var second = Math.floor(result % 60);     // 计算秒 ，取余
                var minite = Math.floor((result / 60) % 60); //计算分 ，换算有多少分，取余，余出多少秒
                var hour = Math.floor((result / 3600) % 24); //计算小时，换算有多少小时，取余，24小时制除以24，余出多少小时
                var day = Math.floor(result / (3600*24));  //计算天 ，换算有多少天

                $("#remainTime").html( "倒计时:" + minite + "分" + second + "秒");
            } else{
                alert("倒计时结束！");
                window.clearInterval(interval);//这里可以添加倒计时结束后需要执行的事件
            }
        };
    }
    function check_begin(c_id,q_id){
        if(q_id==0){
           // alert(q_id)
            check_time()
        }
        var _tr='';
        var _input='';
        var _progress='';
        var data={
            c_id:c_id,
            q_id:q_id
        }
        var num=$("input[name='num']").val();
        var q_id=$("input[name='q_id']").val();
        if(num==q_id){
            var score=$('#score').val();
            var c_id=$("input[name='hiddens']").val();
            if( confirm("您本次得分"+score+"是否保存记录？")){
                var type=1;
                var data={
                    c_id:c_id,
                    score:score,
                    type:type
                }
                $.ajax({
                    type: 'post',
                    data: data,
                    url: '/index/question24',
                    dataType: 'json',
                    success: function (msg) {
                        window.location.reload();
                    }
                })
            }else{
                var type=2;
                var data={
                    c_id:c_id,
                    type:type
                }
                $.ajax({
                    type: 'post',
                    data: data,
                    url: '/index/question24',
                    dataType: 'json',
                    success: function (msg) {
                        window.location.reload();
                    }
                })
            }

           // alert("您本次得分"+score)
            return false;
        }
        $.ajax({
            type:'post',
            data:data,
            url:'/index/question22',
            dataType:'json',
            success:function(msg){
                if(msg.error==5000){
                    alert(msg.msg);
                    return false;
                }
                $.each(msg.data,function(i,value){
                   var namedis=''
                    _tr+= "<input type='hidden'name='hidden' value='"+value.q_result+"'>"+
                            "<input type='hidden'name='hiddens' value='"+msg.c_id+"'>"+
                            "<input type='hidden'name='q_id' value='"+value.q_id+"'>"+
                            "<h3 id='progres' style='color: aquamarine'>进度:<b style='color: red'>"+msg.q_id+"</b>/"+msg.num+"</h3>"+
                            "<h3 id='progress'class='yuan' >进度:"+msg.q_id+"/"+msg.num+"</h3>"+
                            "<h3 style='color: orange;'>问:"+value.q_name+"</h3>"+
                            "<h3 class='boxx'>"+  $.each(value.q_answer,function(ii,values){
                                if(values==value.t_result){
                                    check="checked";
                                }else{
                                    check="";
                                }
                                if(value.t_result!=null){
                                     namedis="disabled";
                                }else{
                                     namedis='';
                                }
                                _input+="<tr><td><input type='radio'name='radio' class='radio' value='"+ values+ "' "+check+" "+namedis+">"+values+"</td></tr>"

                            }) +"</h3><br><br><br><br><br><br>"+
                            "<h3><input type='submit'value='上一题' id='top' class='btn btn-danger' onclick='check_btns("+msg.q_id+")' "+namedis+" > <input type='submit'value='确认(下一题)'  class='btn btn-success' id='button'  onclick='check_btn("+msg.q_id+")'"+namedis+" ></h3>"
                })
                for(var i=1;i<=msg.num;i++){
                    _progress+="<a href='javascript:;' class='progress' style='margin-left:20px;' onclick='check_random("+i+")'>"+i+"</a>";
                }
                if(msg.q_id>msg.num){
                    alert(msg.q_id)
                    alert(msg.num)
                }
                $("input[name='num']").val(msg.num);
                $("input[name='q_id']").val(msg.q_id);
                $('#test').html(_tr);
                $('.boxx').html(_input);
                $('#progress').html(_progress);
                $('.progress').each(function(){
                    if( $(this).html()==msg.q_id){
                        $(this).css('color','red');
                    }
                })
                if(msg.q_id==1){
                    $('#top').hide();
                }
                if(msg.q_id==msg.num){

                }

            }
        })
    }
    function check_random(q_id){
        var c_id=$("input[name='hiddens']").val();
        if(q_id-1==0){
            q_id=0.1;
        }else{
            q_id=q_id-1
        }
        check_begin(c_id,q_id)
    }
    function check_btns(q_id){
        var c_id=$("input[name='hiddens']").val();
        if(q_id-2==0){
            q_id=0.1;
        }else{
            q_id=q_id-2
        }
        check_begin(c_id,q_id)
    }

    function check_btn(q_id){
        var hidden=$("input[name='hidden']").val();
        var c_id=$("input[name='hiddens']").val();
        var radio=$("input[name='radio']:checked").val();
        if(radio==undefined){
            alert("请选择答案")
            return false;
        }
        if(hidden!=radio){
            alert("笨蛋,错了吧!")
            var q_id=$("input[name='q_id']").val();
            var data={
                q_id:q_id,
                radio:radio,
                hidden:hidden
            }
        alert(radio)
            $.ajax({
                type: 'post',
                data: data,
                url: '/index/question34',
                dataType: 'json',
                success: function (msg) {

                }
            })
        }
        if(hidden==radio){
            alert("恭喜,答对了!")
            var score=$('#score').val();
            score =Number(score)+10;
            $('#score').val(score);
           // alert(score)
        }
        check_radio(c_id,q_id,radio)
        check_begin(c_id,q_id)

    }
    function check_radio(c_id,q_id,radio){
        var data={
            c_id:c_id,
            q_id:q_id,
            radio:radio
        }
        $.ajax({
            type: 'post',
            data: data,
            url: '/index/question23',
            dataType: 'json',
            success: function (msg) {

            }
        })
    }
</script>
<!-- InstanceEnd --></html>
