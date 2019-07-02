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
</head>
<body>
<div class="clearh"></div>
<div class="membertab">
    <div class="memblist">
        <div class="membhead">
            @if(empty($img))
                <div style="text-align:center;"><img src="images/0-0.JPG" width="80" ></div>
            @else
                <div style="text-align:center;"><img src="{{$img}}" width="80" ></div>
            @endif
            <div style="width:220px;text-align:center;">
                <p class="membUpdate mine"><?php echo session('account')?></p>
                <p class="membUpdate mine">
                    <a href="mysetting" target="main">修改信息</a>&nbsp;|&nbsp;
                    <a href="myrepassword" target="main">修改密码</a>
                </p>
                <div class="clearh"></div>
            </div>
        </div>
        <div class="memb">
            <ul>
                <li class="currnav"><a class="mb1" href="mycourse" target="main">我的课程</a></li>
                <li ><a class="mb3" href="mycourse2" target="main">我的问答</a></li>
                <li><a class="mb4" href="mycourse3" target="main">我的笔记</a></li>
                <li><a class="mb12" href="mycourse4" target="main">我的作业</a></li>
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
            <div class="tab_box">
                <div>
                    <ul class="memb_course">
                        @foreach($culumInfo as $k=>$v)
                            <li>
                                <div class="courseli">
                                    <a href="coursecont2?culum_id={{$v['culum_id']}}"  target="main" target="_blank"><img width="230" src="{{$v['culum_img']}}"></a>
                                    <p class="memb_courname"><a href="coursecont2?culum_id={{$v['culum_id']}}" target="main" class="blacklink">{{$v['culum_name']}}</a></p>
                                    <p class="goon"><a href="coursecont2?culum_id={{$v['culum_id']}}" target="main"><span>继续学习</span></a></p>
                                </div>
                            </li>
                        @endforeach
                        <div style="height:10px;" class="clearfix"></div>
                    </ul>
                </div>
                <div class="hide">
                    <div>
                        <ul class="memb_course">
                            @foreach($culuminfo as $k=>$v)
                                <li>
                                    <div class="courseli">
                                        <a href="coursecont2?culum_id={{$v['culum_id']}}"  target="main" target="_blank"><img width="230" src="{{$v['culum_img']}}"></a>
                                        <p class="memb_courname"><a href="coursecont2?culum_id={{$v['culum_id']}}" target="main" class="blacklink">{{$v['culum_name']}}</a></p>
                                        <p class="goon"><a href="coursecont2?culum_id={{$v['culum_id']}}" target="main"><span>查看课程</span></a></p>
                                    </div>
                                </li>
                            @endforeach
                            <div class="clearfix" style="height:10px;"></div>
                        </ul>
                    </div>
                </div>
                <div class="hide">
                    <div>
                        <ul class="memb_course">
                            @foreach($collectInfo as $k=>$v)
                                <li>
                                    <div class="courseli mysc">
                                        <a href="coursecont?culum_id={{$v['culum_id']}}"  target="main" target="_blank"><img width="230" src="{{$v['culum_img']}}" class="mm"></a>
                                        <p class="memb_courname"><a href="coursecont?culum_id={{$v['culum_id']}}" target="main" class="blacklink">{{$v['culum_name']}}</a></p>
                                        <p class="goon"><a href="coursecont?culum_id={{$v['culum_id']}}"><span>查看</span></a></p>
                                        <p class="mask"><span class="qxsc" >移除</span></p>
                                    </div>
                                </li>
                            @endforeach
                            <div class="clearfix" style="height:10px;"></div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearh"></div>
</div>
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
</html>
