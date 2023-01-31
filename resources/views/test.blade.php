<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/mystyle.css">
</head>
<body>
    <header>
        <div class="h-container">
            <div class="logo">
                    <img src="{{ URL('images/logo.png') }}" alt="">
            </div>
            <div class="menu">
                <a href="test"  class="link">
                    <i class="fa-solid fa-house"></i>
                    <p>Нүүр</p>
                </a>
                <a href="medeelel"  class="link">
                    <i class="fa-solid fa-bell"></i>
                    <p>Мэдээлэл</p>
                </a>
                <a href="online"  class="link">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <p>Цахим хичээл</p>
                </a>
                <a href="exam"  class="link">
                    <i class="fa-solid fa-square-check"></i>
                    <p>Шалгалт</p>
                </a>
                <a href="certi"  class="link">
                    <i class="fa-solid fa-certificate"></i>
                    <p>Гэрчилгээ хайлт</p>
                </a>
                <a href="faq"  class="link">
                    <i class="fa-solid fa-circle-info"></i>
                    <p>Асуулт хариулт</p>
                </a>
                <a href="feedback"  class="link">
                    <i class="fa-solid fa-envelope"></i>
                    <p>Санал хүсэлт</p>
                </a> 
            </div>
            @if(Auth::user())
                <div>
                    <a href="user_profile" class=""><i class="fa-solid fa-user"></i></a>
                    <a href="#" class="info-btn" id="info-btn">{{Auth::user()->firstname}}</a>
                </div>
            @else
                <a style="border:2px outset grey ; padding:10px 20px; border-radius:10pc;" href="login" class="info-btn new_btn" id="info-btn">Нэвтрэх</a>
            @endif
            <div class="bars">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </header>
    <div class="header-section">
        <div class="content">
            <div class="info">
                <h2>Lorem <br><span>Be Creative!</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <div class="training-login-btn">
                @if(!Auth::user())
                    <a href="login" class="info-btn" id="info-btn">Нэвтрэх</a>
                    <a href="register" class="info-btn" id="info-btn">Бүртгүүлэх</a>
                @endif
                </div>
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
<footer>
    <div class="f-container">
        <div class="intro">
            <div class="f-title">
                <div class="text">Танилцуулга</div>
                <div class="line"></div>
            </div>
            <div class="i-text">
                <p>Цахим шалгалт, гэрчилгээ лавлагаа, цахим хичээл, мэдээ мэдээлэл, зар мэдээ, цахим шалгалт удирдлага хяналт, гэрчилгээ хэвлэлт зэргийг багтаасан сургалтын дараах шалгалт авах систем.</p>
            </div>
            <div class="i-img">
                <img src="{{URL('images/footer_logo.png') }}" alt="">
            </div>
        </div>
        <div class="sys">
            <div class="f-title">
                <div class="text">Цахим системүүд</div>
                <div class="line"></div>
            </div>
        </div>
        <div class="holboo">
            <div class="f-title">
                <div class="text">Бидэнтэй холбогдох</div>
                <div class="line"></div>
            </div>
            <div class="holboo-info">
                <div class="info-1">
                    <div class="info-1-1">
                        <p>Монгол улс, Улаанбаатар, Чингэлтэй дүүрэг, Барилгачдын талбай-3, засгийн газрын XII байр</p>
                    </div>
                    <div class="info-icon">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-youtube"></i>
                    </div>
                </div>
                <div class="info-1">
                    <p>Имэйл: info@gazar.gov.mn</p>
                    <p>Утас: +976-51-260638</p>
                    <p>Факс: +976-11-322683</p>
                </div>
            </div>
        </div>
    </div>
    <div class="c-con">
        <div class="copyright"><p>Copyright 2019 © Газар зохион байгуулалт, геодези, зураг зүйн газар. Хөгжүүлсэн BitSoft</p></div>
    </div>
</footer>