@extends('ulayout.ulayout')
 
@section('content')
<div class="course-detail">
    <div class="bulguud">
        <ul>
            @foreach($onlines as $online)
            <li><a href="">{{$online->lesson_name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="hicheeluud">
        <div class="hicheel">
            <div class="class">

            </div>
            <div class="hhhk">

            </div>
            <div class="class" id="jj">
                <p >hahahahhahahahhahah</p>
            </div>
        </div>
    </div>
</div>
@endsection
 
@push('js')

@endpush