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
                <span>权限添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;功能名称：<input type="text" class="input3" name="action_name" />
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;方法路由：<input type="text" class="input3" name="action_url"/>
                </div>
                <div class="bbD">
                    是否展示：
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
    $('.checkoutAll').click(function(){
        var _this=$(this);
        _checked=_this.prop("checked")
        _son=_this.next().children("input[class='son']");
        if(_checked==true){
            _son.prop("checked",true)

        }else{
            _son.prop("checked",false)
        }
    })
    $('.son').click(function(){
        var _this=$(this);
        _checkbox=_this.prop("checked");
        all=_this.siblings("input").prop("checked");
        //console.log(all)
        if(_checkbox==true){
            _this.parent().prev().prop("checked",true)
        }else if(_checkbox==false && all==false){
            _this.parent().prev().prop("checked",false)
        }
    })
    function goods_add() {
        var role_name=$('#role_name').val();
        var power_id = "";
        $("input:checkbox:checked").each(function () {
            power_id+=$(this).val()+',';
        })
        power_id = power_id.slice(0,power_id.length-1);
        var data ={};
        data.role_name = role_name;
        data.power_id = power_id;
        $.ajax({
            url:"/admin/roleDo",
            type:"post",
            data:data,
            dataType:"json",
            success:function(data){
                alert(data.msg);
                if(data.code ==0){
                    location.href ="/admin/role_show";
                }
            }
        })
    }
</script>