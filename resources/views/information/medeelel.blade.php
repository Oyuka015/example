@extends('ulayout.ulayout')
 
@section('content')
<style>
    .lil-content::before{
        background-image: url('https://t3.ftcdn.net/jpg/02/16/48/72/240_F_216487241_kcvvP82YCLbsk8eThUbP0fWp1ZL7Gf4q.jpg');
    }
</style>

<div class="lil-header-section">
    <div class="lil-content">
        <h1>Зар/Мэдээ</h1>
        <div class="lil-h-link">    
            <a href="lil-test">Нүүр</a>
            <p>/</p>
            <a href="#">Зар/Мэдээ</a>
        </div>
    </div>
</div>
<div class="news">
    <div class="news-cart">
        @foreach($informations as $information)
            <div class="cart" onclick="getData({{$information->id}})"> <!-- cart-->
                <div class="news-cart-img">
                    <img src="{{$information->image ? $information->image->file_url : '/images/2.jpg'}}" alt="">
                </div>
                    <div class="news-cart-content">
                        <div class="news-cart-content-text">
                            <h1>{{$information->title}}</h1>
                        </div>
                        <div class="news-cart-content-info">
                            <div class="news-cart-content-info-icon">
                                <i class="fa-solid fa-eye"></i>
                                <p>0</p>
                            </div>
                            <div class="news-cart-content-info-date ">
                                <p>2022-12-12</p>
                            </div>
                        </div>
                    </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    function getData(id){
        window.location.assign('/get/data/'+ id);
    }
</script>
@endsection
 
@push('js')

@endpush