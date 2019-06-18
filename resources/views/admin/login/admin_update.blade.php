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
                <span>管理员修改</span>
            </div>
            <div class="baBody">
                <input type="hidden" value="{{$admin_id}}" id="admin_id">
                <div class="bbD">
                    管理员角色：
                    @foreach($roleInfo as $k=>$v)
                        @if(in_array($v['role_id'],$adminInfo)==true)
                            <input type="checkbox" name="role_id" value="{{$v['role_id']}}" checked>{{$v['role_name']}}
                        @else
                            <input type="checkbox" name="role_id" value="{{$v['role_id']}}">{{$v['role_name']}}
                        @endif
                    @endforeach
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
</body>
</html>
<script>
    function goods_add() {
        var admin_id=$('#admin_id').val();
        var role_id = "";
        $("input:checkbox:checked").each(function () {
            role_id+=$(this).val()+',';
        })
        role_id = role_id.slice(0,role_id.length-1);//去出右边的逗号

        $.ajax({
            url:"/admin/admin_update_do",
            type:"post",
            data:{admin_id:admin_id,role_id:role_id},
            dataType:"json",
            success:function(data){
                alert(data.msg);
                if(data.code ==200){
                    location.href ="/admin/admin_show";
                }
            }
        })
    }
</script>