<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="/js/jquery-3.6.2/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/mystyle.css">
    <style>
        .dropbtn {
            background-color: inherit;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right:0;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            white-space: nowrap;
        }
        .dropdown-content a:hover{
            background-color: #00a98d65;
            text-decoration: none;
            color: black;
        }

        .dropdown:hover .dropdown-content {display: block;}
    </style>
</head>
<body>
    <header>
        <div class="h-container">
            <div class="ulayout-menu">
                <a href="/"  class="link">
                    <i class="fa-solid fa-house"></i>
                    <p>Нүүр</p>
                </a>
                <a href="medeelel" class="link">
                    <i class="fa-solid fa-bell"></i>
                    <p>Мэдээлэл</p>
                </a>
                <a href="online" class="link" >
                    <i class="fa-solid fa-graduation-cap"></i>
                    <p>Цахим хичээл</p>
                </a>
                <a href="exam" class="link">
                    <i class="fa-solid fa-square-check"></i>
                    <p>Шалгалт</p>
                </a>
                <a href="certi" class="link">
                    <i class="fa-solid fa-certificate"></i>
                    <p>Гэрчилгээ хайлт</p>
                </a>
                <a href="faq" class="link">
                    <i class="fa-solid fa-circle-info"></i>
                    <p>Асуулт хариулт</p>
                </a>
                <a href="feedback" class="link">
                    <i class="fa-solid fa-envelope"></i>
                    <p>Санал хүсэлт</p>
                </a> 
            </div>
            <!-- <div id="user-menu">
            @if(Auth::user())
                <div class="dropdown">
                    <div class="dropbtn">
                        <a href="#" class=""><i class="fa-solid fa-user"></i></a>
                        <a href="#" class="info-btn" id="info-btn">{{Auth::user()->firstname}}</a>
                    </div>
                    <div class="dropdown-content">
                        <a href="/profile">{{trans('display.profile')}}</a>
                        <a href="/do/logout">{{trans('display.log_out')}}</a>
                    </div>
                </div>
            @else
                <a style="border:2px outset grey; padding:10% 17%; border-radius:10pc; font-size: 90%;" href="login" class="info-btn new_btn" id="info-btn">{{trans('display.log_in')}}</a>
            @endif
            </div> -->
            <!-- <div class="bars">
                <i class="fa-solid fa-bars"></i>
            </div> -->
        </div>

    </header>
    <div class="header-section">
        <div class="content">
            <div class="info">
                <h2>Газрын удирдлагын мэдээллийн системийн Газрын кадастрын мэдээллийн системийн сургалтын цахим систем тавтай морилно уу</h2>
                <p>Энэхүү цахим систем нь Газрын кадастрын мэдээллийн системийн хэрэглэгчийн сургалтад хамрагдаж, гэрчилгээ авах мэргэжилтэн, судлаач, оюутнуудад зориулагдсан болно.</p>
                <p>Хэрэглэгч бүртгүүлж, сургалтын төлбөрөө төлснөөр цахим хичээл үзэх, дадлага ажил хийх, эрх зүйн шалгалт өгөх, гэрчилгээ авах шалгалт өгөх, тэнцсэн тохиолдолд сертификатаа хэвлэж авах боломжтой болно.</p>
                <div class="training-login-btn">
                @if(!Auth::user())
                    <a href="login" class="info-btn" id="info-btn">Нэвтрэх</a>
                    <a href="register" class="info-btn" id="info-btn">Бүртгүүлэх</a>
                @endif
                </div>
            </div>
            <div class="schema" style="display: grid; grid-template-rows: 10% 90%;">
                <div style="padding-top:0; width: 100%; display:flex; justify-content:space-between; ">
                    <div>
                        <div style="display:flex; padding:1%;">
                            <input id="certificate_id" style="width: 350px; border:1px solid grey; " name="certificate_id" type="text" placeholder="Гэрчилгээний дугаар оруулна уу?" autocomplete="off"  oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" />
                            <button id="mid-search-button" style="background-color:white; border: 1px solid #B5B5B5; padding:5px 10px; border-top-right-radius:10px; border-bottom-right-radius:10px;"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>

                    </div>
                    <div style="padding:1%;">
                        <a style="border:2px outset grey; border-radius:10px; font-size: 50%;" href="login" class="info-btn new_btn" id="info-btn">{{trans('display.log_in')}}</a>
                    </div>
                </div>
                <div style="display: grid; grid-template-rows: 15% 85%; margin-top:10%;">
                    <h2>Газрын кадастрын мэдээллийн системийн хэрэглэгчийн сургалтад хамрагдаж, гэрчилгээг дараахыг алхмын дагуу авна.</h2>
                    <img src="/images/cadastre.png" alt="">            
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
            @foreach($informations as $information)
                <a href="/get/data/{{$information->id}}" class="cart"> <!-- cart-->
                    <div class="news-cart-img">
                    <img src="{{$information->image ? $information->image->file_url : '/images/2.jpg'}}" alt="">
                    </div>
                    <div class="news-cart-content">
                        <div class="news-cart-content-text">
                            <h1>{{$information->title}}</h1>
                        </div>
                        <div class="news-cart-content-info">
                            <div class="news-cart-content-info-date ">
                                <p>2022-12-12</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
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
                    <button class="b-button"><a href="course">Үзэх</a></button>
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
                <button class="b-button"><a href="course">Үзэх</a></button>
            </div>
        </div>
        <div class="box">
            <div class="b-text">
                <p>Газрын кадастрын мэдээллийн санд нэвтрэх</p>
                <p>Газрын кадастрын мэдээллийн санд нэвтрэх</p>
                <p>2019-10-31</p>
                <button class="b-button"><a href="course">Үзэх</a></button>
            </div>
            <div class="b-img">
                <img src="{{ URL('images/2.jpg') }}" alt="">
            </div>
        </div>
    </section>
</main>
<!-- information -->

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
                        <p>Улаанбаатар хот, Сүхбаатар дүүрэг 1 хороо Юнион Бьюлдинг, А блок, 804-2</p>
                    </div>
                    <div class="info-icon">
                        <a href="https://www.facebook.com/profile.php?id=100071016612048&mibextid=ZbWKwL"><i class="fa-brands fa-facebook"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href=""><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                <div class="info-1">
                    <p>Имэйл: cadastremongolia@gmail.com</p>
                    <p>Утас: +976 99064943</p>
                    <a href="https://sites.google.com/view/mcango"> <p>Веб сайт: sites.google.com/view/mcango</p></a>
                </div>
            </div>
        </div>
    </div>
    <div class="c-con">
        <div class="copyright"><p>Copyright 2023 Монголын Кадастрын Холбоо, Хөгжүүлсэн Эрхэт Инноваци ХХК</p></div>
    </div>
</footer>
<script type="text/javascript" charset="utf8" src="/js/datatables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="/js/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" charset="utf8" src="/js/confirm/jquery-confirm.min.js"></script>
<script src="/js/sweetalert2.js"></script>
<script type="text/javascript" charset="utf8" src="/js/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="/js/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>