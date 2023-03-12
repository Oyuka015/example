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
        <div class="ulay-menu">
                <div class="xy">
                    <a href="/"  class="link" >
                        <i class="fa-solid fa-house"></i>
                        <div>{{trans('display.home')}}</div>
                    </a>
                    <a href="medeelel" class="link">
                        <i class="fa-solid fa-bell"></i>
                        <div>{{trans('display.information')}}</div>
                    </a>
                    <a href="online" class="link" >
                        <i class="fa-solid fa-graduation-cap"></i>
                        <div>{{trans('display.online_course')}}</div>
                    </a>
                    @if(@Auth::user())
                        @if($userLessonCount == $lessonCount)
                        <div class="dropdown">
                            <a class="links dropdown btn">
                                <i class="fa-solid fa-square-check"></i>
                                <div>{{trans('display.exam')}}</div>
                            </a>
                            <div class="dropdown-content">
                                <a href="exam">
                                    <div>{{trans('display.legal_exam')}}</div>
                                </a>
                                <a href="get/practice/exam/{{Auth::user()->id}}">
                                    <div>{{trans('display.practice_exam')}}</div>
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="dropdown">
                            <a class="links dropdown btn">
                                <i class="fa-solid fa-square-check"></i>
                                <div>{{trans('display.exam')}}</div>
                            </a>
                            <div class="dropdown-content" onclick="examAlert('lesson')">
                                <button style="width:100%">
                                    <a>
                                        <div>{{trans('display.legal_exam')}}</div>
                                    </a>
                                </button>
                                <button style="width:100%">
                                    <a>
                                        <div>{{trans('display.practice_exam')}}</div>
                                    </a>
                                </button>
                            </div>
                        </div>
                        @endif
                    @else
                    <div class="dropdown">
                        <a class="links dropdown btn">
                            <i class="fa-solid fa-square-check"></i>
                            <div>{{trans('display.exam')}}</div>
                        </a>
                        <div class="dropdown-content" onclick="examAlert('login')">
                            <button style="width:100%">
                                <a>
                                    <div>{{trans('display.legal_exam')}}</div>
                                </a>
                            </button>
                            <button style="width:100%">
                                <a>
                                    <div>{{trans('display.practice_exam')}}</div>
                                </a>
                            </button>
                        </div>
                    </div>
                    @endif
                    <a href="certi" class="link">
                        <i class="fa-solid fa-certificate"></i>
                        <div>{{trans('display.search_certificate')}}</div>
                    </a>
                    <a href="faq" class="link">
                        <i class="fa-solid fa-circle-info"></i>
                        <div>{{trans('display.faq')}}</div>
                    </a>
                    <a href="feedback" class="link">
                        <i class="fa-solid fa-envelope"></i>
                        <div>{{trans('display.feedback')}}</div>
                    </a> 
                    <div style="padding-top:0; width: 100%; display:flex; justify-content:space-between; ">
                    <div>
                        <div style="display:flex; padding:1%;">
                            <input id="search_certificate" style="padding-left: 2%; width: 350px; border:1px solid grey; border-top-left-radius:10px; border-bottom-left-radius:10px; text: center;" name="certificate_id" type="text" placeholder="{{trans('display.registr_license')}}" autocomplete="off"  oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="required" />
                            <button id="mid-search-button" style="background-color:white; border: 1px solid #B5B5B5; padding:5px 10px; border-top-right-radius:10px; border-bottom-right-radius:10px;"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>

                    </div>
                        @if(@Auth::user())
                        <div class="dropdown" style="margin-left: 2%;">
                            <a href="login" class=" drop btn" style="width:100%; height:100%;">
                                <i class="fa-solid fa-user"></i>
                                <div>{{@Auth::user()->firstname}}</div>
                            </a> 
                            <div class="dropdown-content">
                                <a href="profile" class="">
                                    <div>{{trans('display.profile')}}</div>
                                </a> 
                                <a href="do/logout" class="">
                                    <div>{{trans('display.log_out')}}</div>
                                </a> 
                            </div>
                        </div>
                        @else
                            <a href="login" class="" style="width: 120px; padding-left: 2%;  margin-left: 2%; border: 1px solid gray; border-radius:20px;">
                                <i class="fa-solid fa-user"></i>
                                <div>{{trans('display.log_in')}}</div>
                            </a> 
                        <!-- <a href="login" class="info-btn" id="info-btn">Нэвтрэх</a> -->
                        @endif
                </div>
                </div>
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
                <h2>Газрын удирдлагын мэдээллийн системийн</h2>
                <h2>Газрын кадастрын мэдээллийн системийн сургалтын цахим систем </h2>
                <h2>тавтай морилно уу</h2>
                <p>Энэхүү цахим систем нь Газрын кадастрын мэдээллийн системийн хэрэглэгчийн сургалтад хамрагдаж, гэрчилгээ авах мэргэжилтэн, судлаач, оюутнуудад зориулагдсан болно.</p>
                <p>Хэрэглэгч бүртгүүлж, сургалтын төлбөрөө төлснөөр цахим хичээл үзэх, дадлага ажил хийх, эрх зүйн шалгалт өгөх, гэрчилгээ авах шалгалт өгөх, тэнцсэн тохиолдолд сертификатаа хэвлэж авах боломжтой болно.</p>
                <div class="training-login-btn">
                @if(!Auth::user())
                    <a href="login" class="info-btn" id="info-btn">Нэвтрэх</a>
                    <a href="register" class="info-btn" id="info-btn">Бүртгүүлэх</a>
                @endif
                </div>
            </div>
            <div class="schema">
                <div style="display: grid; grid-template-rows: 13% 87%; margin-top:7%; color: #0072b5;">
                    <h2>Газрын кадастрын мэдээллийн системийн хэрэглэгчийн сургалтад хамрагдаж, гэрчилгээг дараахыг алхмын дагуу авна.</h2>
                    <div style="display: flex;">
                        <img src="/images/sys_algo1.png" alt="">            
                        <img src="/images/sys_algo2.png" alt="">            
                    </div>
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
            <div class="i-img">
                <img src="{{URL('images/footer_logo.png') }}" alt="">
            </div>
            <div class="i-img">
                <img src="{{URL('images/footer_logo.png') }}" alt="">
            </div>
        </div>
        <div class="intro">
            <div class="f-title">
                <div class="f-title">
                    <div class="text">Танилцуулга</div>
                    <div class="line"></div>
                </div>
                <div class="i-text">
                    <p>Цахим шалгалт, гэрчилгээ лавлагаа, цахим хичээл, мэдээ мэдээлэл, зар мэдээ, цахим шалгалт удирдлага хяналт, гэрчилгээ хэвлэлт зэргийг багтаасан сургалтын дараах шалгалт авах систем.</p>
                </div>
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
                    <!-- <p>Утас: +976 99064943</p>lk -->
                    <p>Веб сайт:<a href="https://sites.google.com/view/mcango">  sites.google.com/view/mcango</a></p>
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
<script>
    $('#mid-search-button').on('click', function(){
        var value = $('#search_certificate').val();
        var type = typeof value;
        $.ajax({
            url: '/customer/search/certificate',
            type: 'post',
            data: {value: value},
            beforeSend: function() {
                //$('#preloader').show();
            },
            success: function(response) {
                alert="hi";
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
            async: false          
        }).done(function(data) {
            //submitButton.prop('disabled', false);
        });    });
        function examAlert(name){
            if(name == 'lesson'){
                Swal.fire({
                    title: 'Цахим хичээл бүрэн үзэх шаардлагатай.',
                    icon: 'error',
                    iconHtml: '',
                    cancelButtonText: 'Цуцлах',
                    confirmButtonText: 'За',
                    showCancelButton: true
                    // showCloseButton: true
                }).then((result) => {
                    if (result.isConfirmed == true) {
                        window.location.href = '/online';
                    }
                })
            }
            else{
                Swal.fire({
                    title: 'Эхлээд нэврэнэ үү.',
                    icon: 'error',
                    iconHtml: '',
                    cancelButtonText: 'Цуцлах',
                    confirmButtonText: 'За',
                    showCancelButton: true
                    // showCloseButton: true
                }).then((result) => {
                    if (result.isConfirmed == true) {
                        window.location.href = '/login';
                    }
                })
            }
            
        }
</script>