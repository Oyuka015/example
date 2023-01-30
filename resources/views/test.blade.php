@extends('ulayout.ulayout')
 
@section('content')
<style>
    .lil-content::before{
        background-image:url('https://img.freepik.com/free-photo/cropped-shot-view-young-smart-mature-female-businesswomen-working-online-via-laptop_273609-13657.jpg?size=626&ext=jpg&ga=GA1.2.821502220.1669877714&semt=sph');
    }
</style>
<div class="header-section">
    <div class="content">
        <div class="info">
            <h2>Lorem <br><span>Be Creative!</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            <div class="training-login-btn">
                <a href="login" class="info-btn" id="info-btn">Нэвтрэх</a>
                <a href="register" class="info-btn" id="info-btn">Бүртгүүлэх</a>
            </div>
        </div>
    </div>
</div>
    
<main>
    <!-- section news -->
    <section class="news">
        <div class="news-title">
            <div class="t-circle"></div>
            <div class="t-line"></div>
            <h1>СҮҮЛД ОРСОН ЗАР/МЭДЭЭЛЭЛ</h1>
            <div class="t-line"></div>
            <div class="t-circle"></div>
        </div>
        <div class="news-cart">
            <div class="cart"> <!-- cart-->
                <div class="news-cart-img">
                    <img src="{{ URl('images/1.jpg') }}" alt="">
                </div>
                <div class="news-cart-content">
                    <div class="news-cart-content-text">
                        <h1>Газрын цахим биржийн танилцуулга</h1>
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
            <div class="cart"> <!-- cart-->
                <div class="news-cart-img">
                    <img src="{{ URl('images/1.jpg') }}" alt="">
                </div>
                <div class="news-cart-content">
                    <div class="news-cart-content-text">
                        <h1>Газрын цахим биржийн танилцуулга</h1>
                    </div>
                    <div class="news-cart-content-info flex justify-between">
                        <div class="news-cart-content-info-icon">
                            <i class="fa-solid fa-eye"></i>
                            <p>0</p>
                        </div>
                        <div class="news-cart-content-info-date">
                            <p>2022-12-12</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section online course -->
    <section class="online">
        <div class="online-title">
            <div class="t-circle"></div>
            <div class="t-line"></div>
            <p>ЦАХИМ ХИЧЭЭЛҮҮД</p>
            <div class="t-line"></div>
            <div class="t-circle"></div>
        </div>
    </section>

    <!-- pic and text sec -->
    <section>
        <div class="box">
            <div class="b-text">
                    <p>Газрын кадастрын мэдээллийн сангийн танилцуулга</p>
                    <p>Лэнд менежер программ хангамж</p>
                    <p>2019-10-31</p>
                    <button class="b-button">Үзэх</button>
            </div>
            <div class="b-img">
                <img src="{{ URL('images/3.jpg') }}" alt="">
            </div>
        </div>
        <div class="box">
            <div class="b-img">
                <img src="{{ URL('images/1.jpg') }}" alt="">
            </div>
            <div class="b-text">
                <p>Уул уурхайн газрын төлбөр бодох</p>
                <p>Газрын кадастрын мэдээллийн сангийн "Ланд менежер" програм хангамжид Уул уурхайн газрын төлбөр бодох</p>
                <p>2020-05-21</p>
                <button class="b-button">Үзэх</button>
            </div>
        </div>
        <div class="box">
            <div class="b-text">
                <p>Газрын кадастрын мэдээллийн санд нэвтрэх</p>
                <p>Газрын кадастрын мэдээллийн санд нэвтрэх</p>
                <p>2019-10-31</p>
                <button class="b-button">Үзэх</button>
            </div>
            <div class="b-img">
                <img src="{{ URL('images/2.jpg') }}" alt="">
            </div>
        </div>
    </section>
</main>
<!-- information -->
<div class="infor">
    <span>Lorem</span>
    <p>ipsum dolor sit amet consectetur adipisicing elit. Animi explicabo libero tempore!</p>
</div>
@endsection
 
@push('js')

@endpush