@foreach($data as $val)
<tr>
    <td width="66px" class="tdColor tdC ">{{$val->c_cate_id}}</td>
    <td width="355px" class="tdColor">{{$val->c_cate_name}}</td>
    <td width="355px" class="tdColor">{{date("Y-m-d H:i:s",$val->c_create_time)}}</td>
    {{--<td width="355px" class="tdColor"><span class="cli" val="{{$val['c_cate_id']}}">{{$val['c_cate_sort']}}</span></td>--}}
    <td><a href="cate_update?cate_id={{$val->c_cate_id}}"><img class="operation" src="img/update.png"></a>
        <img class="operation delban" src="img/delete.png" onclick="cate_del($(this),{{$val->c_cate_id}})">
    </td>
</tr>
@endforeach