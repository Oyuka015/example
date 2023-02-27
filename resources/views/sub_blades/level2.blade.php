<option value="">{{trans('display.select')}}</option>
@foreach(@$au_level2 as $level2)
<option value="{{$level2->id}}">{{$level2->name}}</option>
@endforeach