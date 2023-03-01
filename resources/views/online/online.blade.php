@extends('ulayout.ulayout')
 
@section('content')
<style>
    html, body{
        scroll-behavior: smooth;
    }
</style>
<div class="course-detail" style="  scroll-behavior: smooth; ">
    <nav class="bulguudiin-nav">
        <div class="buleg-nav">
            <div style="font-size:25px; font-weight:700; text-align:center; border-bottom: 2px solid #e2e5e8; color:#666; padding-bottom:10px;">{{trans('display.lesson_groups')}}</div>
            @foreach($groups as $group)
                <a href="#group-{{$group->id}}"  style="scroll-behavior:smooth;" id="menu-group-{{$group->id}}">{{$group->name}}</a>
            @endforeach
        </div>
    </nav>
    <div class="hicheeluud">
        @foreach($groups as $group)
            <div class="title-h3" id="group-{{$group->id}}">{{$group->name}}</div>
            <div class="online-courses-lessons">
                @foreach($group->lessonGroup as $online)
                    <div class="online-courses-lesson-card" >
                        <div class="lesson-card-img">
                            <div class="lesson-img">
                                <img src="{{ URL('images/video_poster.png') }}" alt="">
                            </div>
                        </div>
                        <div class="lesson-card-info">
                            <div class="online-course-lesson-name">{{$online->lesson_name}}</div>
                            <div class="online-course-lesson_summary">{{$online->lesson_summary}}</div>
                            <a style="width:100%; color:black;" onclick="getDatas({{$online->id}})"><button class="lesson-card-btn">Үзэх</button></a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>  
    
</div>

<script>
    function getDatas(id){
        window.location.assign('/get/datas/'+ id);
    }
</script>
@endsection
 
@push('js')

@endpush