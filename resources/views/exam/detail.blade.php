<link rel="stylesheet" href="/css/mystyle.css">
<div class="exam-detail">
    <div class="exam-detail-title">{{@$exams->name}}</div>
        <input type="text" value="{{@$exams->exam_time}}" style="display: hidden" id="exam-time">

    <div style="padding: 5px 30px">
    @foreach(@$questions as $exam)
        <div class="exam-question">
            <div class="exam-question-title">{{$loop->iteration}}. {{$exam->mapToQuestions->question}}</div>
            <div class="exam-question-input">
                <input type="radio" style="margin-top:1%;" name="q-{{$loop->iteration}}" id="{{$loop->iteration}}-1">
                <label for="{{$loop->iteration}}-1">{{$exam->mapToQuestions->answer1}}</label><br>
                <input type="radio" style="margin-top:1%;" name="q-{{$loop->iteration}}" id="{{$loop->iteration}}-2">
                <label for="{{$loop->iteration}}-2">{{$exam->mapToQuestions->answer2}}</label><br>
                <input type="radio" style="margin-top:1%;" name="q-{{$loop->iteration}}" id="{{$loop->iteration}}-3">
                <label for="{{$loop->iteration}}-3">{{$exam->mapToQuestions->answer3}}</label><br>
                <input type="radio" style="margin-top:1%; margin-bottom:1%;" name="q-{{$loop->iteration}}" id="{{$loop->iteration}}-4">
                <label for="{{$loop->iteration}}-4">{{$exam->mapToQuestions->answer4}}</label>
            </div>
        </div>
    @endforeach
    
</div>
    <div id="timer" class="flex"  style="margin: 3%; display:flex; justify-content:end; gap:20px; ">
    </div>
    <div class="flex" style="margin: 3%; display:flex; justify-content:end; gap:20px; ">
        <button class="back" id="cancel-button">{{trans('display.back')}}</button>
        <button class="submit" id="confirm-button" style="margind-left: 2%;">{{trans('display.submit')}}</button>
    </div>
</div>
<script src="/js/jquery-3.6.2/jquery.min.js"></script>
<script src="/js/sweetalert2.js"></script>

<script>
// Set the date we're counting down to
var countDownDate = new Date();
let text = document.getElementById("exam-time").value;
console.log(text);
var myArray = text.split(":");
var minute = myArray[1];
var hour = myArray[0];
console.log(parseInt(minute))
                    // ene minute gdg ymiig ynzlana
var dates = countDownDate.setHours(countDownDate.getHours() + parseInt(hour), countDownDate.getMinutes() + parseInt(minute));
// var dates2 = dates.setMinutes(dates.getMinutes() + 01);
var newDate = dates;
// Update the count down every 1 second
var x = setInterval(function() {
  // Get today's date and time
  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = newDate - now;
// console.log(distance, '2')
  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("timer").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
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
        showCancelButton: true
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
                // if(result.isDismissed == true){
                //     Swal.fire({
                //         title: 'Шалгалт илгээх.',
                //         icon: 'success',
                //         iconHtml: '',
                //         cancelButtonText: 'Үгүй',
                //         confirmButtonText: 'Тийм',
                //         showCancelButton: true
                //         // showCloseButton: true
                //     }).then((result) => {
                //         if (result.isConfirmed == true) {
                //             window.location.href = '/detail/submit';
                //         }
                //         if(result.isDismissed == true){
                //             location.replace('/exam');
                //         }
                //     })
                // }
            })
        })
</script>