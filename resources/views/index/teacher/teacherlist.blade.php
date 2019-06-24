<!doctype html>
<html><!-- InstanceBegin template="/Templates/dwt.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>谋刻职业教育在线测评与学习平台</title>
<link rel="stylesheet" href="css/course.css"/>
<script src="js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="css/tab.css" media="screen">
<script src="js/jquery.tabs.js"></script>
<script src="js/mine.js"></script>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

</head>

<body>


<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont" style="background: none repeat scroll 0 0 #fff;border-radius: 3px;box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);" >
    <h3 class="righttit" style="padding-left:50px;">优秀讲师</h3>
	@foreach($teacher as $k=>$v)
	<div class="coursepic tecti">
		<div class="teaimg">
		<a href="teacher?teacher_id={{$v['teacher_id']}}" target="main" target="_blank"><img src="../admin/{{$v['teacher_img']}}" width="150"></a>
		</div>
		<div class="teachtext">
			<h3><a href="teacher" target="main" target="_blank" class="teatt">{{$v['teacher_name']}}</a>&nbsp;&nbsp;<strong>{{$v['teacher_type']}}</strong></h3>
			<h4>个人简介</h4>
			<p>{{$v['teacher_desc']}}</p>
			<h4>授课风格</h4>
			<p>{{$v['teacher_style']}}</p>
		</div>
		<div class="clearh"></div>
	</div>
	@endforeach
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
