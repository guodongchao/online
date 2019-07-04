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

            <a href="#" class="page-number" page="1" >首页</a>
            @if($page>1)
                <a href="#" class="page-number" page="{{$page-1}}" >上一页</a>
            @endif
            @if($page<$total)
                <a href="#" class="page-number" page = {{$page+1}} >下一页</a>
            @endif
            <a href="#" class="page-number" page = {{$total}}  >末页</a>
        </p>
    </span>