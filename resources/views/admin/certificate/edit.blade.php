<form method="POST" id="certificate-edit-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <label for="user_name">{{trans('display.user_name')}}</label>
    <input type="text" id="user_name" class="base-input" name="user_name" placeholder="{{trans('display.user_name')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="certificate_id">{{trans('display.certificate_id')}}</label>
    <input type="text" id="certificate_id" class="base-input" name="certificate_id" value="{{@$placeType->certificate_id}}" placeholder="{{trans('display.certificate_id')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="register">{{trans('display.register')}}</label>
    <input type="text" id="register" class="base-input" name="register" value="{{@$placeType->register}}" placeholder="{{trans('display.register')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="registered_date">{{trans('display.registered_date')}}</label>
    <input type="text" id="registered_date" class="base-input" name="registered_date" value="{{@$placeType->registered_date}}" placeholder="{{trans('display.registered_date')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="registered_user">{{trans('display.registered_user')}}</label>
    <input type="text" id="registered_user" class="base-input" name="registered_user" value="{{@$placeType->registered_user}}" placeholder="{{trans('display.registered_user')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="lastname">{{trans('display.lastname')}}</label>
    <input type="text" id="lastname" class="base-input" name="lastname" value="{{@$placeType->lastname}}" placeholder="{{trans('display.lastname')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="surname">{{trans('display.surname')}}</label>
    <input type="text" id="surname" class="base-input" name="surname" value="{{@$placeType->surname}}" placeholder="{{trans('display.surname')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="valid_for">{{trans('display.valid_for')}}</label>
    <input type="text" id="valid_for" class="base-input" name="valid_for" value="{{@$placeType->valid_for}}" placeholder="{{trans('display.valid_for')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="signature">{{trans('display.signature')}}</label>
    <input type="text" id="signature" class="base-input" name="signature" value="{{@$placeType->signature}}" placeholder="{{trans('display.signature')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>