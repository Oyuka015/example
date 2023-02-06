<link rel="stylesheet" href="/css/mystyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .user_info{  
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
        <div class="profile-information-section">
            <div class="information-select">
                <ul>
                    <li class="user_profile"><a href="profile" >Нэвтрэх мэдээлэл</a></li>
                    <li  class="user_info"><a href="info">Хэрэглэгчийн мэдээлэл</a></li>
                    <li class="user_certificate"><a href="certificate" >{{trans('display.certificate')}}</a></li>
                </ul>
            </div>
            <div class="information-body">
                <div class="user-profile-image">
                    <div class="user-img-section">
                        <img src="/images/default-avatar.png" alt="profile-img">
                    </div>
                    <div class="user-img-change">
                        <button>{{trans('display.change_image')}}</button>
                    </div>
                </div>
                
                <div class="user-profile-info">  <!-- user-personal-information -->
                    <div style="font-size:25px; font-weight:700">{{trans('display.personal_info')}}</div>
                    <div style="display:flex;  gap:30px;  margin-top:10px;">
                        <div>
                            <label  for="surname">{{trans('display.surname')}}</label>
                            <input value="hereglegchiin owog " type="text" name="surname">
                        </div>
                        <div>
                            <label for="lastname">{{trans('display.lastname')}}</label>
                            <input type="lastname" value="hereglegchiin ner" name="lastname">
                        </div>
                    </div>
                    <div style="display:flex; gap:30px; margin-top:20px;">
                        <div>
                            <label for="province">{{trans('display.province')}}</label>
                            <input type="text" value="aimgiin ner">
                        </div>
                        <div>
                            <label for="register">{{trans('display.register')}}</label>
                            <input type="text" value="registeriin dugaar">
                        </div>
                    </div>
                    <button style="padding:10px 20px; margin-top:20px; text-align:center;">{{trans('display.save')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>