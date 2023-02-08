

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
            <form style=" display:grid; grid-gap:30px; grid-template-columns:1fr 1fr;" method="POST" id="profile-add-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
                <div>
                    <div style="font-size:20px; font-weight:700">{{trans('display.login_information')}}</div>
                    <div class="form-group" style="display:flex; gap:10px; margin-top:20px;">
                        <div style="width:50%">
                            <label for="username">{{trans('display.login_name')}}</label>
                            <input type="text" id="username" class="base-input" name="username" value="" placeholder="{{trans('display.username')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                        </div>
                        <div style="width:50%">
                            <label for="email">{{trans('display.email')}}</label>
                            <input type="email" id="email" class="base-input" name="email" value="" placeholder="{{trans('display.email')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                        </div>
                    </div>
                    <div class="form-group" style="display:flex; gap:10px;">
                        <div style="width:50%">
                            <label for="phone">{{trans('display.phone')}}</label>
                            <input type="number" id="phone" class="base-input" name="phone" value="" placeholder="{{trans('display.phone')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
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
                            <input type="text" id="firstname" class="base-input" name="firstname" value="" placeholder="{{trans('display.firstname')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                        </div>
                        <div style="width:50%">
                            <label for="lastname">{{trans('display.lastname')}}</label>
                            <input type="text" id="lastname" class="base-input" name="lastname" value="" placeholder="{{trans('display.lastname')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
                        </div>
                    </div>
                    <div class="form-group" style="display:flex; gap:10px;">
                        <div style="width:50%">
                            <label for="register">{{trans('display.register')}}</label>
                            <input type="text" id="register" class="base-input" name="register" value="" placeholder="{{trans('display.register')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
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
                @csrf
            </form>
            <input type="submit" class="base-submit" value="Хадгалах">
        </div>
      </div>
    </div>
</div>

<script>
    $("#profile-add").on('click', function(data){
        // var faqId = $(this).data('faqid');

        $("#profile-add-form").modal('show');
        $('#profile-add-modal .modal-body');
        // $('#profile-add-form').validate({
        //     ignore: [],
        //     highlight:function(element) {
        //         $(element).parents('.form-group').addClass('has-error has-feedback');
        //     },
        //     unhighlight: function(element) {
        //         $(element).parents('.form-group').removeClass('has-error');
        //     },
        //     submitHandler: function(form) {
        //         var formData = new FormData(form);
        //         console.log('sasa');
        //         // $.ajax({
        //         //     url: '/admin/faq/'+faqId,
        //         //     type: 'PUT',
        //         //     data: $(form).serialize(),
        //         //     beforeSend: function() {
        //         //         //$('#preloader').show();
        //         //     },
        //         //     success: function(response) {
        //         //         $('#faq-edit-modal').modal('hide');
        //         //         $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
        //         //     },
        //         //     error: function (xhr, textStatus, error) {
        //         //         console.log(xhr.statusText);
        //         //         console.log(textStatus);
        //         //         console.log(error);
        //         //     },
        //         //     async: false          
        //         // }).done(function(data) {
        //         //     //submitButton.prop('disabled', false);
        //         // });
        //     },
        //     errorPlacement: function(error, element) {
        //         error.insertAfter(element);
        //     }
        // });
    }); 
</script>






<script>
    var form = document.getElementById('profile-form');
    
    $("#zZ").on('click', function(){
        var userId = $("#user_id").val();
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
                console.log('kk');
                $.ajax({
                    url: '/profile/'+userId,
                    type: 'PUT',
                    data: $(form).serialize(),
                    beforeSend: function() {
                        //$('#preloader').show();
                    },
                    success: function(response) {
                        $('.haha').html(response).fadeIn().delay(5000).fadeOut();
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