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
<header>
    <div class="h-container">
        <div class="logo">
                <img src="{{ URL('images/logo.png') }}" alt="">
        </div>
        <div class="ulayout-menu">
            <a href="test"  class="u-link">
                <i class="fa-solid fa-house"></i>
                <div>Нүүр</div>
            </a>
            <a href="medeelel"  class="u-link">
                <i class="fa-solid fa-bell"></i>
                <div>Мэдээлэл</div>
            </a>
            <a href="online"  class="u-link">
                <i class="fa-solid fa-graduation-cap"></i>
                <div>Цахим хичээл</div>
            </a>
            <a href="exam"  class="u-link">
                <i class="fa-solid fa-square-check"></i>
                <div>Шалгалт</div>
            </a>
            <a href="certi"  class="u-link">
                <i class="fa-solid fa-certificate"></i>
                <div>Гэрчилгээ хайлт</div>
            </a>
            <a href="faq"  class="u-link">
                <i class="fa-solid fa-circle-info"></i>
                <div>Асуулт хариулт</div>
            </a>
            <a href="feedback"  class="u-link">
                <i class="fa-solid fa-envelope"></i>
                <div>Санал хүсэлт</div>
            </a> 
        </div>
        
        <div class="dropdown">
            <button class="dropbtn">
                <a href="/profile" class="header-user-profile"><i class="fa-solid fa-user"></i></a>
            </button>
            <div class="dropdown-content">
                <a href="/profile">{{trans('display.profile')}}</a>
                <a href="#">{{trans('display.log_out')}}</a>
            </div>
        </div>
        <div class="bars">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
</header>