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
	<link rel="stylesheet" href="layui/css/layui.css">
	<script src="layui/layui.js"></script>
	<script type="text/javascript" src="layui/layui.js"></script>
	<style>
		html,
		body {
			background-color: #f0f2fa;
			font-family: "PT Sans", "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
			color: #555f77;
			-webkit-font-smoothing: antialiased;
		}
		input,
		textarea {
			outline: none;
			border: none;
			display: block;
			margin: 0;
			padding: 0;
			-webkit-font-smoothing: antialiased;
			font-family: "PT Sans", "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
			font-size: 1rem;
			color: #555f77;
		}
		input::-webkit-input-placeholder,
		textarea::-webkit-input-placeholder {
			color: #ced2db;
		}
		input::-moz-placeholder,
		textarea::-moz-placeholder {
			color: #ced2db;
		}
		input:-moz-placeholder,
		textarea:-moz-placeholder {
			color: #ced2db;
		}
		input:-ms-input-placeholder,
		textarea:-ms-input-placeholder {
			color: #ced2db;
		}
		p {
			line-height: 1.3125rem;
		}
		.comments {
			margin: 2.5rem auto 0;
			max-width: 60.75rem;
			padding: 0 1.25rem;
		}
		.comment-wrap {
			margin-bottom: 1.25rem;
			display: table;
			width: 100%;
			min-height: 5.3125rem;
		}
		.photo {
			padding-top: 0.625rem;
			display: table-cell;
			width: 3.5rem;
		}
		.photo .avatar {
			height: 2.25rem;
			width: 2.25rem;
			border-radius: 50%;
			background-size: contain;
		}
		.comment-block {
			padding: 1rem;
			background-color: #fff;
			display: table-cell;
			vertical-align: top;
			border-radius: 0.1875rem;
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.08);
		}
		.comment-block textarea {
			width: 100%;
			max-width: 100%;
		}
		.comment-text {
			margin-bottom: 1.25rem;
		}
		.bottom-comment {
			color: #acb4c2;
			font-size: 0.875rem;
		}
		.comment-date {
			float: left;
		}
		.comment-actions {
			float: right;
		}
		.comment-actions li {
			display: inline;
		}
		.comment-actions li.complain {
			padding-right: 0.625rem;
			border-right: 1px solid #e1e5eb;
		}
		.comment-actions li.reply {
			padding-left: 0.625rem;
		}
	</style>

</head>
<body>

<div class="comments">
	@if(isset($all))
		<a href="comment?comment_id={{$all['com_id']}}" style="color: black;font-size: 20px;"> <<-返回 </a>
	<div class="comment-wrap" >
		<div class="photo">
			<div class="avatar" style="background-image: url({{$all['u_img']}})"></div>
		</div>
		<div class="comment-block">
			<p class="comment-text">{{$all['content']}}</p>
			<div class="bottom-comment">
				<div class="comment-date"><?php echo date("Y-m-d H:i:s",$all['time'])?></div>
			</div>
		</div>
	</div>
	@endif


	<div class="comment-wrap">
		<div class="photo">
			<div class="avatar" style="background-image: url('../admin/uploads/20190619055936.jpg')"></div>
		</div>
		<div class="comment-block">
			<form action="">
				<textarea name="" id="" cols="30" rows="3" placeholder="Say somthing..." class="content"></textarea>
			</form>
			<ul class="comment-actions">
				<li class="reply"><a href="javascript:;" @if(isset($all)) comment_id="{{$all['comment_id']}}" @endif  onclick="comment($(this))">发布评论</a></li>
			</ul>
		</div>
	</div>

	@if(isset($arr))
	@foreach($arr as $k=>$v)
	<div class="comment-wrap">
		<div class="photo">
			<div class="avatar" style="background-image: url({{$v['u_img']}})"></div>
			<div class="avatar" style="margin: auto;">{{$v['u_name']}}</div>
		</div>
		<div class="comment-block">
			<p class="comment-text">{{$v['content']}}</p>
			<div class="bottom-comment">
				<div class="comment-date"><?php echo date("Y-m-d H:i:s",$v['time'])?></div>
				<div class="comment-date">&nbsp;&nbsp;&nbsp;&nbsp;（{{$v['count']}}条）</div>
				<ul class="comment-actions">
					@if(isset($all))
					<li class="reply"><a href="comment?comment_id={{$v['comment_id']}}&com_id={{$all['comment_id']}}">查看</a></li>
					<li class="reply"><a href="comment?comment_id={{$v['comment_id']}}&com_id={{$all['comment_id']}}">评论</a></li>
					@else
					<li class="reply"><a href="comment?comment_id={{$v['comment_id']}}">查看</a></li>
					<li class="reply"><a href="comment?comment_id={{$v['comment_id']}}">评论</a></li>
					@endif
				</ul>
			</div>
		</div>
	</div>
	@endforeach
		@endif
</div>
</body>
</html>
<script>
		function comment(com) {
			var content=$('.content').val();
			var comment_id=com.attr('comment_id');
			var com_id=GetQueryString("com_id");
			if(comment_id){
				$.post("comment_do",{content:content,comment_id:comment_id},function (res) {
					alert(res.msg);
					window.location.href="comment?comment_id="+comment_id+"&com_id="+com_id;
				},'json');
			}else{
				$.post("comment_do",{content:content},function (res) {
					alert(res.msg);
					window.location.href="comment";
				},'json');
			}

		}
		//获取地址栏参数
		function GetQueryString(name)
		{
			var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
			var r = window.location.search.substr(1).match(reg);
			if(r!=null)return  unescape(r[2]); return null;
		}
</script>
