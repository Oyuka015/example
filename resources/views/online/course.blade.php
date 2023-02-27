@extends('ulayout.ulayout')

@section('content')
<h1 style="text-align:center; font-weight:600;">{{@$lesson[0]->lesson_name}}</h1>

<div style="display:flex; justify-content:center;">
    <iframe width="80%" height="500" src="/{{@$lesson[0]->video}}">
    </iframe>
</div>
<h1 style="font-weight:600; text-align:center;">PDF hicheel</h1>
<div style="width:80%; height:100vh; background-color:#9addd2; padding:40px; margin:auto; margin-bottom:30px;">
    
<iframe width="100%" height="100%" src="/{{@$lesson[0]->pdf_file}}" frameborder="0"></iframe>
</div>
<div style="width:80%; display:flex; justify-content:space-between; margin:auto; margin-bottom:20px; margin-top:30px;">
    <button style="padding:10px; border-radius:10px; outline:none; cursor:pointer; background-color:#9addd2;" class="previous">{{trans('display.previous')}}</button>
    <button style="padding:10px; border-radius:10px; outline:none; cursor:pointer; margin-left:10px; background-color:#9addd2;" class="next">{{trans('display.next')}}</button>
</div>
@endsection
 
@push('js')

@endpush