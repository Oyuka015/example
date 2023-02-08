<link rel="stylesheet" href="/css/mystyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="/js/jquery-3.6.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/css/datatables.css">
<link rel="stylesheet" href="/js/confirm/jquery-confirm.min.css">
<link rel="stylesheet" type="text/css" href="/js/plugins/ol/css/ol.css"/>
<link rel="stylesheet" type="text/css" href="/js/plugins/ol/css/ol.smart.css"/>
<link rel="stylesheet" type="text/css" href="/js/chosen/chosen.min.css"/>
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
                {{$userData->firstname}}
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
                    <a href="online_course">
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
                    </div>
                    <div class="user-profile-info">
                        <div style="font-size:20px; font-weight:700">{{trans('display.login_information')}}</div>
                        <div  style="display:flex; flex-wrap:wrap; gap:20px;">
                            <div>
                                <label  for="username">{{trans('display.login_name')}}</label>
                                <input value="{{$userData->username}}" type="text" name="username">
                            </div>
                           <div>
                                <label for="email">{{trans('display.email')}}</label>
                                <input type="email" value="{{$userData->email}}" name="email">
                           </div>
                          <div>
                                <label for="phone">{{trans('display.phone')}}</label>
                                <input type="tel" value="{{$userData->phone}}" name="phone">
                          </div>
                            <div>
                                <label for="phone">{{trans('display.phone')}}</label>
                                <input type="tel" value="{{$userData->phone}}" name="phone">
                            </div>
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
                    </div>
                    <div class="user-profile-info">
                        <div style="font-size:25px; font-weight:700">{{trans('display.personal_info')}}</div>
                        <div style="display:flex; flex-wrap:wrap; gap:20px;">
                            <div>
                                <label  for="lastname">{{trans('display.lastname')}}</label>
                                <input value="{{$userData->lastname}}" type="text" name="lastname">
                            </div>
                            <div>
                                <label for="firstname">{{trans('display.firstname')}}</label>
                                <input type="firstname" value="{{$userData->firstname}}" name="firstname">
                            </div>
                            <div>
                                <label for="province">{{trans('display.province')}}</label>
                                <input type="text" value="{{$userData->province}}">
                            </div>
                            <div>
                                <label for="register">{{trans('display.register')}}</label>
                                <input type="text" value="{{$userData->register}}">
                            </div>                                                                                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div style="margin-bottom: 10px">
            <button type="button" class="link-1" id="profile-add" data-toggle="modal" data-target="#profile-add-modal" style="border-color:white">{{trans('display.add_new')}}</button>
        </div>
        <div class="modal fade" id="profile-add-modal" tabindex="-1" role="dialog" aria-labelledby="profile-add-modalLabel" aria-hidden="true">
            <div style="width:1100px;" class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="profile-add-modalLabel">{{trans('display.edit')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:;"style=" display:grid; grid-gap:30px; grid-template-columns:1fr 1fr;" method="POST" id="profile-form" class="form-horizontal form-bordered smart-form" enctype="multipart/form-data">
                        <input value="{{$userData->id}}" type="text" name="id" id="user_id" class="hidden">    
                        <div>
                            <div style="font-size:20px; font-weight:700">{{trans('display.login_information')}}</div>
                            <div class="form-group" style="display:flex; gap:10px; margin-top:20px;">
                                <div style="width:50%">
                                    <label for="username">{{trans('display.login_name')}}</label>
                                    <input type="text" id="username" class="base-input" name="username" value="{{$userData->username}}" placeholder="{{trans('display.username')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                                </div>
                                <div style="width:50%">
                                    <label for="email">{{trans('display.email')}}</label>
                                    <input type="email" id="email" class="base-input" name="email" value="{{$userData->email}}" placeholder="{{trans('display.email')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                                </div>
                            </div>
                            <div class="form-group" style="display:flex; gap:10px;">
                                <div style="width:50%">
                                    <label for="phone">{{trans('display.phone')}}</label>
                                    <input type="number" id="phone" class="base-input" name="phone" value="{{$userData->phone}}" placeholder="{{trans('display.phone')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                                </div>
                                <div style="width:50%">
                            
                                </div>
                            </div>
                        </div>
                        <div>
                            <div style="font-size:20px; font-weight:700;">{{trans('display.reset_password')}}</div>
                            <div class="form-group" style="display:flex; gap:10px; margin-top:20px;">
                                <div style="width:50%">
                                    <label for="old_password">{{trans('display.old_password')}}</label>
                                    <input type="password" id="old_password" class="base-input" name="old_password" value="" placeholder="{{trans('display.old_password')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                                </div>
                                <div style="width:50%">
                                    <label for="new_password">{{trans('display.new_password')}}</label>
                                    <input type="password" id="new_password" class="base-input" name="new_password" value="" placeholder="{{trans('display.new_password')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                                </div>
                            </div>
                            <div class="form-group" style="display:flex; gap:10px;">
                                <div style="width:50%">
                                    <label for="password_rewrite">{{trans('display.password_rewrite')}}</label>
                                    <input type="password" id="password_rewrite" class="base-input" name="password_rewrite" value="" placeholder="{{trans('display.password_rewrite')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                                </div>
                                <div style="width:50%">
                            
                                </div>
                            </div>
                        </div>
                        <div>
                            <div style="font-size:20px; font-weight:700">{{trans('display.personal_info')}}</div>
                            <div class="form-group" style="display:flex; gap:10px; margin-top:20px;">
                                <div style="width:50%">
                                    <label for="firstname">{{trans('display.firstname')}}</label>
                                    <input type="text" id="firstname" class="base-input" name="firstname" value="{{$userData->firstname}}" placeholder="{{trans('display.firstname')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                                </div>
                                <div style="width:50%">
                                    <label for="lastname">{{trans('display.lastname')}}</label>
                                    <input type="text" id="lastname" class="base-input" name="lastname" value="{{$userData->lastname}}" placeholder="{{trans('display.lastname')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                                </div>
                            </div>
                            <div class="form-group" style="display:flex; gap:10px;">
                                <div style="width:50%">
                                    <label for="register">{{trans('display.register')}}</label>
                                    <input type="text" id="register" class="base-input" name="register" value="{{$userData->register}}" placeholder="{{trans('display.register')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                                </div>
                                <div style="width:50%">
                            
                                </div>
                            </div>
                        </div>
                        <div>
                            <div style="font-size:20px; font-weight:700">{{trans('display.image')}}</div>
                            <div style="margin-top:20px">
                                <label for="image">{{trans('display.image')}}</label>
                                <input type="file" id="image" class="base-input" name="image" value="" placeholder="{{trans('display.image')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                            </div>
                        </div>
                        <input id="profile-submit" type="submit" class="base-submit" value="Хадгалах">
                        @csrf
                    </form>
                </div>
            </div>
            </div>
        </div>
        <!--  -->
    </div>
</div>
<div class="haha">

</div>



<script type="text/javascript" charset="utf8" src="/js/jquery-validation/dist/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"/>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="/js/confirm/jquery-confirm.min.js"></script>
<script src="/js/plugins/ol/build/ol.js"></script>
<script type="text/javascript" charset="utf8" src="/js/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="/js/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>


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

<script>
  $("#profile-add").on('click', function(){
        var form = document.getElementById('profile-form');
        var userId = $('#user_id').val();
        console.log(userId);
        $('#profile-form').validate({
        ignore: [],
        highlight:function(element) {
            $(element).parents('.form-group').addClass('has-error has-feedback');
        },
        unhighlight: function(element) {
            $(element).parents('.form-group').removeClass('has-error');
        },
        submitHandler: function(form) {
            
            var formData = new FormData(form);
            $.ajax({
            url: '/profile/'+userId,
            type: 'PUT',
            data: formData,
            beforeSend: function() {
                //$('#preloader').show();
            },
            success: function(response) {

            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
            async: false,
            cache: false,
            contentType: false,
            processData: false    
                }).done(function(data) {
            //submitButton.prop('disabled', false);
        });
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        }
        });
    });
</script>



