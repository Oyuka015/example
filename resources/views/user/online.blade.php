<link rel="stylesheet" href="/css/mystyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .user_certificate{  
        border-bottom: 1px solid rgb(6, 143, 255);
    }
</style>
<div class="user-profile-section">
    <div class="user-profile-sidebar">
        <div class="user-profile">
            <div class="user-profile-img">
                <img src="/images/default-avatar.png" alt="">
            </div>
            <div class="user-profile-name">
                {{trans('display.username')}}
            </div>
        </div>
        <div class="user-profile-other">
            <ul>
                <li>
                    <a href="profile">
                        <i class="fa-solid fa-user"></i>
                        <div>{{trans('display.profile')}}</div>
                    </a>
                </li>
                <li>
                    <a href="online">
                        <i class="fa-solid fa-book-open"></i>
                        <div>{{trans('display.chosen_lessons')}}</div>
                    </a>
                </li>
                <li>
                    <a href="result">
                        <i class="fa-solid fa-house"></i>
                        <div>{{trans('display.exam_result')}}</div>
                    </a>
                </li>
                <li>
                    <a href="/">
                        <i class="fa-solid fa-house"></i>
                        <div>{{trans('display.home')}}</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="user-profile-main">
        <div class="profile-information-section" style="min-height:80vh">
            <div class="information-select">
                <ul>
                    <li class="user_profile"><a href="profile" >{{trans('display.chosen_lessons')}}</a></li>
                </ul>
            </div>
            <div class="chosen_lesson_section" style="margin-top:25px;">

            </div>
        </div>
    </div>
</div>
