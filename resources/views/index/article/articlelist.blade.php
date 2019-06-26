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
    <span class="bread nob">
        <a  @if($mcate_id=="") class="fombtn cur" @else class="fombtn" @endif href="articlelist?mcate_id=" target="main">全部资讯</a>
        @foreach($catedata as $v)
            <a  @if($mcate_id==$v->mcate_id) class="fombtn cur" @else class="fombtn" @endif href="articlelist?mcate_id={{$v->mcate_id}}" target="main">{{$v->mcate_name}}</a>
        @endforeach
        {{--<a class="fombtn" href="articlelist" target="main">考试指导</a>--}}
        {{--<a class="fombtn" href="articlelist" target="main">精彩活动</a>--}}
    </span>
    
</div>
<div class="clearh"></div>
<div class="coursetext coursetpage">
    @foreach($mationdata as $v)
	<div class="articlelist" >
    	<h3><a class="artlink" href="article?mation_id={{$v->mation_id}}&mcate_id={{$v->mcate_id}}" target="main">{{$v->mation_title}}</a></h3>
        <p style="height: 100px;">{{$v->mation_content}}</p>
        <p class="artilabel">
        <span class="ask_label">{{$v->mcate_name}}</span>
        <b class="labtime"><?php echo date('Y-m-d',$v->create_time);?></b>
        </p>
        <div class="clearh"></div>
    </div>
    @endforeach
	<div class="clearh" style="height:20px;"></div>
	<span class="pagejump">
    	<p class="userpager-list" mcate_id="{{$mcate_id}}">

       	   <a href="javascript:;" class="page-number" page="1">首页</a>
            @if($page>1)
           <a href="#" class="page-number" page="{{$page-1}}" >上一页</a>
            @endif
            @if($page<$total)
           <a href="javascript:;" class="page-number" page = {{$page+1}} >下一页</a>
            @endif
           <a href="javascript:;" class="page-number" page = {{$total}}  >末页</a>
        </p>
    </span>
    <div class="clearh" style="height:10px;"></div>
</div>

<div class="courightext">
<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">热门资讯</h3>
    <div class="gonggao">
	<ul class="hotask">
        @foreach($catesdata as $v)
            <li><a class="ask_link" href="article?mation_id={{$v->mation_id}}" target="main"><strong>●</strong>{{$v->mation_title}}</a></li>
        @endforeach
        </ul>
    </div>
    </div>
</div>

<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">推荐课程</h3>
    <div class="teacher">
    <div class="teapic">
        <a href="#"  target="main"><img src="images/c1.jpg" height="60" title="财经法规与财经职业道德"></a>
        <h3 class="courh3"><a href="#" class="ask_link" target="main">财经法规与财经职业道德</a></h3>
    </div>
    <div class="clearh"></div>
    <div class="teapic">
        <a href="#"  target="main"><img src="images/c2.jpg" height="60" title="财经法规与财经职业道德"></a>
        <h3 class="courh3"><a href="#" class="ask_link" target="main">财经法规与财经职业道德</a></h3>
    </div>
    <div class="clearh"></div>
    <div class="teapic">
        <a href="#"  target="main"><img src="images/c3.jpg" height="60" title="财经法规与财经职业道德"></a>
        <h3 class="courh3"><a href="#" class="ask_link" target="main">财经法规与财经职业道德</a></h3>
    </div>
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
<script>

    $(document).on("click",".page-number",function(){
//    $(".page-number").click(function(){
        var mcate_id = $(this).parent().attr("mcate_id");
        var page = $(this).attr("page");
        var url="articlePage";
        $.ajax({
            type:"post",
            data:{mcate_id:mcate_id,page:page},
            url:url,
            success:function(msg){
                $(".coursetpage").empty();
                $(".coursetpage").append(msg);
            }
        })
    })
</script>

