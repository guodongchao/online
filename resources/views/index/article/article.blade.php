<!doctype html>
<html><!-- InstanceBegin template="/Templates/dwt.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>谋刻职业教育在线测评与学习平台</title>

<link rel="stylesheet" href="css/article.css">
<script src="js/jquery-1.8.0.min.js"></script>
<script src="js/mine.js"></script>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

</head>

<body>


<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont">
<div class="coursepic">
	<h3 class="righttit">全部资讯</h3>
    <div class="clearh"></div>
    <span class="bread">
    <a class="ask_link" href="articlelist" target="main">全部资讯</a>&nbsp;/&nbsp;<a class="ask_link" href="articlelist" target="main">{{$data->mcate_name}}</a>&nbsp;/&nbsp;{{$data->mation_title}}
    </span>
    
</div>
<div class="clearh"></div>
<div class="coursetext">
	<span class="articletitle">
        <h2>{{$data->mation_title}}</h2>
        <p class="gray"><?php echo date('Y-m-d',$data->create_time);?></p>
    </span>
    <p class="coutex" style="height: 600px;">{{$data->mation_content}}</p>
	<div class="clearh" style="height:30px;"></div>
	<span class="pagejump">
        @if($data->mation_id > 1)
    	    <a class="pagebtn lpage" title="上一篇" href="article?mation_id={{$data->mation_id}}&top=1" target="main">上一篇</a>
        @endif
        @if($data->mation_id < $daid)
            <a class="pagebtn npage" title="下一篇" href="article?mation_id={{$data->mation_id}}" target="main">下一篇</a>
        @endif
    </span>
    
</div>

<div class="courightext">
<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">热门资讯</h3>
    <div class="gonggao">
	<ul class="hotask">
        @foreach($catesdata as $v)
            <li><a class="ask_link" href="article?mation_id={{$v->mation_id}}&mcate_id={{$v->mcate_id}}" target="main"><strong>●</strong>{{$v->mation_title}}</a></li>
        @endforeach
        </ul>
    </div>
    </div>
</div>

    <div class="ctext">
        <div class="cr1">
            <h3 class="righttit">相关课程</h3>
            <div class="teacher">
                @foreach($dataculums as $v)
                    <div class="teapic">
                        <a href="#"  target="_blank"><img src="images/c1.jpg" height="60" title=""></a>
                        <h3 class="courh3"><a href="coursecont?culum_id={{$v['culum_id']}}" class="peptitle" style="color:black">{{$v['culum_name']}}</a></h3>
                    </div>
                @endforeach
                <div class="clearh"></div>

                <div class="clearh"></div>
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
	     <p><a href="#" target="main">关于我们</a> | <a href="#" target="main">联系我们</a> | <a href="#" target="main">优秀讲师</a> | <a href="#" target="main">帮助中心</a> | <a href="#" target="main">意见反馈</a> | <a href="#" target="main">加入我们</a></p>
      </div>
      <div class="copyright">      
        <div><a href="/" target="main">谋刻网</a>所有&nbsp;晋ICP备12006957号-9</div>
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
