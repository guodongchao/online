<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
@if($data)
<div id="pageAll">
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>课程分类修改</span>
            </div>
            <div class="baBody">
                <input type="hidden" value="{{$info->c_cate_id}}" id="cate_id">
                <div class="bbD">
                    视频分类名称：<input type="text" name="c_cate_name" value="{{$info->c_cate_name}}" class="input1" />
                </div>
                <div class="bbD">
                    视频分类排序：<input type="text" value="{{$info->c_cate_sort}}" placeholder="请填写1-100的整型,数值大,排序大" name="c_cate_sort" class="input1" />
                </div>
                <div class="bbD">
                    视频分类等级：
                    <select class="input3" name="c_parent_id">
                        <option value="0" @if($info->c_parent_id==0) selected @endif>顶级</option>
                        @foreach($data as $key=>$val)
                            <option value="{{$val->c_cate_id}}" @if($val->c_cate_id==$info->c_parent_id) selected @endif>{{$val->c_cate_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" href="#" onclick="goods_add()">提交</button>
                        <a class="btn_ok btn_no" href="goods">取消</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>
    @else
  "非法操作";
    @endif
</body>
</html>
<script>
    function goods_add() {
        var data = {};
        var url = "/admin/cate_update_do";
        data.cate_id = $("#cate_id").val();
        data.c_cate_name = $("[name='c_cate_name']").val();
        data.parent_id = $("[name='c_parent_id']").val();
        data.sort = $("[name='c_cate_sort']").val();
        if(!data.cate_id){
            alert("非法操作");
            window.location.href="/admin/cate_show";
            return false;
        }
        if(!data.c_cate_name){
            alert("请填写分类名称");
            return false;
        }
        if(isNaN(data.sort)){
            alert("排序请填写纯数字");
            return false;
        }

        $.ajax({
            type:"post",
            data:data,
            url:url,
            success:function(msg){
                console.log(msg)
                alert(msg.msg);
//                if(msg.code==200){
//                    window.location.reload();
//                }else{
//                    window.location.href="/admin/cate_show";
//                }
            }
        })


    }
</script>