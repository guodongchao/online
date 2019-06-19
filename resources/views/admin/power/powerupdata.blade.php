<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>权限修改</span>
            </div>
            <div class="baBody">
                <input type="hidden" value="{{$actInfo['power_id']}}" id="power_id">
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;功能名称：{{$actInfo['power_name']}}
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;方法名称：<input type="text" class="input3" name="power_url"  value="{{$actInfo['power_url']}}"/>
                </div>
                <div class="bbD">
                    是否展示：
                    @if($actInfo['is_show']==1)
                        <input type="radio" name="is_show" value="1" checked>是
                        <input type="radio" name="is_show" value="2">否
                    @else
                        <input type="radio" name="is_show" value="1">是
                        <input type="radio" name="is_show" value="2" checked>否
                    @endif
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;父分类:
                    <select class="pid" >
                        <option value="0">--请选择--</option>
                        @foreach($powerinfo as $k=>$v)
                            @if($v['power_id']==$actInfo['pid'])
                                <option value="{{$v['power_id']}}" selected>
                                    {{$v['power_name']}}
                                </option>
                            @else
                                <option value="{{$v['power_id']}}">
                                    {{$v['power_name']}}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" id="btn">提交</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(function(){
        $('#btn').click(function(){
            var power_id=$('#power_id').val();
            var power_url = $("input[name='power_url']").val();
            var is_show = $("input[name='is_show']:checked").val();
            var pid=$('.pid').val();
            $.ajax({
                url:"/admin/powerUpdateDo",
                type:"post",
                data:{power_url:power_url,power_id:power_id,pid:pid,is_show:is_show},
                dataType:"json",
                success:function(data){
                    alert(data.msg);
                    if(data.code ==0){
                        location.href ="/admin/powershow";
                    }
                }
            })
        })
    });
</script>