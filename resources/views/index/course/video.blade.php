<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>谋刻职业教育在线测评与学习平台</title>
<script src="js/jquery-1.8.0.min.js"></script>
<script src="js/mine.js"></script>
<script src="js/jquery.tabs.js"></script>
  		<!-- video.js must be in the <head> for older IEs to work. -->
<link rel="stylesheet" href="video-js.css" >
<link rel="stylesheet" href="css/course.css"/>
<link rel="stylesheet" href="css/tab.css" media="screen">
<script src="video.js"></script>
    
      <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
      <script>
        videojs.options.flash.swf = "video-js.swf";
		
      </script>
      <script type="text/javascript">
$(function(){

	$('.demo2').Tabs({
		event:'click'
	});
});
</script>
      <style>
      body { overflow:hidden;
	  		 scrollbar-base-color:#fff;
			 scrollbar-arrow-color:#fff; /*三角箭头的颜色*/
			 scrollbar-face-color: #333; /*立体滚动条的颜色（包括箭头部分的背景色）*/
			 scrollbar-3dlight-color: #fff; /*立体滚动条亮边的颜色*/
			 scrollbar-highlight-color: #fff; /*滚动条的高亮颜色（左阴影？）*/
			 scrollbar-shadow-color: #fff; /*立体滚动条阴影的颜色*/
			 scrollbar-darkshadow-color:#fff; /*立体滚动条外阴影的颜色*/
			 scrollbar-track-color: #fff; /*立体滚动条背景颜色*/
			 
			 
			
	  }
	   /* 设置滚动条的样式 */
			::-webkit-scrollbar {
				width: 10px;
			}
			/* 滚动槽 */
			::-webkit-scrollbar-track {
				border-radius:0
			}
			/* 滚动条滑块 */
			::-webkit-scrollbar-thumb {
				background: #333;
				
			}
			::-webkit-scrollbar-thumb:window-inactive {
				background: rgba(255,0,0,0.4);
			}
      </style>
</head>

<body>
   <div class="linevideo" style="overflow-x:hidden">
	   <input type="hidden" value="{{$u_name}}" class="u_name">
    	<span class="returnindex"><a class="gray" href="javascript:;" culum_id="{{$hourData->culum_id}}" hour_id="{{$hourData->hour_id}}" target="main" style="font-size:14px;">返回课程</a></span>
        <span class="taskspan"><span class="ts"><b class="tasktit">{{$hourData->hour_name}}</b></span></span>
        <div style="width:100%;margin-top:20px;">
			<video width="auto" id="example_video_1" class="video-js vjs-default-skin  vjs-big-play-centered vvi " controls  data-setup="{}"><!--poster是视频未播放前的展示图片-->
			<source src="{{$hourData->video_desc}}" type='video/mp4' />

			</video>
			<p class="signp"><span class="sign" hour_id="{{$hourData->hour_id}}">学过了</span><span class="nextcourse" title="下一课时">∨</span></p>
        </div>
	   <input type="hidden" value="" id="total_time">
	   <input type="hidden" value="" id="new_time">
    </div>
  <div class="interact">
   		<span class="ii" title="展开或收起">></span>
        <div class="clearh"></div>

  
          <div class="box1 demo2">
			<ul class="tab_menu vmulu">
				<li class="current">目录</li>
				<li>笔记</li>
				<li>问答</li>
                {{--<li>作业</li>--}}
            </ul>
			<div class="tab_box tabcard">
				<div style="padding-bottom:30px;">
					<dl class="mulu noo1">
                        @foreach($chapter as $k=>$v)
                        <dt>第{{$k+1}}章&nbsp;&nbsp;{{$v['chapter_name']}}</dt>
                        @foreach($v['section'] as $kk=>$vv)
						<dd class="smalltitle"><strong>第{{$kk+1}}节&nbsp;&nbsp;{{$vv['section_name']}}</strong></dd>
                            @foreach($vv['hour'] as $kkk=>$vvv)
                        <a href="#"><dd><i class="forwa nn"></i><strong class="cataloglink">课时{{$kkk+1}}：{{$vvv['hour_name']}}</strong></dd></a>
                            @endforeach
                            @endforeach
                        @endforeach
                   </dl>	
				   <div class="clearh"></div>
				</div>
				
				<div class="hide">
					<div style="padding-left:25px;">
                    <div class="c_eform" style="width:280px;margin-left:10px;">
                        <div class="clearh" ></div>
                        <textarea rows="7" class="pingjia_con" style="width:100%;height:500px;" onblur="if (this.value =='') this.value='记下课程笔记';this.className='pingjia_con'" onclick="if (this.value=='记下课程笔记') this.value='';this.className='pingjia_con_on'">记下课程笔记</textarea>
                       <a href="#" class="fombtn">提交</a>
                       <div class="clearh"></div>
                    </div>					
				</div>
				</div>
                <div class="hide">
					<div style="padding-left:15px;">                   
                    <div class="c_eform veform">
                    <div class="clearh" ></div>
                        {{--<input class="inputitle pingjia_con" type="text"  value="请输入问题标题" onblur="if (this.value =='') this.value='请输入问题标题';this.className='inputitle pingjia_con'" onclick="if (this.value=='请输入问题标题') this.value='';this.className='inputitle pingjia_con_on'"/>--}}
                        {{--<textarea rows="5" class="pingjia_con quest" style="width:90%;"  onblur="if (this.value =='') this.value='请输入问题的详细内容';this.className='pingjia_con'" onclick="if (this.value=='请输入问题的详细内容') this.value='';this.className='pingjia_con_on'"></textarea><br/>--}}
                        <textarea rows="5" class="pingjia_con" id="quest" style="width:85%;" ></textarea><br/>
                       <a href="#" class="fombtn sw" style="margin-right:30px;">发布</a>
                       <div class="clearh"></div>
                    </div>
					<ul class="evalucourse" style="width:270px;">
						{{--聊天内容--}}
                    	<li>
                        	<p class="vptext" style="height:0;padding-bottom:25%" ><a target="_blank" class="peptitle" href="#">2013年国家公务员考试真题2013年国家公务员考试真题2013年国家公务员考试真题2013年?</a></p>         <p class="peptime pswer"><span style="float:left;"><b class="coclass">候候&nbsp;&nbsp;</b></span>

                            </p>
                        </li>


                    </ul>
                    
				</div>
				</div>
				<div class="hide">
                    <div class="c_eform veform" style="margin-top:15px;margin-left:35px;">
					   <!--四种状态-->
					   <p>此课时暂无作业</p>
					   <p>共4道作业题<a href="homework" target="main" target="_blank"><span class="star_zy">继续做题</span></a></p>
					   <p>共4道作业题<a href="homework_jiexi" target="main" target="_blank"><span class="star_zy">查看解析</span></a></p>
					   <p>共4道作业题<a href="homework" target="main" target="_blank"><span class="star_zy">开始作业</span></a></p>                                 
				</div>
				</div>				
			</div>
		</div> 
    </div>
</body>
</html>
<script>
	websocket = null;
	u_name = $(".u_name").val();
	$(document).ready(function(){
		$("#example_video_1").on(
				"timeupdate",
				function(event) {
					s_time = this.duration;  //视频总长度
					s_now = this.currentTime; //当前播放的视频长度
//
					//当前播放时间 this.currentTime;
		})

		if ('WebSocket' in window) {
			websocket = new WebSocket("ws://192.168.126.130:9501");
		}
		else {
			alert('当前浏览器 Not support websocket')
		}

		websocket.onopen = function (evt) {
//			var content = "";
//			var status = 1;
//			var data = {content:content,status:status};
//			//要把json的对象转换为字符串
//			var dataJson = JSON.stringify(data);
//			websocket.send(dataJson);
			console.log("连接")

		};

		websocket.onclose = function (evt) {
			var content = "";
			var status = 2;
			var data = {content:content,status:status};
			//要把json的对象转换为字符串
			var dataJson = JSON.stringify(data);
			websocket.send(dataJson);
			console.log("断开socker链接");
		};


		websocket.onmessage = function (evt) {

			var data = evt.data;
			var jsonData = JSON.parse(data);

			if(jsonData.content!=""){
				if(jsonData.u_name==u_name){
					var str="<li>" +
							"<p class='vptext'><a class='' style='float:right;' href='javascript:;'>"+jsonData.content+"</a></p>" +
							"<p class='peptime pswer'>" +
							"<span style='float:right;'><b class='coclass'>"+jsonData.u_name+"&nbsp;&nbsp;</b> </span></p>" +
							"</li>"
				}else{
					var str="<li>" +
							"<p class='vptext'><a class='peptitle' href='javascript:;'>"+jsonData.content+"</a></p>" +
							"<p class='peptime pswer'>" +
							"<span style='float:left;'><b class='coclass'>"+jsonData.u_name+"&nbsp;&nbsp;</b> </span></p>" +
							"</li>"
				}

				$(str).insertBefore($(".evalucourse li"));
			}

		};

		// //点击发布问题事件
		$(".sw").click(function(){
			var content = $("#quest").val();
			console.log(content);

			var data = {content:content,u_name:u_name};
			//要把json的对象转换为字符串
			var dataJson = JSON.stringify(data);
			websocket.send(dataJson);
			$("#quest").val("");


		})
	})
	      //点击
	$(".gray").click(function(){
		var culum_id = $(this).attr("culum_id");
		var hour_id = $(this).attr("hour_id");
		var url="changeHour";

		console.log(s_now);
		$.ajax({
			type:"post",
			data:{culum_id:culum_id,hour_id:hour_id,new_time:s_now},
			url: url,
			success:function(msg){

			}
		})
		location.href="coursecont2?culum_id="+culum_id;
	})
</script>
