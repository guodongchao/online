
@foreach($data as $val)
    <tr cate-id="{{$val['c_cate_id']}}" fid="{{$val['c_parent_id']}}">
        <td width="66px" class="tdColor tdC ">{{$val['c_cate_id']}}</td>
        <td width="355px" class="tdColor">
            <a href="#" class="layui-icon x-show" status="true" >＋</a>
            {{$val['c_cate_name']}}
        </td>
        <td width="355px" class="tdColor">{{date("Y-m-d H:i:s",$val['c_create_time'])}}</td>
        {{--<td width="355px" class="tdColor"><span class="cli" val="{{$val['c_cate_id']}}">{{$val['c_cate_sort']}}</span></td>--}}
        <td><a href="cate_update?cate_id={{$val['c_cate_id']}}"><img class="operation" src="img/update.png"></a>
            <img class="operation delban" src="img/delete.png" onclick="cate_del($(this),{{$val['c_cate_id']}})">
        </td>
    </tr>
    @if($val['son'])
        @foreach($val['son'] as $k=>$v)
            <tr cate-id="{{$v['c_cate_id']}}" fid="{{$v['c_parent_id']}}">
                <td width="66px" class="tdColor2 tdC ">{{$v['c_cate_id']}}</td>
                <td width="355px" class="tdColor2">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{$v['c_cate_name']}}
                </td>
                <td width="355px" class="tdColor2">{{date("Y-m-d H:i:s",$v['c_create_time'])}}</td>
                {{--<td width="355px" class="tdColor"><span class="cli" val="{{$val['c_cate_id']}}">{{$val['c_cate_sort']}}</span></td>--}}
                <td><a href="cate_update?cate_id={{$v['c_cate_id']}}"><img class="operation" src="img/update.png"></a>
                    <img class="operation delban" src="img/delete.png" onclick="cate_del($(this),{{$v['c_cate_id']}})">
                </td>
            </tr>
        @endforeach
    @endif
@endforeach

<script>
        $("tbody tr[fid!='0']").hide();
        // 栏目多级显示效果
        $('.x-show').click(function () {
            if($(this).attr('status')=='true'){
                $(this).html('－');
                $(this).attr('status','false');
                cateId = $(this).parents('tr').attr('cate-id');
                $("tbody tr[fid="+cateId+"]").show();
            }else{
                cateIds = [];
                $(this).html('＋');
                $(this).attr('status','true');
                cateId = $(this).parents('tr').attr('cate-id');
                getCateId(cateId);
                for (var i in cateIds) {
                    $("tbody tr[cate-id="+cateIds[i]+"]").hide().find('.x-show').html('&#xe623;').attr('status','true');
                }
            }
        })
        var cateIds = [];
        function getCateId(cateId) {
            $("tbody tr[fid="+cateId+"]").each(function(index, el) {
                id = $(el).attr('cate-id');
                cateIds.push(id);
                getCateId(id);
            });
        }

</script>