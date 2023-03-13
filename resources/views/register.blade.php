<script src="/js/jquery-3.6.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/css/datatables.css">
<link rel="stylesheet" href="/js/confirm/jquery-confirm.min.css">
<link rel="stylesheet" type="text/css" href="/js/plugins/ol/css/ol.css"/>
<link rel="stylesheet" type="text/css" href="/js/plugins/ol/css/ol.smart.css"/>
<link rel="stylesheet" type="text/css" href="/js/chosen/chosen.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .register-form{
       display:block;
       width: 900px;
       font-size: 17px;
       margin:auto;
       margin-top:20px;
       margin-bottom:30px;
    }
    .register-form input{
        padding:8px 15px;
    }
    .system-login-information{
        border:1px solid red;
        padding:20px;
        position:relative;
        display:grid;
        grid-template-columns:1fr 1fr;
        grid-gap:10px;  
    }
    .general-information{
        border:1px solid blue;
        display:grid;
        grid-template-columns: 1fr 1fr;
        grid-gap:10px;  
        padding:20px;
        position:relative;
        margin-top: 20px;
    }
    .general-information label, .system-login-information label, .education-information label{
        display:flex;
        flex-direction:column;
    }
    .register-information-title{
        position:absolute;
        top:-10px;
        left:20px;
        background-color: #fff;
        padding: 0 10px;
    }
    .education-information{
        border:1px solid cyan;
        display:grid;
        grid-template-columns: 1fr 1fr;
        grid-gap:10px;  
        margin-top: 20px;
        position:relative;
        padding:20px;       
    }
    .register-form-submit{
        margin-top: 10px;
        width: 100%;
        display:flex;
        justify-content:center;
    }
    .register-form-submit button{
        padding:5px 10px;
        font-size: 20px;
        background-color: #89e7e7b8;
        border:1px inset;
    }
    .register-form-submit button:hover{
        background-color: #89e7e7b8;
        border:1px outset;
    }
    /* switch toggle button */
    .switch {
        position: relative;
        display: inline-block;
        width: 30px;
        height: 15px;
    }

  /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

  /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 10px;
        width: 10px;
        left: 4px;
        bottom: 3px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(15px);
        -ms-transform: translateX(15px);
        transform: translateX(15px);
    }
    .slider.round {
        border-radius: 34px;
    }
    .slider.round:before {
        border-radius: 50%;
    }
</style>


<form method="POST" class="register-form" id="register-form" action="javascript:;"  >
  <div class="system-login-information" style="display:grid; grid-template-columns:1fr 1fr;">
    <div class="register-information-title">Системд нэвтрэх мэдээлэл</div>
    <div>
        <label for="username">
            {{trans('display.login_name')}}
            <input type="text" name="username" autocomplete="off">
        </label>
        <label for="password">
            {{trans('display.password')}}
            <input type="password" name="password" autocomplete="off">
        </label>
        <div style="display:flex; gap:5px; ">
            <label for="">{{trans('display.active_status')}}</label>
            <label style="margin-top:4px;" class="switch" name="switch">
                <input type="checkbox" checked>
                <span class="slider round"></span>
            </label>  
        </div>
    </div>
    <!--  -->
    <div style="display:flex; margin-top:20px; justify-content:center; ">
        <div class="buttons">
            <div class="file">
                <div class="upload" >
                    Зураг сонгох
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    
    
  </div>
  <div class="general-information">
      <div class="register-information-title">Ерөнхий мэдээлэл</div>
      <label for="citizenship">
          {{trans('display.citizenship')}}
          <input type="text" name="citizenship" autocomplete="off">
      </label>
      <label for="family_name">
          {{trans('display.family_name')}}
          <input type="text" name="family_name" autocomplete="off">
      </label>
      
      <label for="firstname">
          {{trans('display.firstname')}}
          <input type="text" name="firstname" autocomplete="off">
      </label>
      
      <label for="lastname">
          {{trans('display.lastname')}}
          <input type="text" name="lastname" autocomplete="off">
      </label>
      
      <label for="register">
          {{trans('display.register')}}
          <input type="text" name="register" autocomplete="off">
      </label>
      <label for="age">
          {{trans('display.age')}}
          <input type="number" name="age" autocomplete="off">
      </label>

      <label for="work">
          {{trans('display.gender')}}
          <select name="gender" id="gender">
              <option value="male">{{trans('display.male')}}</option>
              <option value="female">{{trans('display.female')}}</option>
          </select>
      </label> 
      
      <label for="work">
          Хөдөлмөр эрхлэлт
          <select name="work" id="work">
              <option value="yes">Тийм</option>
              <option value="no">Үгүй</option>
          </select>
      </label>    

      <label for="email">
          {{trans('display.email')}}
          <input type="email" name="email" autocomplete="off">
      </label>
      <label for="phone">
          {{trans('display.phone')}}
          <input type="number" name="phone" autocomplete="off">
      </label>
      <label for="in-case-name">
          Онцгой тохиолдолд холбоо барих хүний нэр
          <input type="text" name="in-case-name" autocomplete="off">
      </label>
      <label for="in-case-number">
          Онцгой тохиолдолд холбоо барих хүний утас
          <input type="number" name="in-case-number" autocomplete="off">
      </label>
      <label for="province-capital">
          Аймаг/нийслэл
          <select name="province-capital" id="aulevel1">
            <option value="">{{trans('display.select')}}</option>
            @foreach(@$au_levels as $levels)
                <option value="{{@$levels->id}}">{{@$levels->name}}</option>
            @endforeach
          </select>
      </label>
      <label for="district">
          Сум/дүүрэг
          <select name="district" id="aulevel2">
            <option value="">{{trans('display.select')}}</option>
          </select>      
        </label>
      <label for="education-degree">
          Боловсролын зэрэг
          <input type="text" name="education-degree" id="education-degree" autocomplete="off">
      </label>
      
      <label for="home_address">
          {{trans('display.home_address')}}
          <textarea name="home_address" id="home_address" cols="10" rows="5" autocomplete="off"></textarea>
      </label>
  </div>
  <div class="education-information">
      <div class="register-information-title">Боловсролын мэдээлэл</div>
      <label for="school">
          {{trans('display.school_name')}}
          <input type="text" name="school" autocomplete="off">
      </label>
      <label for="grad">
          {{trans('display.graduated')}}
          <!-- <input type="text" name="grad" autocomplete="off"> -->
          <select name="grad" id="grad">
          @foreach(range(date('Y')-40, date('Y')) as $y)
                <option value="{{$y}}">{{$y}}</option>
            @endforeach
          </select>
      </label>
      <label for="occupation">
          {{trans('display.occupation')}}
          <input type="text" name="occupation" autocomplete="off">
      </label>
      <label for="gpa">
          {{trans('display.gpa')}}
          <input type="number" name="gpa" autocomplete="off">
      </label>
      <label for="diploma_number">
          {{trans('display.diploma_number')}}
          <input type="text" name="diploma_number" autocomplete="off">
      </label>
      <label for="diploma_register">
          {{trans('display.diploma_register')}}
          <input type="text" name="diploma_register" autocomplete="off">
      </label>
      <label for="diploma_doc">
          {{trans('display.diploma_doc')}}
          <input type="text" name="diploma_doc" autocomplete="off">
      </label>
  </div>
  <div type="submit" id="register-form-submit" class="register-form-submit">
      <button>{{trans('display.sign_in')}}</button>
  </div>
</form>

<div class="form-sub-heading">

</div>



<!-- <script type="text/javascript" charset="utf8" src="/js/datatables.min.js"></script>
<script type="text/javascript" charset="utf8" src="/js/dataTables.buttons.min.js"></script> -->
<script type="text/javascript" charset="utf8" src="/js/jquery-validation/dist/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"/>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="/js/confirm/jquery-confirm.min.js"></script>
<script src="/js/plugins/ol/build/ol.js"></script>
<script type="text/javascript" charset="utf8" src="/js/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="/js/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>


<script>
    var uploadedImage = [];
    var form = document.getElementById('register-form');
    $("#register-form-submit").on('click', function(){
      $('#register-form').validate({
        ignore: [],
        highlight:function(element) {
            $(element).parents('.form-group').addClass('has-error has-feedback');
        },
        unhighlight: function(element) {
            $(element).parents('.form-group').removeClass('has-error');
        },
        submitHandler: function(form) {
            var formData = new FormData(form);
            var i;
            console.log(uploadedImage.length);
            for (i = 0; i < uploadedImage.length; i++) {
                console.log(uploadedImage[i]);
                formData.append("file"+i, uploadedImage[i]);
            }
            $.ajax({
            url: '/register/save',
            type: form.method,
            data: formData,
            beforeSend: function() {
                //$('#preloader').show();
            },
            success: function(response) {
              $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
              window.location.href = '/login';
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

        $('#aulevel1').on('change', function(){
            var id = $('#aulevel1').val();
            $.get( '/getAuLevel2/' + id, function( data ) {
                $('#aulevel2').empty().html(data);
            });
        });
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
        
        width: 300px;
        height: 200px;
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

