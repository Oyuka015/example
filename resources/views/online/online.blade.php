@extends('ulayout.ulayout')
 
@section('content')
<div class="course-detail">
    <div class="bulguud">
        <ul>
            @foreach($onlines as $online)
            <li><a href="">{{$online->lesson_group_id}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="hicheeluud" style="width:75%; overflow:auto">
        <div id="" style="margin-left:40px; margin-top:10px; font-size:20px; font-weight:700; text-transform:uppercase;">buleg sedwiin garchig</div>
        <div class="online-courses-lessons">
            @foreach($onlines as $online)
                <div class="online-courses-lesson-card">
                    <div class="lesson-card-img">
                        <div class="lesson-img">
                            <img src="{{ URL('images/2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="lesson-card-info">
                        <div class="online-course-lesson-name">{{$online->lesson_name}}</div>
                        <div class="online-course-lesson_summary">{{$online->lesson_summary}}</div>
                        <a style="width:100%; color:black;" href="course"><button class="lesson-card-btn">Үзэх</button></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>  
</div>
@endsection
 
@push('js')

@endpush