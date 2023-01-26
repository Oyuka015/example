<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="/js/jquery-3.6.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/css/datatables.css">
<link rel="stylesheet" href="/js/confirm/jquery-confirm.min.css">
<link rel="stylesheet" type="text/css" href="/js/plugins/ol/css/ol.css"/>
<link rel="stylesheet" type="text/css" href="/js/plugins/ol/css/ol.smart.css"/>
<link rel="stylesheet" type="text/css" href="/js/chosen/chosen.min.css"/>

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
    .general-information label, .system-login-information label{
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
        margin-top: 20px;
        position:relative;
        padding:20px;       
    }
    .education-information-table {
        position: relative;
        padding:10px 30px;
    }
    .education-table-remove {
        width: 100%;
        color: red;
        font-weight: 900;
        font-size: 19px;
        cursor: pointer;
        display:flex;
        justify-content:center;
    }
    #education-table-add {
        color: #1f1f1f;
        cursor:pointer;
        position: absolute;
        background-color: #89e7e7b8;
        border-radius:8px;
        bottom: -5px;
        left: 30px;
        font-size: 20px;
        padding:0px 10px;
    }
    tr{
      border-bottom:1px solid #9999;
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
<div class="register-form">
    <div class="system-login-information">
        <div class="register-information-title">Системд нэвтрэх мэдээлэл</div>
        <label for="user_name">
            {{trans('display.login_name')}}
            <input type="text" name="user_name" >
        </label>
        <label for="password">
            {{trans('display.password')}}
            <input type="password" name="password">
        </label>
        <div style="display:flex; gap:5px; ">
            <label for="">{{trans('display.active_status')}}</label>
            <label style="margin-top:4px;" class="switch" name="switch">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>  
        </div>
        <div style="display:flex; gap:5px; align-items:center;">
            <label for="image">{{trans('display.image')}}</label>
            <input type="file" name="image">
        </div>
        
    </div>
    <div class="general-information">
        <div class="register-information-title">Ерөнхий мэдээлэл</div>
        <label for="citizenship">
            {{trans('display.citizenship')}}
            <input type="text" name="citizenship">
        </label>
        <label for="family_name">
            {{trans('display.family_name')}}
            <input type="text" name="family_name">
        </label>
        
        <label for="surname">
            {{trans('display.surname')}}
            <input type="text" name="surname">
        </label>
        
        <label for="lastname">
            {{trans('display.lastname')}}
            <input type="text" name="lastname">
        </label>
        
        <label for="register">
            {{trans('display.register')}}
            <input type="text" name="register">
        </label>
        <label for="age">
            {{trans('display.age')}}
            <input type="number" name="age">
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
            <input type="email" name="email">
        </label>
        <label for="phone">
            {{trans('display.phone')}}
            <input type="number" name="phone">
        </label>
        <label for="in-case-name">
            Онцгой тохиолдолд холбоо барих хүний нэр
            <input type="text" name="in-case-name">
        </label>
        <label for="in-case-number">
            Онцгой тохиолдолд холбоо барих хүний утас
            <input type="number" name="in-case-number">
        </label>
        
        
        <label for="province-capital">
            Аймаг/нийслэл
            <select name="province-capital" id="province-capital" >
                <option value="">ha</option>
                <option value="">hshdjahdk</option>
                <option value="">hdjsa;jka</option>
            </select>
        </label>
        

        <label for="district">
            Сум/дүүрэг
            <select name="district" id="district">
                <option value="">hjkdhsl</option>
                <option value="">hjkdhsl</option>
                <option value="">hjkdhsl</option>
                <option value="">hjkdhsl</option>
            </select>
        </label>
        
        <label for="education-degree">
            Боловсролын зэрэг
            <select name="education-degree" id="education-degree">
                <option value="">bachelor</option>
                <option value="">bachelor</option>
                <option value="">bachelor</option>
                <option value="">bachelor</option>
            </select>
        </label>
        
        <label for="home_address">
            {{trans('display.home_address')}}
            <textarea name="home_address" id="home_address" cols="10" rows="5"></textarea>
        </label>
    </div>
    <div class="education-information">
        <div class="register-information-title">Боловсролын мэдээлэл</div>
        <div id="table" class="education-information-table">
            <div class="education-table-add" id="education-table-add">+</div>
            <table class="table">
            <tr>
                <th>Сургуулийн нэр</th>
                <th>Төгссөн он</th>
                <th>Төгссөн мэргэжил</th>
                <th>Голч дүн</th>
                <th>Дипломын дугаар</th>
                <th>Дипломын бүртгэлийн дугаар</th>
                <th>Дипломын нүүр</th>
                <th>Дипломын хавсралт</th>
                <th>{{trans('display.delete')}}</th>
            </tr>
            <tr>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td>
                    <span class="education-table-remove "><i class="fa-solid fa-xmark"></i></span>
                </td>
            </tr>
            <!-- This is our clonable table line -->
            <tr class="hide">
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td>
                    <span class="education-table-remove "><i class="fa-solid fa-xmark"></i></span>
                </td>
            </tr>
            </table>
        </div>
    </div>
    <div class="register-form-submit">
        <button>Төлбөр төлөх</button>
    </div>
</div>

<!-- education table script-->
<script>
  var $TABLE = $('#table');

  $('#education-table-add').click(function () {
      var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
      $TABLE.find('table').append($clone);
  });

  $('.education-table-remove').click(function () {
      $(this).parents('tr').detach();
  });

</script>




<!-- script -->
<script type="text/javascript" charset="utf8" src="/js/datatables.min.js"></script>
<script type="text/javascript" charset="utf8" src="/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="/js/jquery-validation/dist/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"/>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="/js/confirm/jquery-confirm.min.js"></script>
<script src="/js/plugins/ol/build/ol.js"></script>
<script type="text/javascript" charset="utf8" src="/js/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="/js/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>
<script>
  var geoserver = "{{ Config::get('app.geo_server') }}";

  $(document).ready(function () {
    
    generateID()
    choose()
    generateOption()
    selectionOption()
    removeClass()
    uploadImage()
    submit()
    resetButton()
    removeNotification()
    autoRemoveNotification()
    autoDequeue()
    
    var ID
    var way = 0
    var queue = []
    var fullStock = 10
    var speedCloseNoti = 1000
    
    function generateID() {
      var text = $('header span')
      var newID = ''
    
      for(var i = 0; i < 3; i++) {
        newID += Math.floor(Math.random() * 3)
      }
      
      ID = 'ID: 5988' + newID
      text.html(ID)
    }
    
    function choose() {
      var li = $('.ways li')
      var section = $('.sections section')
      var index = 0
      li.on('click', function () {
        index = $(this).index()
        $(this).addClass('active')
        $(this).siblings().removeClass('active')
        
        section.siblings().removeClass('active')
        section.eq(index).addClass('active')
        if(!way) {
          way = 1
        }  else {
          way = 0
        }
      })
    }
    
    function generateOption() {
      var select = $('select option')
      var selectAdd = $('.select-option .option')
      $.each(select, function (i, val) {
          $('.select-option .option').append('<div rel="'+ $(val).val() +'">'+ $(val).html() +'</div>')
      })
    }
    
    function selectionOption() {
      var select = $('.select-option .head')
      var option = $('.select-option .option div')
    
      select.on('click', function (event) {
        event.stopPropagation()
        $('.select-option').addClass('active')
      })
      
      option.on('click', function () {
        var value = $(this).attr('rel')
        $('.select-option').removeClass('active')  
        select.html(value)
    
        $('select#category').val(value)
      })
    }
    
    function removeClass() {
      $('body').on('click', function () { 
        $('.select-option').removeClass('active')   
      })                  
    }
    
    function uploadImage() {
      var button = $('.images .pic')
      var uploader = $('<input type="file" accept="image/*" name="file"/>')
      var images = $('.images')
      
      button.on('click', function () {
        uploader.click()
      })
      
      uploader.on('change', function () {
          var reader = new FileReader()
          reader.onload = function(event) {
            images.prepend('<div class="img" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>{{trans("display.remove")}}</span></div>')
          }
          reader.readAsDataURL(uploader[0].files[0]);
          placeImages.push(uploader[0].files[0]);
       })
      
      images.on('click', '.img', function () {
        $(this).remove()
      })
    
    }
    
    function submit() {  
      var button = $('#send')
      
      button.on('click', function () {
        if(!way) {
          var title = $('#title')
          var cate  = $('#category')
          var images = $('.images .img')
          var imageArr = []

          
          for(var i = 0; i < images.length; i++) {
            imageArr.push({url: $(images[i]).attr('rel')})
          }
          
          var newStock = {
            title: title.val(),
            category: cate.val(),
            images: imageArr,
            type: 1
          }
          
          saveToQueue(newStock)
        } else {
          // discussion
          var topic = $('#topic')
          var message = $('#msg')
          
          var newStock = {
            title: topic.val(),
            message: message.val(),
            type: 2
          }
          
          saveToQueue(newStock)
        }
      })
    }
    
    function removeNotification() {
      var close = $('.notification')
      close.on('click', 'span', function () {
        var parent = $(this).parent()
        parent.fadeOut(300)
        setTimeout(function() {
          parent.remove()
        }, 300)
      })
    }
    
    function autoRemoveNotification() {
      setInterval(function() {
        var notification = $('.notification')
        var notiPage = $(notification).children('.btn')
        var noti = $(notiPage[0])
        
        setTimeout(function () {
          setTimeout(function () {
           noti.remove()
          }, speedCloseNoti)
          noti.fadeOut(speedCloseNoti)
        }, speedCloseNoti)
      }, speedCloseNoti)
    }
    
    function autoDequeue() {
      var notification = $('.notification')
      var text
      
      setInterval(function () {

          if(queue.length > 0) {
            if(queue[0].type == 2) {
              text = ' Your discusstion is sent'
            } else {
              text = ' Your order is allowed.'
            }
            
            notification.append('<div class="success btn"><p><strong>Success:</strong>'+ text +'</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
            queue.splice(0, 1)
            
          }  
      }, 10000)
    }
    
    function resetButton() {
      var resetbtn = $('#reset')
      resetbtn.on('click', function () {
        reset()
      })
    }
    
    // helpers
    function saveToQueue(stock) {
      var notification = $('.notification')
      var check = 0
      
      if(queue.length <= fullStock) {
        if(stock.type == 2) {
            if(!stock.title || !stock.message) {
              check = 1
            }
        } else {
          if(!stock.title || !stock.category || stock.images == 0) {
            check = 1
          }
        }
        
        if(check) {
          notification.append('<div class="error btn"><p><strong>Error:</strong> Please fill in the form.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
        } else {
          notification.append('<div class="success btn"><p><strong>Success:</strong> '+ ID +' is submitted.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
          queue.push(stock)
          reset()
        }
      } else {
        notification.append('<div class="error btn"><p><strong>Error:</strong> Please waiting a queue.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>')
      } 
    }
    function reset() {
      
      $('#title').val('')
      $('.select-option .head').html('Category')
      $('select#category').val('')
      
      var images = $('.images .img')
      for(var i = 0; i < images.length; i++) {
        $(images)[i].remove()
      }
      
      var topic = $('#topic').val('')
      var message = $('#msg').val('')
    }
  })
</script>
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>