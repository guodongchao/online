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
<script src="js/jquery.tabs.js"></script>
<script src="js/mine.js"></script>
<script type="text/javascript">
$(function(){

	
	$('.demo2').Tabs({
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
		<li class="currnav"><a class="mb3" href="question1" target="main">模拟练习</a></li>
		<li><a class="mb4" href="question2" target="main">模拟考试</a></li>
		<li><a class="mb12" href="question3" target="main">考试记录</a></li>
        <li><a class="mb2" href="question4" target="main" target="_blank">错题集</a></li>
        <li><a class="mb1" href="question5" target="main" target="_blank">收藏集</a></li>
   </ul>
   
    </div>

    
  </div>


	<div class="membcont">
<h3 class="mem-h3">我的课程</h3>
<div class="box demo2" style="width:820px;">
			<ul class="tab_menu" style="margin-left:30px;">
				<li class="current">学习中</li>
				<li>已学完</li>
				<li>收藏</li>
			</ul>
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
    function check_begin(c_id,q_id){

        var _tr='';
        var _input='';
        var data={
            c_id:c_id,
            q_id:q_id
        }
        $.ajax({
            type:'post',
            data:data,
            url:'/index/question11',
            dataType:'json',
            success:function(msg){
                $.each(msg.data,function(i,value){
                    _tr+= "<input type='hidden'name='hidden' value='"+value.q_result+"'>"+
                         "<input type='hidden'name='hiddens' value='"+msg.c_id+"'>"+
                         "<p class='goon'><a href='javascript:;' onclick='collention("+value.q_id+")' target='main'><span>收藏该题</span></a></p>"+
                         "<h3>进度:"+msg.q_id+"/"+msg.num+"</h3>"+
                         "<h3>题目:"+value.q_name+"</h3>"+
                         "<h3 id='box'>"+  $.each(value.q_answer,function(ii,values){
                                 _input+="<tr><td><input type='radio'name='radio'value='"+values+"'>"+values+"</td></tr>"
                            }) +"</h3><br><br><br><br><br><br>"+
                         "<h3><input type='submit'value='上一题' id='top' onclick='check_btns("+msg.q_id+")'> <input type='submit'value='确认(下一题)'id='button' onclick='check_btn("+msg.q_id+")'></h3>"
                })
                $('#test').html(_tr);
                $('#box').html(_input);
                if(msg.q_id==1){
                    $('#top').hide();
                }else{
                    $('#top').show();
                }
                if(msg.q_id==msg.num){
                    $('#button').hide();
                }else{
                    $('#button').show();
                }
            }
        })
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
        }
        if(hidden==radio){
            alert("恭喜,答对了!")
        }
        check_begin(c_id,q_id)
    }
    function collention(q_id){
        var data={
            q_id:q_id
        }
        $.ajax({
            type:'post',
            data:data,
            url:"/index/question55",
            dataType:'json',
            success:function(msg){
                alert(msg.msg)
            }

        })
    }
</script>
<!-- InstanceEnd --></html>
