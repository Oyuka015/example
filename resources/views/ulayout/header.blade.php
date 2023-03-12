<link rel="stylesheet" href="/css/mystyle.css">
<script src="/js/sweetalert2.js"></script>

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
                    if(@Auth::user())
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
                </div>
                <div id="user-menu">
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
                </div>
            </div>
            <!-- <div class="bars">
                <i class="fa-solid fa-bars"></i>
            </div> -->
        </div>
        <!-- <div class="h-container"> -->
            <!-- <div class="logo">
                <img src="{{ URL('images/logo.png') }}" alt="">
                <img src="{{ URL('images/logo.png') }}" alt="" style="margin-bottom: 5px">
            </div> -->
            <!-- <div class="ulayout-menu">
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
                @if(Auth::user()) -->
                <!-- <div class="dropdown">
                    <button class="dropbtn">
                        <a href="/profile" class="header-user-profile"><i class="fa-solid fa-user"></i></a>
                    </button>
                    <div class="dropdown-content">
                        <a href="/profile">{{trans('display.profile')}}</a>
                        <a href="/do/logout">{{trans('display.log_out')}}</a>
                    </div>
                </div> -->
                <!-- <div class="dropdown">
                    <button class="dropbtn">
                        <a class="header-user-profile"><i class="fa-solid fa-user" style="padding:10%;"></i><div style="magin-left: 1%;">{{@Auth::user()->firstname}}</div></a>
                    </button>
                    <div style="right:0;" class="dropdown-content">
                        <a href="/profile">{{trans('display.profile')}}</a>
                        <a href="/do/logout">{{trans('display.log_out')}}</a>
                    </div>  
                </div>
                @endif
            </div> -->
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
            </div>
        </div> -->
        
    </header>
    <script>
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