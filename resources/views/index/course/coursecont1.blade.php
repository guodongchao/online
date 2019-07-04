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
    <script src="./layui/layui.js"></script>
    <script src="./layui/css/layui.css"></script>
<script type="text/javascript">
$(function(){

	$('.demo2').Tabs({
		event:'click'
	});
	$('.demo3').Tabs({
		event:'click'
	});
});
</script>

<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

</head>

<body>


<!-- InstanceBeginEditable name="EditRegion1" -->


<div class="coursecont">
<div class="coursepic1">
   <div class="coursetitle1">
    	<h2 class="courseh21">{{$culumdata['culum_name']}}</h2>
		<div  style="margin-top:-40px;margin-right:25px;float:right;">
		<div class="bdsharebuttonbox">
			<a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>
			<a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
			<a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
			<a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>
			<a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
			<a href="#" class="bds_more" data-cmd="more"></a>
			<a class="bds_count" data-cmd="count"></a>
		</div>
        <script>
		window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"24"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
		</script>
		</div>
   </div>
   <div class="course_img1">
	   <img src="../admin{{$culumdata['culum_img']}}" height="140">
   </div>
   <div class="course_xq">
       <span class="courstime1"><p>课时<br/><span class="coursxq_num">{{$culumdata['hour']}}课时</span></p></span>
	   <span class="courstime1"><p>学习人数<br/><span class="coursxq_num">{{$culumdata['num']}}人</span></p></span>
	   <span class="courstime1"><p style="border:none;">课程时长<br/><span class="coursxq_num">{{$culumdata['time']}}分</span></p></span>
   </div>
   <div class="course_xq2">
      <a class="course_learn"  href="video" target="main">开始学习</a>
   </div> 
    <div class="clearh"></div>
</div>

<div class="clearh"></div>
<div class="coursetext">
    {{--存放用户的u_id,课程culum_id--}}
    <input type="hidden" value="1" id="u_id">
    <input type="hidden" value="1" id="culum_id">
    {{--<input type="hidden" value="{{$beforQuest_id}}" id="beforQuest_id" >--}}


	<div class="box demo2" style="position:relative">
			<ul class="tab_menu">
				<li class="current course1">章节</li>
				{{--<li class="course1">评价</li>--}}
				<li class="course1">问答</li>
                {{--<li class="course1">资料区</li>--}}
			</ul>
			<!--<a class="fombtn" style=" position:absolute; z-index:3; top:-10px; width:80px; text-align:center;right:0px;" href="#">下载资料包</a>-->
			<div class="tab_box">
				<div>
					<dl class="mulu noo">
                    @foreach($chapter as $k=>$v)
					<div>
                        <dt class="mulu_title"><span class="mulu_img"></span>第{{$k+1}}章&nbsp;&nbsp;{{$v['chapter_name']}}
						<span class="mulu_zd">+</span></dt>
						<div class="mulu_con">
                            @foreach($v['section'] as $kk=>$vv)
							<dd class="smalltitle"><strong>第{{$kk+1}}节&nbsp;&nbsp;{{$vv['section_name']}}</strong></dd>
                            @foreach($vv['hour'] as $kkk=>$vvv)
							<a href="video?culum_id={{$vvv['culum_id']}}&hour_id={{$vvv['hour_id']}}" target="main"><dd><strong class="cataloglink">课时{{$kkk+1}}：{{$vvv['hour_name']}}</strong><i class="fini nn"></i></dd></a>
                            @endforeach
                            @endforeach
						</div>
					</div>
					@endforeach
                    </dl>
                </div>
				<div class="hide">
					<div>
                    <div id="star">
                        <span class="startitle">请打分</span>
                        <ul>
                            <li><a href="javascript:;">1</a></li>
                            <li><a href="javascript:;">2</a></li>
                            <li><a href="javascript:;">3</a></li>
                            <li><a href="javascript:;">4</a></li>
                            <li><a href="javascript:;">5</a></li>
                        </ul>
                        <span></span>
                        <p></p>
	                  </div>
                    <div class="c_eform">                      
                        <textarea rows="7" class="pingjia_con" onblur="if (this.value =='') this.value='评价详细内容';this.className='pingjia_con'" onclick="if (this.value=='评价详细内容') this.value='';this.className='pingjia_con_on'"></textarea>
                       <a href="#" class="fombtn">发布评论</a>
                       <div class="clearh"></div>
                    </div>
					<ul class="evalucourse">
                    	<li>
                        	<span class="pephead"><img src="images/0-0.JPG" width="50" title="候候">
                            <p class="pepname">候候候候</p>                           
                            </span>
                            <span class="pepcont"><p>2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公务员考试真题2013试真3年国家公。</p>
                            <p class="peptime pswer">2015-01-02</p></span>
                        </li>
                        <li>
                        	<span class="pephead"><img src="images/0-0.JPG" width="50" title="候候">
                            <p class="pepname">候候15kpiii</p>                           
                            </span>
                            <span class="pepcont"><p>2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公。</p>
                            <p class="peptime pswer">2015-01-02</p></span>
                        </li>
                    </ul>
				</div>
				</div>
                <div class="hide answer">
					<div>
                     <h3 class="pingjia">提问题</h3>
                    <div class="c_eform" >
                        <input type="text" class="pingjia_con" id="quest" value="请输入问题标题" onblur="if (this.value =='') this.value='请输入问题标题';this.className='pingjia_con'" onclick="if (this.value=='请输入问题标题') this.value='';this.className='pingjia_con_on'"/><br/>
                        <textarea rows="7" class="pingjia_con" id="questInfo" onblur="if (this.value =='') this.value='请输入问题的详细内容';this.className='pingjia_con'" onclick="if (this.value=='请输入问题的详细内容') this.value='';this.className='pingjia_con_on'">请输入问题的详细内容</textarea>
                       <a href="#" class="fombtn quest" >发布</a>
                       <div class="clearh"></div>
                    </div>
					<ul class="evalucourse">
                    @foreach($data as $key=>$val)
                    	<li >
                        	<span class="pephead"><img src="images/0-0.JPG" width="50" title="候候">
							<p class="pepname">{{$val['u_name']}}</p>
                            </span>
                            <span class="pepcont">
                            <p><a href="#" class="peptitle" onclick="see($(this),'{{$val['quest_id']}}')">{{$val['quest_info']}}</a></p>
                            <p class="peptime pswer">

                                <span class="pepask">
                                    回答(<strong><a class="bluelink" onclick="see($(this),'{{$val['quest_id']}}')" href="#">10</a></strong>)&nbsp;&nbsp;&nbsp;&nbsp;
                                    浏览(<strong><a class="bluelink" href="#">10</a></strong>)
                                </span>{{date("Y-m-d H:i",$val['time'])}}
                            </p>
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    
				</div>
				</div>
				<div class="hide">
					<div>
					<ul class="notelist" >
       <li>
	   <p class="mbm mem_not"><a href="#" class="peptitle">1.rar</a></p>
       		<p class="gray"><b class="coclass">课时：<a href="#" target="_blank">会计的概念与目标1</a></b><b class="cotime">上传时间：<b class="coclass" >2015-05-8</b></b></p>
            
       </li>  
       <li>
	   <p class="mbm mem_not"><a href="#" class="peptitle">资料.rar</a></p>
       		<p class="gray"><b class="coclass">课时：<a href="#" target="_blank">会计的概念与目标2</a></b><b class="cotime">上传时间：<b class="coclass" >2015-05-8</b></b></p>
            
       		
            
       </li>                      
  </ul>
                    
				</div>
				</div>
				
			</div>
		</div>
   
</div>

<div class="courightext">
<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">授课讲师</h3>
    <div class="teacher">
    <div class="teapic ppi">
    <a href="teacher" target="main" target="_blank"><img src="../admin{{$culumdata['teacher_img']}}" width="80" class="teapicy" title=""></a>
     <h3 class="tname"><a href="teacher" target="main" class="peptitle" target="_blank">{{$culumdata['teacher_name']}}</a><p style="font-size:14px;color:#666">{{$culumdata['teacher_type']}}</p></h3>
    </div>
    <div class="clearh"></div>
    <p>{{$culumdata['teacher_desc']}}</p>
    </div>
    </div>
</div>

<div class="ctext">
    <div class="cr1">
    <h3 class="righttit" onclick="reglog_open();">最新学员</h3>
        <div class="teacher zxxy">
        <ul class="stuul">
            @foreach($user_culum as $k=>$v)
            <li><img src="../{{$v['u_img']}}" width="60" title="{{$v['u_name']}}"><p class="stuname">{{$v['u_name']}}</p></li>
                @endforeach
        </ul>
        <div class="clearh"></div>
        </div>
    </div>
</div>

<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">相关课程</h3>
    <div class="teacher">
        @foreach($culum_cate as $k=>$v)
    <div class="teapic">
        <a href="#"  target="_blank"><img src="../admin{{$v['culum_img']}}" height="60" title="{{$v['culum_name']}}"></a>
        <h3 class="courh3"><a href="coursecont?culum_id={{$v['culum_id']}}" class="peptitle" target="_blank">{{$v['culum_name']}}</a></h3>
    </div>
    <div class="clearh"></div>
        @endforeach
    </div>
    </div>
</div>
   
</div>

<div id="reglog">
<span class="close"  onclick="reglog_close();">×</span>
<div class="loginbox">
    <div class="demo3 rlog">
			<ul class="tab_menu rlog">
				<li class="current">登录</li>
				<li>注册</li>
			</ul>
			<div class="tab_box">
				<div>
                <form class="loginform pop">
                <div>
                    <p class="formrow">
                    <label class="control-label pop" for="register_email">帐号</label>
                    <input type="text" class="popinput">
                    </p>
                    <span class="text-danger">请输入Email地址 / 用户昵称</span>
                </div>
                
                <div>
                    <p class="formrow">
                    <label class="control-label pop" for="register_email">密码</label>
                    <input type="password" class="popinput">
                    </p>
                    <p class="help-block"><span class="text-danger">密码错误</span></p>
                </div>
                <div class="clearh"></div>
                <div class="popbtn">
                    <label><input type="checkbox" checked="checked"> <span class="jzmm">记住密码</span> </label>&nbsp;&nbsp;
                    <button type="submit" class="uploadbtn ub1">登录</button>
                    
                </div>
                <div class="popbtn lb">
                   <a href="#" class="link-muted">还没有账号？立即免费注册</a>
                   <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>   
                   <a href="forgetpassword" target="main" class="link-muted">找回密码</a>
                </div>
              
                        
                        <div class="popbtn hezuologo">
                        <span class="hezuo z1">使用合作网站账号登录</span>
                        <div class="hezuoimg z1">
                        <img src="images/hezuoqq.png" class="hzqq" title="QQ" width="40" height="40">
                        <img src="images/hezuowb.png" class="hzwb" title="微博" width="40" height="40">
                        </div>
                        </div>
                </form>
				</div>
				<div class="hide">
					<div>
					<form class="loginform pop">
                     <div>
                        <p class="formrow">
                        <label class="control-label pop" for="register_email">邮箱地址</label>
                        <input type="text" class="popinput">
                        </p>
                        <span class="text-danger">请输入Email地址 / 用户昵称</span>
                    </div>
                	<div>
                        <p class="formrow">
                        <label class="control-label pop" for="register_email">昵称</label>
                        <input type="text" class="popinput">
                        </p>
                        <span class="text-danger">请输入Email地址 / 用户昵称</span>
                    </div>
                    <div>
                        <p class="formrow">
                        <label class="control-label pop" for="register_email">密码</label>
                        <input type="password" class="popinput">
                        </p>
                        <p class="help-block"><span class="text-danger">密码错误</span></p>
                    </div>
                    <div>
                        <p class="formrow">
                        <label class="control-label pop" for="register_email">确认密码</label>
                        <input type="password" class="popinput">
                        </p>
                        <p class="help-block"><span class="text-danger">密码错误</span></p>
                    </div>
                    
                    
                    <button type="submit" class="uploadbtn ub1">注册</button>
                   
                    
                
                </form>
                    
				</div>
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
	<span class="barico em" style="position:relative">
	  <img src="images/num.png" width="75" class="showem">
	</span>
	<span class="barico wb" style="position:relative">
	  <img src="images/wb.png" width="75" class="showwb">
	</span>	
	<span class="barico top" id="top">置顶</span>	
</div>
</body>

<!-- InstanceEnd --></html>
<script>
    layui.use('layer', function() { //独立版的layer无需执行这一句
        var layer = layui.layer; //独立版的layer无需执行这一句
        $(document).on("click",".quest",function(){

            var u_id = $("#u_id").val();

            if (!u_id) {
                layer.msg("请先登录后再发评论!");
                return false;
            }
            var data = {};
            data.content = $("#quest").val();
            data.contentInfo = $("#questInfo").val();
            if (data.contentInfo=="请输入问题") {
                layer.msg("请填写问题!");
                return false;
            }
            data.u_id = u_id;
            data.quest_id = $(this).parent().attr("quest_id");
            data.culum_id = $('#culum_id').val();
            var url = "quest";
            $.ajax({
                type: "post",
                data: data,
                url: url,
                success: function (msg) {
                    layer.msg(msg.msg);
                    if(msg.code==100){   //发送成功
                            $.ajax({
                                type:"post",
                                data:{u_id:u_id,quest_id:data.quest_id,culum_id:data.culum_id},
                                url:"questSecord",
                                success:function(msg){
                                    $(".answer").empty();
                                    $(".answer").append(msg);


                                }
                            })
//                            window.location.reload();


                    }
                }
            })


        })

    })

        function see(obj,quest_id) {
//            layui.use('layer', function() { //独立版的layer无需执行这一句
//                var layer = layui.layer; //独立版的layer无需执行这一句
            var url = "questSecord";
            var u_id=1;
//            var beforQuest_id = $("#beforQuest_id").val();
            var culum_id = $('#culum_id').val();
                if(!quest_id){
                    layer.msg("非法!!");
                }
                var u_id = $("#u_id").val();
                $.ajax({
                    type:"post",
                    data:{u_id:u_id,quest_id:quest_id,culum_id:culum_id},
                    url:url,
                    success:function(msg){
                        $(".answer").empty();
                        $(".answer").append(msg);


                    }
                })
//            })
        }
    //返回上一层
$(document).on("click","#befor",function(){
    var quest_id = "";
    var u_id=1;
    var url = "questSecord";
    var culum_id = $('#culum_id').val();

    $.ajax({
        type:"post",
        data:{u_id:u_id,quest_id:quest_id,culum_id:culum_id},
        url:url,
        success:function(msg){
            $(".answer").empty();
            $(".answer").append(msg);


        }
    })




})

</script>
