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
    }

.dropdown:hover .dropdown-content {display: block;}
</style>
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
        
        <div class="dropdown">
            <button class="dropbtn">
                <a href="user/profile" class="header-user-profile"><i class="fa-solid fa-user"></i></a>
            </button>
            <div class="dropdown-content">
                <a href="user/profile">{{trans('display.profile')}}</a>
                <a href="#">{{trans('display.log_out')}}</a>
            </div>
        </div>
        <div class="bars">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
</header>