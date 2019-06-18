<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>管理员添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    管理员名称：<input type="text" name="admin_name" class="input1" />
                </div>
                <div class="bbD">
                    管理员密码：<input type="password" name="admin_pwd" class="input1" />
                </div>
                <div class="bbD">
                    确认密码：<input type="password" name="admin_pwds" class="input1" />
                </div>
                <div class="bbD">
                    管理员角色：
                    @foreach($roleInfo as $k=>$v)
                        <input type="checkbox" name="role_id" value="{{$v['role_id']}}">{{$v['role_name']}}
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
        var admin_name = $("input[name='admin_name']").val();
        var admin_pwd = $("input[name='admin_pwd']").val();
        var admin_pwds = $("input[name='admin_pwds']").val();
        if(admin_pwds!==admin_pwd){
           alert('确认密码必须与密码一致');
            return false;
        }
        var role_id = "";
        $("input:checkbox:checked").each(function () {
            role_id+=$(this).val()+',';
        })
        role_id = role_id.slice(0,role_id.length-1);//去出右边的逗号
        var data ={};
        data.admin_name = admin_name;
        data.admin_pwd = admin_pwd;
        data.role_id = role_id;
        //alert(data.role_id);
        $.ajax({
            url:"/admin/adminDo",
            type:"post",
            data:data,
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