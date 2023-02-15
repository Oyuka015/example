@extends('ulayout.ulayout')

@section('content')
<div style="width:90%; margin:auto;">
    <h1 style="text-align:center;">{{@$lesson[0]->lesson_name}}</h1>

    <div style="display:flex;">
        <div style="display:block;">
            <iframe width="600" height="450 "
                src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1&mute=1">
            </iframe>
            <div class="flex" style="width:100%; display:flex; justify-content:end; margin:auto; margin-bottom:20px;">
                <button style="padding:10px; border-radius:10px; outline:none; cursor:pointer;" class="previous">{{trans('display.previous')}}</button>
                <button style="padding:10px; border-radius:10px; outline:none; cursor:pointer; margin-left:10px;" class="next">{{trans('display.next')}}</button>
            </div>
        </div>
        <div style="margin-left:20px;">
            <h3 style="font-size:22px;">Хичээлийн дэлгэрэнгүй</h3>
            <div style="font-size:20px;">hicheeliin delgerengui medeelel</div>
        </div>
    </div>
    
    
</div> 
@endsection
 
@push('js')

@endpush