<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script src="/js/jquery-3.6.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/css/datatables.css">
<link rel="stylesheet" href="/js/confirm/jquery-confirm.min.css">
<link rel="stylesheet" type="text/css" href="/js/plugins/ol/css/ol.css"/>
<link rel="stylesheet" type="text/css" href="/js/plugins/ol/css/ol.smart.css"/>
<link rel="stylesheet" type="text/css" href="/js/chosen/chosen.min.css"/>
<style>
    .editable-cell{
        transition: .3s all linear;
        background-color: orange;
    }
    

    .editable-field{
        display: flex;
        justify-content: space-between
    }
    

    .editable-input{
        border: none;
        font-size: inherit;
        background: inherit;
        color: inherit;
        transition: .3s all linear;
    }
    
    .editable-input:focus{
        outline: none;
        background: white;
        color: #545454;
        background-color: yellow;
    }
       
        

    .edit-button{
        cursor: pointer;
        font-size: 5em;
        position: relative;
        top: 5px;
        background-color: pink;
    }
    
    .hide{
        visibility: hidden !important
    }
    
    .editing{
        background: #E9F5FA;
        color: #f1f1f1;
        box-shadow: -2px 0px 0px #0081C6;
    }
    .container{
        width: 300px;
        height: 100px;
        border:1px solid red;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    
</style>
<div class="container">
    <td class="editable-cell">
        <div class="editable-field">
        <input class="editable-input" type="text" value="Other"         placeholder="Click The Edit Icon" readonly/>
        <i class="fa fa-pencil-square-o edit-button"></i>
        </div>
    </td>
</div>

<script>
    var $count = 0;
    var $eb = $('.edit-button');
    var $ei = $('.editable-input');
    var $ec = $('.editable-cell');

    //Editable input fields
    $eb.on('click', function() {
        $count++
        if ($count < 2) {
            $ei.prop('readonly', false).focus();
            $ei.prop('placeholder','');
            $ei.val('');
            $(this).addClass('hide');
            $ec.addClass('editing');
        } else {
            $ei.prop('readonly', false).focus();
            $eb.addClass('hide');
            $ec.addClass('editing');
        }
    });


    $ei.on('blur', function() {
        $eb.removeClass('hide');
        $ei.prop('readonly', true);
        $ec.removeClass('editing');
    });

</script>
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