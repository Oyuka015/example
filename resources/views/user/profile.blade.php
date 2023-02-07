<link rel="stylesheet" href="/css/mystyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" referrerpolicy="no-referrer" />
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
                <img src="/images/default-avatar.png" alt="">
            </div>
            <div class="user-profile-name">
                {{$userData->username}}
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
        <ul id="tabs" class="inline-flex py-1.5 px-4 w-full items-center justify-center gap-4 h-11">
            <li ><a  href="#first">Нэвтрэх мэдээлэл</a></li>
            <li ><a style="padding:5px 10px;" href="#second">Хэрэглэгчийн мэдээлэл</a></li>
            <li ><a href="#third">{{trans('display.certificate')}}</a></li>
        </ul>
        <div id="tab-contents">
            <div id="first"class="p-4 space-y-4 h-[calc(100%-2rem)] overflow-y-auto">
                <div class="first">
                    <div class="user-profile-image">
                        <div class="user-img-section">
                            <img src="/images/default-avatar.png" alt="">
                        </div>
                        <div class="user-img-change">
                            <button>{{trans('display.change_image')}}</button>
                        </div>
                    </div>
                    <div class="user-profile-info">
                        <div style="font-size:20px; font-weight:700">{{trans('display.login_information')}}</div>
                        <div style="display:flex;  gap:30px;  margin-top:10px;">
                            <div>
                                <label  for="name">{{trans('display.user_name')}}</label>
                                <input value="{{$userData->username}}" type="text" name="name">
                            </div>
                            <div>
                                <label for="email">{{trans('display.email')}}</label>
                                <input type="email" value="{{$userData->email}}">
                            </div>
                        </div>
                        <div style="display:flex; gap:30px; margin-top:20px;">
                            <div>
                                <label for="phone">{{trans('display.phone')}}</label>
                                <input type="tel" value="{{$userData->phone}}">
                            </div>
                            <div>
                                <label for="active_status">{{trans('display.active_status')}}</label>
                                <input type="text" value="idk">
                            </div>
                        </div>
                        <div style="font-size:20px; margin-top:20px; font-weight:700">{{trans('display.reset_password')}}</div>
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
                                <button style="padding:10px 20px; background-color:#9999; ">{{trans('display.reset_password')}}</button>
                            </div >
                        </div>
                    </div>
                </div>
            </div>
            <div id="third" class="hidden p-4 space-y-4 h-[calc(100%-2rem)] overflow-y-auto">   
                <div class="third">
                    
                </div>
            </div>
            <div id="second" class="hidden p-4 space-y-4 h-[calc(100%-2rem)] overflow-y-auto">
                <div class="second">
                    <div class="user-profile-image">
                            <div class="user-img-section">
                                <img src="/images/default-avatar.png" alt="profile-img">
                            </div>
                            <div class="user-img-change">
                                <button>{{trans('display.change_image')}}</button>
                            </div>
                        </div>
                        <div class="user-profile-info">
                            <div style="font-size:25px; font-weight:700">{{trans('display.personal_info')}}</div>
                            <div style="display:flex;  gap:30px;  margin-top:10px;">
                                <div>
                                    <label  for="lastname">{{trans('display.lastname')}}</label>
                                    <input value="{{$userData->lastname}}" type="text" name="lastname">
                                </div>
                                <div>
                                    <label for="firstname">{{trans('display.firstname')}}</label>
                                    <input type="firstname" value="{{$userData->firstname}}" name="firstname">
                                </div>
                            </div>
                            <div style="display:flex; gap:30px; margin-top:20px;">
                                <div>
                                    <label for="province">{{trans('display.province')}}</label>
                                    <input type="text" value="{{$userData->province}}">
                                </div>
                                <div>
                                    <label for="register">{{trans('display.register')}}</label>
                                    <input type="text" value="{{$userData->register}}">
                                </div>
                            </div>
                            <button style="padding:10px 20px; margin-top:20px; text-align:center; background-color:#9999;">{{trans('display.save')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    let tabsContainer = document.querySelector("#tabs");
    
    let tabTogglers = tabsContainer.querySelectorAll("#tabs a");

        console.log(tabTogglers);

        tabTogglers.forEach(function(toggler) {
        toggler.addEventListener("click", function(e) {
            e.preventDefault();

            let tabName = this.getAttribute("href");

            let tabContents = document.querySelector("#tab-contents");

            for (let i = 0; i < tabContents.children.length; i++) {
            
            tabTogglers[i].parentElement.classList.remove("hover:bg-gray-200", "active:bg-gray-200","-mb-4",);  tabContents.children[i].classList.remove("hidden");
            if ("#" + tabContents.children[i].id === tabName) {
                continue;
            }
            tabContents.children[i].classList.add("hidden");
            
            }
            e.target.parentElement.classList.add("hover:bg-gray-200", "active:bg-gray-200", "-mb-4",);
        });
    });
</script>