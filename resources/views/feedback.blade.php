@extends('ulayout.ulayout')
 
@section('content')
<style>
    .lil-content::before{
        background-image: url('https://t4.ftcdn.net/jpg/03/12/00/49/240_F_312004975_UNcAYLepbKX26M0n7tMEAq7XmzFAYFcs.jpg');
    }
</style>
<div class="lil-header-section">
    <div class="lil-content">
        <h1>Санал хүсэлт</h1>
        <div class="lil-h-link">
            <a href="lil-test">Нүүр</a>
            <p>/</p>
            <a href="#">Санал хүсэлт</a>
        </div>
    </div>
</div>
<!-- feedback form -->
<div class="feed">
    <label for="name">Овог нэр:</label>
    <input type="text" placeholder="Жишээ нь: Б.Болд"><br>
    <label for="mail">Имэйл хаяг:</label>
    <input type="text" placeholder="Жишээ нь: bold@gmail.com"><br>
    <label for="phone_number">Утасны дугаар:</label>
    <input type="tel" placeholder="Жишээ нь: 9999****" pattern="[0-9]{8}" required ><br>
    <label for="feedback">Санал хүсэлт:</label>
    <textarea name="feedback" id="" cols="30" rows="10"></textarea><br>
    <button>
        <i class="fa-solid fa-paper-plane"></i>
        Илгээх
    </button>

</div>
@endsection
 
@push('js')

@endpush