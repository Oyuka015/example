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
                <img src="/{{$userData->image_url}}" alt="profile_pic">
            </div>
            <div class="user-profile-name">
                {{$userData->firstname}}    
            </div>
        </div>
        <div class="user-profile-other">
            <ul id="tab_s">
                <li>
                    <a href="#first">
                        <i class="fa-solid fa-user"></i>
                        <div>{{trans('display.profile')}}</div>
                    </a>
                </li>
                <li>
                    <a href="#third">
                        <i class="fa-solid fa-book-open"></i>
                        <div>{{trans('display.exam')}} ба {{trans('display.certificate')}}</div>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="/">
                        <i class="fa-solid fa-house"></i>
                        <div>{{trans('display.home')}}</div>
                    </a>
                </li>
                <li>
                    <a href="/do/logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <div>{{trans('display.log_out')}}</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="user-profile-main">
        <div id="tab-contents">
            <div id="first"class="p-4 space-y-4 h-[calc(100%-2rem)] overflow-y-auto">
                <div class="first">
                    <div class="user-profile-image">
                        <div class="user-img-section">
                            <img src="/{{$userData->image_url}}" alt="">
                        </div>
                    </div>
                    <div class="user-profile-info">
                        <div style="font-size:25px; font-weight:700;">{{trans('display.login_information')}}</div>
                        <div  style="display:flex; flex-wrap:wrap; gap:20px;">
                            <div>
                                <label  for="username">{{trans('display.login_name')}}</label>
                                <input value="{{$userData->username}}" type="text" name="username" readonly>
                            </div>
                            <div>
                                <label for="email">{{trans('display.email')}}</label>
                                <input type="email" value="{{$userData->email}}" name="email" readonly>
                            </div>
                            <div>
                                <label for="phone">{{trans('display.phone')}}</label>
                                <input type="tel" value="{{$userData->phone}}" name="phone" readonly>
                            </div>
                        </div>
                        <div style="font-size:25px; font-weight:700; margin-top:30px;">{{trans('display.personal_info')}}</div>
                        <div style="display:flex; flex-wrap:wrap; gap:20px;">
                            <div>
                                <label  for="lastname">{{trans('display.lastname')}}</label>
                                <input value="{{$userData->lastname}}" type="text" name="lastname" readonly>
                            </div>
                            <div>
                                <label for="firstname">{{trans('display.firstname')}}</label>
                                <input type="firstname" value="{{$userData->firstname}}" name="firstname" readonly>
                            </div>
                            <div>
                                <label for="education_degree">{{trans('display.education_degree')}}</label>
                                <input type="text" value="{{$userData->education_degree}}" readonly>
                            </div>
                            <div>
                                <label for="register">{{trans('display.register')}}</label>
                                <input type="text" value="{{$userData->register}}" name="register" readonly>
                            </div>                                                                                      
                        </div>
                        <div style="margin-top:30px; display:flex; justify-content:end; margin-right:55px;">
                            <button type="button" class="link-1" id="profile-add" data-toggle="modal" data-target="#profile-add-modal" style="border-color:white">{{trans('display.edit')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="third" class="hidden p-4 space-y-4 h-[calc(100%-2rem)] overflow-y-auto">   
                <div class="third">
                    <div class="exam-result-show">
                        <div>Шалгалтын хариу</div>
                        <table style="border:1px solid red;">
                            <thead>
                                <tr>{{trans('display.exam_name')}}</tr>
                                <tr>{{trans('display.score')}}</tr>
                                <tr>{{trans('display.exam_score')}}</tr>
                                <tr>{{trans('display.date')}}</tr>
                            </thead>
                        </table>
                    </div>
                    <div class="certificate-show">

                    </div>
                </div>
            </div>
        </div>
        <!--  -->
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
                                    <input type="password" id="old_password" class="base-input" name="old_password" value="" placeholder="{{trans('display.old_password')}}"  data-rule-required="false" data-msg-required="{{ trans('messages.validation_field_required') }}">
                                </div>
                                <div style="width:50%">
                                    <label for="password">{{trans('display.password')}}</label>
                                    <input type="password" id="password" class="base-input" name="password" value="" placeholder="{{trans('display.new_password')}}"  data-rule-required="false" data-msg-required="{{ trans('messages.validation_field_required') }}">
                                </div>
                            </div>
                            <div class="form-group" style="display:flex; gap:10px;">
                                <div style="width:50%">
                                    <label for="password_rewrite">{{trans('display.password_rewrite')}}</label>
                                    <input type="password" id="password_rewrite" class="base-input" name="password_rewrite" value="" placeholder="{{trans('display.password_rewrite')}}"  data-rule-required="false" data-msg-required="{{ trans('messages.validation_field_required') }}">
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
                            <div class="form-group" style="display:flex; margin-top:20px; justify-content:center;">
                                <div class="buttons">
                                    <div class="file">
                                        <div class="upload" >
                                            {{trans('display.change_image')}}
                                        </div>
                                    </div>
                                </div>
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
<input type="text" class="hidden" id="current-pass" value="{{Auth::user()->password}}"/>
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
<script src="/js/md5.min.js"></script>


<script>
    var uploadedImage = [];
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
                for (i = 0; i < uploadedImage.length; i++) {
                    console.log(uploadedImage[i]);
                    formData.append("file"+i, uploadedImage[i]);
                }
                
                var strHash = md5($('#old_password').val());
                if(strHash == $('#current-pass').val()){
                    console.log();
                    var pass = document.getElementById("password").value;
                    var pass_con = document.getElementById("password_rewrite").value;
                    if (pass != pass_con) {
                        alert("Шинэ нууц үг хоорондоо тохирохгүй байна!");
                    }
                }
                else{
                    alert("Одоо байгаа нууц үг тохирохгүй байна!");
                }
                $.ajax({
                url: '/profile/edit/'+userId,
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    //$('#preloader').show();
                },
                success: function(response) {
                    $('#profile-add-modal').modal('hide');
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
<!-- tab scripst -->
<script>
    let tabsContainer = document.querySelector("#tab_s");

    let tabTogglers = tabsContainer.querySelectorAll("#tab_s a");

        console.log(tabTogglers);

        tabTogglers.forEach(function(toggler) {
        toggler.addEventListener("click", function(e) {
            e.preventDefault();

            let tabName = this.getAttribute("href");

            let tabContents = document.querySelector("#tab-contents");

            for (let i = 0; i < tabContents.children.length; i++) {
            
            tabTogglers[i].parentElement.classList.remove("hover:bg-gray-200", "active:bg-gray-200");  tabContents.children[i].classList.remove("hidden");
            if ("#" + tabContents.children[i].id === tabName) {
                continue;
            }
            tabContents.children[i].classList.add("hidden");
            
            }
            e.target.parentElement.classList.add("hover:bg-gray-200", "active:bg-gray-200",);
        });
    });
</script>
<!-- inputmask -->
<script>
  $('#profile-form input[name=register]').inputmask('Regex', {regex: "^[А-ЯӨҮа-яөү]{2}[0-9]{8}$"});
  $('#profile-form input[name=phone]').inputmask('Regex', {regex: "^[0-9]{8}$"});
</script>



<!-- upload image -->
<script>
    $(document).ready(function (){
        uploadImage();
        function uploadImage() {
            var button = $('.file .upload')
            var uploader = $('<input type="file" accept="img/*" id="image" name="image"/>')
            var file = $('.file')
            
            button.on('click', function () {
                uploader.click()
            })
      
            uploader.on('change', function () {
                var reader = new FileReader()
                reader.onload = function(event) {
                    file.prepend('<div class="files" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>{{trans("display.remove")}}</span></div>')
                }
                reader.readAsDataURL(uploader[0].files[0]);
                uploadedImage.push(uploader[0].files[0]);
            })
        
            file.on('click', '.files', function () {
                $(this).remove()
            })
        }
    })
</script>

<style>
    .file {
        /* display: flex; */
        flex-wrap: wrap;
        margin-top: 20px;
    }
    .file .files,
    .file .upload {
        flex-basis: 31%;
        margin-bottom: 10px;
        border-radius: 4px;
        background-color:3px solid orange;
    }
    .file .files {
        
        width: 250px;
        height: 300px;
        background-size: cover;
        margin-right: 10px;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    .file .files:nth-child(3n) {
        margin-right: 0;
    }
    .file .files span {
        display: none;
        text-transform: capitalize;
        z-index: 2;
    }
    .file .files::after {
        content: "";
        width: 100%;
        height: 100%;
        transition: opacity 0.1s ease-in;
        border-radius: 4px;
        opacity: 0;
        position: absolute;
    }
    .file .files:hover::after {
        display: block;
        background-color: #000;
        opacity: 0.5;
    }
    .file .files:hover span {
        display: block;
        color: #fff;
    }
    .file .upload {
        background-color: #f5f7fa;
        align-self: center;
        text-align: center;
        padding: 40px 0;
        text-transform: uppercase;
        color: #848ea1;
        font-size: 12px;
        cursor: pointer;
    }

</style>