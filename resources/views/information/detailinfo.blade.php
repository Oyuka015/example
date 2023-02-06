@extends('ulayout.ulayout')
 
@section('content')
<div class="detail-info">
    <div class="detail-info-img">
        <img src="images/2.jpg" alt="">
    </div>
    <div class="detail-info-title">
        {{@$info[0]->title}}
    </div>
    <div class="detail-info-information">
        {{@$info[0]->title}}
    </div>
</div>
@endsection
 
@push('js')

@endpush