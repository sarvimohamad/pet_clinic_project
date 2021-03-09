
<select name="pet" required>
@foreach($lists as $list)


        <option value="{{$list->id}}">{{$list->name}}</option>


@endforeach
</select>
