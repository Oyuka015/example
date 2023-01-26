<link rel="stylesheet" href="/css/mystyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .user_profile{  
        border-bottom: 1px solid rgb(6, 143, 255);
    }

</style>
<div class="user-profile-section">
    <div class="user-profile-sidebar">
        <div class="user-profile">
            <div class="user-profile-img">
                <img src="images/default-avatar.png" alt="">
            </div>
            <div class="user-profile-name">
                {{trans('display.user_name')}}
            </div>
        </div>
        <div class="user-profile-other">
            <ul>
                <li>
                    <a href="/">
                        <i class="fa-solid fa-house"></i>
                        <div>{{trans('display.home')}}</div>
                    </a>
                </li>
                <li>
                    <a href="online">
                        <i class="fa-solid fa-book-open"></i>
                        <div>{{trans('display.lessons')}}</div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa-solid fa-house"></i>
                        <div>{{trans('display.home')}}</div>
                    </a>
                </li>
                <li>
                   <a href="user_profile">
                        <i class="fa-solid fa-gear"></i>
                        <div>{{trans('display.settings')}}</div>
                   </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="user-profile-main">
        <div class="profile-information-section">
            <div class="information-select">
                <ul>
                    <li class="user_profile"><a href="user_profile" >Нэвтрэх мэдээлэл</a></li>
                    <li class="user_info"><a href="user_info" >Хэрэглэгчийн мэдээлэл</a></li>
                    <li class="user_certificate"><a href="user_certificate" >{{trans('display.certificate')}}</a></li>
                </ul>
            </div>
            <div class="information-body">
                <div class="user-profile-image">
                    <div class="user-img-section">
                        <img src="images/default-avatar.png" alt="profile-img">
                    </div>
                    <div class="user-img-change">
                        <button>{{trans('display.change_image')}}</button>
                    </div>
                </div>
                <div class="user-profile-info">
                    <label  for="name">{{trans('display.user_name')}}</label>
                    <input contenteditable="true" type="text" name="name">
                    <label for="email">{{trans('display.email')}}</label>
                    <input type="email">
                </div>
            </div>
        </div>
    </div>
</div>