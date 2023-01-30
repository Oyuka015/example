@extends('ulayout.ulayout')
 
@section('content')
<style>
    .lil-content::before{
        background-image: url('https://img.freepik.com/free-photo/closeup-view-handshake-two-businessmen-suits-shaking-hands_1163-4891.jpg?size=626&ext=jpg&ga=GA1.2.821502220.1669877714&semt=sph');
    }
</style>
<div class="lil-header-section">
    <div class="lil-content">
        <h1>Гэрчилгээ хайлт</h1>
        <div class="lil-h-link">
            <a href="lil-test">Нүүр</a>
            <p>/</p>
            <a href="#">Гэрчилгээ хайлт</a>
        </div>
    </div>
</div>
<div class="certi">
    <div class="certi-con">
        <div class="certi-search">
            <p class="title">Гэрчилгээ баталгаажуулалт</p>
            <p class="des">Манайхаас өгсөн гэрчилгээний дугаараар хайлт хийнэ үү?</p>
            <input type="search" placeholder="Гэрчилгээний дугаар оруулна уу?">
            <button>Хайлт хийх</button>
        </div>
    </div>
</div>
@endsection
 
@push('js')

@endpush