@extends('ulayout.ulayout')
 
@section('content')
<div class="online-course-detail">
    <div class="online-courses-title">
        <div class="title-circle"></div>
        <div class="title-line"></div>
        Ene buleg sedwiin hicheeluud
        <div class="title-line"></div>
        <div class="title-circle"></div>
    </div>
    <div style="display:flex; gap:20px" class="buleg-hichel">
        <div class="online-courses-lesson-card">
            <div class="lesson-card-img">
                <div class="lesson-img">
                    <img src="images/2.jpg" alt="">
                </div>
            </div>
            <div class="lesson-card-info">
                <div class="online-course-lesson-name">lesson-titles</div>
                <div class="online-course-lesson_summary">lesson-summary</div>
                <a style="width:100%" href="lesson"><button class="lesson-card-btn">Үзэх</button></a>
            </div>
        </div>
        <div class="online-courses-lesson-card">
            <div class="lesson-card-img">
                <div class="lesson-img">
                    <img src="images/2.jpg" alt="">
                </div>
            </div>
            <div class="lesson-card-info">
                <div class="online-course-lesson-name">lesson-titles</div>
                <div class="online-course-lesson_summary">lesson-summary</div>
                <a style="width:100%" href="lesson"><button class="lesson-card-btn">Үзэх</button></a>
            </div>
        </div>
        <div class="online-courses-lesson-card">
            <div class="lesson-card-img">
                <div class="lesson-img">
                    <img src="images/2.jpg" alt="">
                </div>
            </div>
            <div class="lesson-card-info">
                <div class="online-course-lesson-name">lesson-titles</div>
                <div class="online-course-lesson_summary">lesson-summary</div>
                <a style="width:100%" href="course"><button class="lesson-card-btn">Үзэх</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
 
@push('js')

@endpush