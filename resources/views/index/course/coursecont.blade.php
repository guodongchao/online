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
<div class="coursecont">
<div class="coursepic">
	<div class="course_img"><img src="/admin{{$culumdata['culum_img']}}" width="500"></div>
    <div class="coursetitle">
   		<a class="state">
            @if($culumdata['culum_status'] == 1)
                更新中
            @else
                已完结
            @endif
        </a>
    	<h2 class="courseh2">{{$culumdata['culum_name']}}</h2>
        <p class="courstime">总课时：<span class="course_tt">{{$num}}课时</span></p>
		<p class="courstime">课程时长：<span class="course_tt">{{$time}}分钟</span></p>
        <p class="courstime">学习人数：<span class="course_tt">{{$usernum}}人</span></p>
		<p class="courstime">讲师：{{$culumdata['teacher_name']}}</p>
		<p class="courstime">课程评价：<img width="71" height="14" src="images/evaluate5.png">&nbsp;&nbsp;<span class="hidden-sm hidden-xs">5.0分（10人评价）</span></p>
        <!--<p><a class="state end">完结</a></p>-->      
        <span class="coursebtn">
            @if($culumdata['culum_price']==0)
                <span class="btnlink btn">加入学习</span>
            @else
                <span class="btnlink btn">{{$culumdata['culum_price']}}￥</span>
            @endif
            <a class="codol fx" href="javascript:void(0);" onClick="$('#bds').toggle();">分享课程</a>

            @if($codes >1)
                <a class="codol sc fenxiang" style="cursor: pointer; color:red;">收藏课程</a>
            @else
                <a class="codol sc fenxiang" style="cursor: pointer; color: red; background-position: 0px -1800px;">取消收藏</a>
            @endif
        </span>
		<div style="clear:both;"></div>
		<div id="bds">
            <div class="bdsharebuttonbox">
				<a title="分享到QQ空间" href="#" target="main" class="bds_qzone" data-cmd="qzone"></a>
				<a title="分享到新浪微博" href="#" target="main" class="bds_tsina" data-cmd="tsina"></a>
				<a title="分享到腾讯微博" href="#" target="main" class="bds_tqq" data-cmd="tqq"></a>
				<a title="分享到人人网" href="#" target="main" class="bds_renren" data-cmd="renren"></a>
				<a title="分享到微信" href="#" target="main" class="bds_weixin" data-cmd="weixin"></a>
				<a href="#" target="main" class="bds_more" data-cmd="more"></a>
				<a class="bds_count" data-cmd="count"></a>
			</div>
            <script>
			window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"24"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
			</script>
       </div>
    </div>
    <div class="clearh"></div>
</div>
    <input type="hidden" id="gaeg" value="{{$culumdata['culum_id']}}">
<div class="clearh"></div>
<div class="coursetext">
	<h3 class="leftit">课程简介</h3>
    <p class="coutex">{{$culumdata['culum_desc']}}</p>
	<div class="clearh"></div>
	<h3 class="leftit">课程目录</h3>
    <dl class="mulu">
        @if(count($muludata)>0)
            @foreach($muludata as $k=>$v)
                <dt><a href="#" target="main" class="graylink btn">第{{$k+1}}章&nbsp;&nbsp;{{$v['chapter_name']}}</a></dt>
                <dd>{{$v['chapter_desc']}}</dd>
            @endforeach
        @else
            <dt><span>暂无数据</span></dt>
        @endif

    </dl>
</div>

<div class="courightext">
<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">授课讲师</h3>
    <div class="teacher">
    <div class="teapic ppi">
    <a href="teacher" target="main" target="_blank"><img src="{{$culumdata['teacher_img']}}" width="80" class="teapicy" title="张民智"></a>
    <h3 class="tname"><a href="teacher" class="peptitle" target="main">{{$culumdata['teacher_name']}}</a><p style="font-size:14px;color:#666">{{$culumdata['teacher_type']}}</p></h3>
    </div>
    <div class="clearh"></div>
    <p>{{$culumdata['teacher_desc']}}</p>
    </div>
    </div>
</div>

<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">课程公告</h3>
        <div class="gonggao">
            @if(count($name)>0)
                @foreach($name as $v)
                    <div class="clearh"></div>
                    <p>{{$v['n_name']}}<br/>
                    <span class="gonggao_time"><?php echo date('Y-m-d',time())?></span>
                    </p>
                @endforeach
            @else
                <p>暂无公告</p>
            @endif
                <div class="clearh"></div>
        </div>
    </div>
</div>

<div class="ctext">
    <div class="cr1">
    <h3 class="righttit">相关课程</h3>
    <div class="teacher">
    <div class="teapic">
        <a href="#"  target="_blank"><img src="images/c1.jpg" height="60" title="财经法规与财经职业道德"></a>
        <h3 class="courh3"><a href="#" class="peptitle" target="_blank">财经法规与财经职业道德</a></h3>
    </div>
    <div class="clearh"></div>
    <div class="teapic">
        <a href="#"  target="_blank"><img src="images/c2.jpg" height="60" title="财经法规与财经职业道德"></a>
        <h3 class="courh3"><a href="#" class="peptitle" target="_blank">财经法规与财经职业道德</a></h3>
    </div>
    <div class="clearh"></div>
    <div class="teapic">
        <a href="#"  target="_blank"><img src="images/c3.jpg" height="60" title="财经法规与财经职业道德"></a>
        <h3 class="courh3"><a href="#" class="peptitle" target="_blank">财经法规与财经职业道德</a></h3>
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
<script src="layui/layui.js"></script>
<script>
    $(function(){
        layui.use(['layer','layedit'], function() {
            var layer = layui.layer;
            var layedit = layui.layedit;

            $('.btn').click(function(){
                var culum_id = $('#gaeg').val();
                $.post(
                    'coursecont1',
                    {culum_id:culum_id},
                    function(res){
                        if(res.code==1) {
                            layer.open({
                                type:0,
                                content:'还未登录，未登录',
                                btn:['登录','取消'],
                                btn1:function(){
                                    location.href="login";
                                    return true;
                                },
                                btn2:function(){
//                                location.href="login";
                                    return true;
                                }

                            })
                        }else if(res.code==2){
                            layer.open({
                                type:0,
                                content:'是否确认支付',
                                btn:['确定','取消'],
                                btn1:function(){
                                    location.href="login";
                                    return true;
                                },
                                btn2:function(){
//                                location.href="login";
                                    return true;
                                }

                            })
                        }else{
                            location.href="coursecont2?culum_id="+res.culum_id;
                        }
                    },'json'
                )
            })
        })


        $('.fenxiang').click(function(){
            var _this = $(this);
            var data = _this.html();
            var culum_id = $('#gaeg').val();
            console.log(data);
//            alert(11);
            if(data == '取消收藏'){
                var code = 1;
            }else{
                var code = 2;
            }
            $.post(
                'shoucang',
                {culum_id:culum_id,code:code},
                function(res){
                    var code = res.code
                    if(code==1){
                        layer.msg('收藏成功');
                    }else if(code==3){
                        layer.msg('您未登录');
//                        _this.html('收藏课程');
                    }else{
                        layer.msg('取消成功');
//                        _this.html('收藏课程');
//                        var a = _this.html();
//                        console.log(a);
                    }
                },'json'
            )
        })

    })
</script>
