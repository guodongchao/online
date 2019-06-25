<!doctype html>
<html><!-- InstanceBegin template="/Templates/dwt.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>谋刻职业教育在线测评与学习平台</title>
<link rel="stylesheet" href="css/course.css"/>
<link rel="stylesheet" href="css/tab.css" media="screen">
<script src="js/jquery-1.8.0.min.js"></script>
<script src="js/jquery.tabs.js"></script>
<link rel="stylesheet" href="css/article.css">
<script src="js/mine.js"></script>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

</head>

<body>


<!-- InstanceBeginEditable name="EditRegion1" -->
<div class="coursecont">
    <div class="courseleft">
	<span class="select">     	
      <input type="text" placeholder="请输入关键字" class="pingjia_con"/>
      <a href="#" class="sellink"></a>        
    </span>
    <ul class="courseul">
    <li class="curr" style="border-radius:3px 3px 0 0;background:#fb5e55;"><h3 style="color:#fff;"><a href="#" class="whitea">全部课程</a></h3>
    @foreach($cateData as $key=>$val)
    <li>
    <h4>{{$val['c_cate_name']}}</h4>

        <ul class="sortul">
         @foreach($val['son'] as$k=>$v)
            <li @if($k==0 && $key==0 )class="course_curr"@endif c_cate_id="{{$v['c_cate_id']}}"><a href="javascript:;" class="culum" >{{$v['c_cate_name']}}</a></li>
         @endforeach
        </ul>
    <div class="clearh"></div>
    </li>
    @endforeach
    </ul>
    <div style="height:20px;border-radius:0 0 5px 5px; background:#fff;box-shadow:0 2px 4px rgba(0, 0, 0, 0.1)"></div>
    </div>
    <div class="courseright">
        <div class="clearh"></div>
      <ul class="courseulr">

          {{--课程内容--}}

      </ul>
    </div>
    <div class="clearh"></div>
</div>
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
    $(document).ready(function(){
       var c_cate_id = $(".course_curr").attr("c_cate_id");
        var page=1;
        getCulum(c_cate_id,page);

    })

//    点击分类获取课程
    $(".culum").click(function(){
        $(".pingjia_con").val("");
        //修改样式class
        $(".course_curr").removeClass();
        $(this).parent().addClass("course_curr")
        var page = 1;
        var c_cate_id = $(this).parent().attr("c_cate_id");
        getCulum(c_cate_id,page);
    })

    //分页
    $(document).on("click",".page-number",function(){
        var cate_id = $(this).parent().attr("cate_id");
        var page = $(this).attr("page");
        var search = $(".pingjia_con").val();

        if(search=="") {
            getCulum(cate_id, page);
        }else{

            searchCulum(cate_id,page,search);
        }

    })

    //搜索
    $(".sellink").click(function(){
        var c_cate_id = $(".course_curr").attr("c_cate_id");
        var search = $(".pingjia_con").val();
        var page = 1;
        searchCulum(c_cate_id,page,search);

    })
    function searchCulum(c_cate_id,page,search){
        var url = "courseSearch";
        $.ajax({
            type:"post",
            data:{cate_id:c_cate_id,page:page,search:search},
            url:url,
            success:function(msg){
                $(".courseulr").empty();
                $(".courseulr").append(msg);
            }
        })
    }

    function getCulum(c_cate_id,page){
        var url = "courselistData";
        $.ajax({
            type:"post",
            data:{cate_id:c_cate_id,page:page},
            url:url,
            success:function(msg){
                $(".courseulr").empty();
                $(".courseulr").append(msg);
            }
        })
    }
</script>
