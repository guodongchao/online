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
                <span>管理员角色</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    角色名称：{{$admin_name}}
                </div>
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
            </div>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>
</body>
</html>
<script>
</script>