@foreach($data as $key=>$val)
    <li>
        <div class="courselist">
            <a href="coursecont?culum_id={{$val->culum_id}}" target="main" target="_blank"><img style="border-radius:3px 3px 0 0;" width="240" src="../admin{{$val->culum_img}}" title="{{$val->culum_name}}"></a>
            <p class="courTit"><a href="coursecont?culum_id={{$val->culum_id}}" target="main" target="_blank">{{$val->culum_name}}</a></p>
            <div class="gray">
                <span>{{$val->culum_hours}}课时</span>
                <span class="sp1">{{$val->studyNum}}人学习</span>
                <div style="clear:both"></div>
            </div>
        </div>
    </li>
@endforeach
<div class="clearh" style="height:10px;"></div>
@if($total>1)
<span class="pagejump">
    	<p class="userpager-list" search="{{$search}}" cate_id="{{$cate_id}}">

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
@endif