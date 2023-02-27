@extends('ulayout.ulayout')
 
@section('content')
<style>
    .lil-content::before{
        background-image: url('https://img.freepik.com/premium-photo/woman-s-hands-filling-standardized-test-form_9635-1603.jpg?size=626&ext=jpg&ga=GA1.2.821502220.1669877714&semt=sph')
    }
</style>
<div class="lil-header-section">
    <div class="lil-content">
        <h1>Шалгалтууд</h1>
    </div>
</div>
<!-- exam cards -->
<div class="exam-card">
    <div class="cards">
        @foreach(@$exam as $exam)
        <a href="exam/detail/{{@$exam->id}}" class="e-card">
            <div class="e-title">{{$exam->name}}</div>
            <div class="e-descri">{{$exam->description}}</div>
            <div class="e-eye">
                <div class="eye">
                    <i class="fa-solid fa-eye"></i>
                    <p>0</p>
                </div>
                <div class="time">
                    <p>{{$exam->exam_time}}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
 
@push('js')

@endpush