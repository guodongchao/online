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
                <span>管理员角色权限修改</span>
            </div>
            <div class="baBody">
                <input type="hidden" id="role_id" value="{{$role_id}}">
                <div class="bbD">
                    节点：
                    <div  id="checkAll">
                        @foreach($powerdata as $k=>$v)
                            @if(in_array($v['power_id'],$powerinfo)==true)
                                <input type="checkbox" name="power_id[]" class="checkoutAll" value="{{$v['power_id']}}" checked>{{$v['power_name']}}
                            @else
                                <input type="checkbox" name="power_id[]" class="checkoutAll" value="{{$v['power_id']}}">{{$v['power_name']}}
                            @endif
                            <div >
                                @foreach($v['son'] as $keys=>$value)
                                    @if(in_array($value['power_id'],$powerinfo)==true)
                                    &nbsp;&nbsp;<input type="checkbox" value="{{$value['power_id']}}" class="son" name="power_id[]" checked>{{$value['power_name']}}
                                    @else
                                        &nbsp;&nbsp;<input type="checkbox" value="{{$value['power_id']}}" class="son" name="power_id[]">{{$value['power_name']}}
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
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
        var role_id=$('#role_id').val();
        var power_id = "";
        $("input:checkbox:checked").each(function () {
            power_id+=$(this).val()+',';
        })
        power_id = power_id.slice(0,power_id.length-1);
        var data ={};
        data.role_id = role_id;
        data.power_id = power_id;
        $.ajax({
            url:"/admin/roleUpdateDo",
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