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
                <span>角色权限展示</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    角色名称：{{$role_name}}
                </div>
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
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>

</script>