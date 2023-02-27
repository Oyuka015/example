<link rel="stylesheet" href="/css/mystyle.css">
<script src="/js/jquery-3.6.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/css/datatables.css">
<link rel="stylesheet" href="/js/confirm/jquery-confirm.min.css">
<link rel="stylesheet" type="text/css" href="/js/plugins/ol/css/ol.css"/>
<link rel="stylesheet" type="text/css" href="/js/plugins/ol/css/ol.smart.css"/>
<link rel="stylesheet" type="text/css" href="/js/chosen/chosen.min.css"/>
<link rel="stylesheet" href="/css/mystyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body{
        background-color: #a2a2a2;
        /* position:relative; */
        /* background-color: #00a98d65; */
    }
</style>
<div class="exam-detail">
    <div class="exam-detail-title">{{@$exams->name}}</div>
    <input type="text" value="{{@$exams->exam_time}}" style="display: none" id="exam-time">
    <form method="POST" id="exam-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
        <input type="hidden" value="{{@$exams->id}}" style="display: none" name="exam_id" id="exam_id">
        <div style="padding: 5px 30px">
        @foreach(@$questions as $question)
            <div class="exam-question">
                <div class="exam-question-title">{{$loop->iteration}}. {{$question->question}}</div>
                <div class="exam-question-input error-div">
                    <input type="radio" style="margin-top:1%;" value="1" name="question[{{$question->id}}]" id="{{$loop->iteration}}-1">
                    <label for="{{$loop->iteration}}-1">{{$question->answer1}}</label><br>
                    <input type="radio" style="margin-top:1%;" value="2" name="question[{{$question->id}}]" id="{{$loop->iteration}}-2">
                    <label for="{{$loop->iteration}}-2">{{$question->answer2}}</label><br>
                    <input type="radio" style="margin-top:1%;" value="3" name="question[{{$question->id}}]" id="{{$loop->iteration}}-3">
                    <label for="{{$loop->iteration}}-3">{{$question->answer3}}</label><br>
                    <input type="radio" style="margin-top:1%; margin-bottom:1%;" value="4" name="question[{{$question->id}}]" id="{{$loop->iteration}}-4">
                    <label for="{{$loop->iteration}}-4">{{$question->answer4}}</label>
                </div>
            </div>
        @endforeach
        </div>
        <div class="flex" style="margin: 3%; display:flex; justify-content:end; gap:20px; ">
            <button style="color:white; background:#d26363;" class="back" type="button" id="cancel-button">{{trans('display.back')}}</button>
            <button class="submit" type="submit" id="confirm-button" style="margind-left: 2%; background-color:#00aab2; color:white;">{{trans('display.submit')}}</button>
        </div>
    </form>
</div>
<div class="clock">
    <i class="fa-solid fa-clock"></i>
    <div id="timer" class="flex" style=" display:flex; justify-content:end; gap:20px;">
    </div>
</div>

<script src="/js/jquery-3.6.2/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="/js/jquery-validation/dist/jquery.validate.min.js"></script>

<script src="/js/sweetalert2.js"></script>

<script>
// Set the date we're counting down to
var countDownDate = new Date();
let text = document.getElementById("exam-time").value;
var myArray = text.split(":");
var minute = myArray[1];
var hour = myArray[0];
                    // ene minute gdg ymiig ynzlana
var dates = countDownDate.setHours(countDownDate.getHours() + parseInt(hour), countDownDate.getMinutes() + parseInt(minute));
var newDate = dates;
// Update the count down every 1 second
var x = setInterval(function() {
  // Get today's date and time
  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = newDate - now;
  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("timer").innerHTML = hours + ":" + minutes + ":" + seconds ;
  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "Хугацаа дууссан!";
    Swal.fire({
        title: 'Хугацаа дууссан!',
        icon: 'warning',
        iconHtml: '!',
        cancelButtonText: 'Цуцлах',
        confirmButtonText: 'Илгээх',
        showCancelButton: truer
        // showCloseButton: true
    }).then((result) => {
        if (result.isConfirmed == true) {
            Swal.fire({
                title: 'Шалгалт илгээх.',
                icon: 'success',
                iconHtml: '!',
                cancelButtonText: 'Үгүй',
                confirmButtonText: 'Тийм',
                showCancelButton: true
                // showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed == true) {
                    window.location.href = '/detail/submit';
                }
                if(result.isDismissed == true){
                    location.replace('/exam');
                }
            })
        }
        if(result.isDismissed == true){
            Swal.fire({
                title: 'Цуцлахдаа итгэлтэй байна уу?',
                icon: 'warning',
                iconHtml: '!',
                cancelButtonText: 'Үгүй',
                confirmButtonText: 'Тийм',
                showCancelButton: true
                // showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed == true) {
                    location.replace('/exam');
                }
                if(result.isDismissed == true){
                    Swal.fire({
                        title: 'Шалгалт илгээх.',
                        icon: 'success',
                        iconHtml: '',
                        cancelButtonText: 'Үгүй',
                        confirmButtonText: 'Тийм',
                        showCancelButton: true
                        // showCloseButton: true
                    }).then((result) => {
                        if (result.isConfirmed == true) {
                            window.location.href = '/detail/submit';
                        }
                        if(result.isDismissed == true){
                            location.replace('/exam');
                        }
                    })
                }
            })
        }
    })
  }
}, 1000);
</script>
<script>
     $('#exam-form').validate({
        ignore: [],
        highlight:function(element) {
            $(element).parents('.error-div').addClass('has-error has-feedback');
        },
        unhighlight: function(element) {
            $(element).parents('.error-div').removeClass('has-error');
        },
        submitHandler: function(form) {
            var formData = new FormData(form);
            $.ajax({
            url: '/exam',
            type: 'POST',
            data: $(form).serialize(),
            beforeSend: function() {
                //$('#preloader').show();
            },
            success: function(response) {
                if(response.status == true)
                {
                    Swal.fire({
                        title: response.message,
                        icon: 'success',
                        iconHtml: '',
                        confirmButtonText: 'Үргэлжлүүлэх',
                        // showDenyButton: true,
                        // showCloseButton: true
                    }).then((result) => {
                        location.replace('/exam');
                    });
                }
                else
                {
                    Swal.fire({
                        title: response.message,
                        icon: 'error',
                        iconHtml: '',
                        confirmButtonText: 'Үргэлжлүүлэх',
                        // showDenyButton: true,
                        // showCloseButton: true
                    }).then((result) => {
                        
                    });
                }
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
            async: false          
        }).done(function(data) {
            //submitButton.prop('disabled', false);
        });
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        }
    });
    $('#cancel-button').on('click', function(){
        Swal.fire({
                title: 'Цуцлахдаа итгэлтэй байна уу?',
                icon: 'warning',
                iconHtml: '!',
                cancelButtonText: 'Үгүй',
                confirmButtonText: 'Тийм',
                showCancelButton: true,
                // showDenyButton: true,
                // showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed == true) {
                    location.replace('/exam');
                }
            })
        })
</script>