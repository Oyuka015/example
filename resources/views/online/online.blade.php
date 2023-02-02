@extends('ulayout.ulayout')
 
@section('content')
<style>
    .lil-content::before{
        background-image:url('https://img.freepik.com/free-photo/cropped-shot-view-young-smart-mature-female-businesswomen-working-online-via-laptop_273609-13657.jpg?size=626&ext=jpg&ga=GA1.2.821502220.1669877714&semt=sph');
    }
</style>
<div class="lil-header-section">
    <div class="lil-content">
        <h1>Цахим хичээл</h1>
        <div class="lil-h-link">
            <a href="lil-test">Нүүр</a>
            <p>/</p>
            <a href="#">Цахим хичээл</a>
        </div>
    </div>
</div>
<div class="online-course-main">
    <div class="courses">
        <div class="online-courses-title">
            <div class="title-circle"></div>
            <div class="title-line"></div>
            {{trans('display.lessons')}}
            <div class="title-line"></div>
            <div class="title-circle"></div>
        </div>
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
                        <a style="width:100%" href="course"><button class="lesson-card-btn">Үзэх</button></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
 
@push('js')

@endpush