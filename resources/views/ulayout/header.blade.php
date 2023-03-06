<link rel="stylesheet" href="/css/mystyle.css">

<header>
        <div class="h-container">
            <!-- <div class="logo">
                <img src="{{ URL('images/logo.png') }}" alt="">
                <img src="{{ URL('images/logo.png') }}" alt="" style="margin-bottom: 5px">
            </div> -->
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
            <div class="bars">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        @if(Auth::user())
        <div class="dropdown">
            <button class="dropbtn">
                <a href="/profile" class="header-user-profile"><i class="fa-solid fa-user"></i></a>
            </button>
            <div class="dropdown-content">
                <a href="/profile">{{trans('display.profile')}}</a>
                <a href="/do/logout">{{trans('display.log_out')}}</a>
            </div>
        </div>
        @endif
    </header>