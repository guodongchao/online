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
                <span>权限添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;功能名称：<input type="text" class="input3" name="power_name" />
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;方法路由：<input type="text" class="input3" name="power_url"/>
                </div>
                <div class="bbD">
                    是否在导航栏展示：
                    <input type="radio" name="is_show" value="1">是
                    <input type="radio" name="is_show" value="2">否
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;父分类:
                    <select class="pid" >
                        <option value="0">--请选择--</option>
                        @foreach($powerinfo as $k=>$v)
                            <option value="{{$v['power_id']}}">
                                {{$v['power_name']}}
                            </option>
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
            var power_name = $("input[name='power_name']").val();
            var power_url = $("input[name='power_url']").val();
            var is_show = $("input[name='is_show']:checked").val();
            var pid=$('.pid').val();
            if(power_name==''){
                alert('功能名称不能为空');
                return false;
            }
            if(power_url==''){
                alert('方法路由不能为空');
                return false;
            }
            $.ajax({
                url:"/admin/poweraddDo",
                type:"post",
                data:{power_name:power_name,power_url:power_url,pid:pid,is_show:is_show},
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