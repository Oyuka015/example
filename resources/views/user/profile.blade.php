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
                    <div style="font-size:25px; font-weight:700">{{trans('display.login_information')}}</div>
                    <div style="display:flex;  gap:30px;  margin-top:10px;">
                        <div>
                            <label  for="name">{{trans('display.user_name')}}</label>
                            <input value="user_name " type="text" name="name">
                        </div>
                        <div>
                            <label for="email">{{trans('display.email')}}</label>
                            <input type="email" value="email@email.com">
                        </div>
                    </div>
                    <div style="display:flex; gap:30px; margin-top:20px;">
                        <div>
                            <label for="phone">{{trans('display.phone')}}</label>
                            <input type="tel" value="phone number">
                        </div>
                        <div>
                            <label for="active_status">{{trans('display.active_status')}}</label>
                            <input type="text" value="idewhtei">
                        </div>
                    </div>
                    <div style="font-size:25px; margin-top:20px; font-weight:700">{{trans('display.reset_password')}}</div>
                    <div style="display:flex; gap:30px; margin-top:15px;">
                        <div>
                            <label for="old_password">{{trans('display.old_password')}}</label>
                            <input type="password">
                        </div >
                        <div>
                            <label for="password_rewrite">{{trans('display.password_rewrite')}}</label>
                            <input type="password">
                        </div >
                    </div>
                    <div style="display:flex; gap:30px; margin-top:15px;">
                        <div>
                            <label for="new_password">{{trans('display.new_password')}}</label>
                            <input type="password">
                        </div >
                        <div style="display:flex; align-items:center; justify-content:center; margin-top:20px;  ">
                           <button style="padding:10px 20px;">{{trans('display.reset_password')}}</button>
                        </div >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>