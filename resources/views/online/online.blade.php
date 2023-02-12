@extends('ulayout.ulayout')
 
@section('content')
<div class="course-detail" style="  scroll-behavior: smooth; ">
    <div class="bulguud">
        <ul>
            @foreach($groups as $group)
            <li><a href="#group-{{$group->id}}" style="scroll-behavior: smooth;" id="menu-group-{{$group->id}}">{{$group->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="hicheeluud" style="width:75%; overflow:auto">
    @foreach($groups as $group)
        <div id="group-{{$group->id}}" style="margin-left:40px; margin-top:10px; font-size:20px; font-weight:700; text-transform:uppercase;">{{$group->name}}</div>
        <div class="online-courses-lessons">
            @foreach($group->lessonGroup as $online)
                <div class="online-courses-lesson-card">
                    <div class="lesson-card-img">
                        <div class="lesson-img">
                            <img src="{{ URL('images/video_poster.png') }}" alt="">
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
    @endforeach
    </div>  
</div>
@endsection
 
@push('js')

@endpush