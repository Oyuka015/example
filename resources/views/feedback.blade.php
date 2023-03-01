@extends('ulayout.ulayout')
 
@section('content')
<style>
    .lil-content::before{
        background-image: url('https://t4.ftcdn.net/jpg/03/12/00/49/240_F_312004975_UNcAYLepbKX26M0n7tMEAq7XmzFAYFcs.jpg');
    }
</style>

<div class="lil-header-section">
    <div class="lil-content">
        <h1>Санал хүсэлт</h1>
    </div>
</div>
<div class="form-sub-heading">

</div>
<!-- feedback form -->
<div class="feed" id="feed">
  <form method="POST" action="" id="feedback-add-form">
    <label for="name">Овог нэр:</label>
    <input id="name" type="text" name="name" placeholder="Б.Болд" autocomplete="off"><br>
    <label for="mail">Имэйл хаяг:</label>
    <input  id="mail" type="email" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="bold@gmail.com" autocomplete="off" title="И-мэйл хаяг оруулна уу!"><br>
    <label for="phone_number">Утасны дугаар:</label>
    <input id="phone" type="number" name="phone" autocomplete="off" placeholder="9999****" pattern="[0-9]{8}" required ><br>
    <label for="feedback">Санал хүсэлт:</label>
    <textarea id="textarea" style="padding: 10px;" name="feedback" id="" cols="30" rows="10" autocomplete="off" title="yu bnb"></textarea><br>
    <button type="submit" id="feedback_button" style="color: white">
        <i class="fa-solid fa-paper-plane"></i>
        Илгээх
    </button>
  </form>
</div>


<script>
  var form = document.getElementById('feedback-add-form');
  $("#feedback_button").on('click', function(){
      $('#feedback-add-form').validate({
        ignore: [],
        highlight:function(element) {
            $(element).parents('.form-group').addClass('has-error has-feedback');
        },
        unhighlight: function(element) {
            $(element).parents('.form-group').removeClass('has-error');
        },
        submitHandler: function(form) {
            console.log('ssss')
          var formData = new FormData(form);
          $.ajax({
            url: '/feedback/store',
            type: form.method,
            data: $(form).serialize(),
            beforeSend: function() {
                //$('#preloader').show();
            },
            success: function(response) {
            $('#name').val('');
            $('#phone').val('');
            $('#mail').val('');
            $('#textarea').val('');
              $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
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
    });
</script>


@endsection
 
@push('js')

@endpush