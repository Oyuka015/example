<form method="POST" id="examtakers-edit-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <label for="user_name">{{trans('display.user_name')}}</label>
    <input type="text" id="user_name" class="base-input" name="user_name" placeholder="{{trans('display.user_name')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="family_name">{{trans('display.family_name')}}</label>
    <input type="text" id="family_name" class="base-input" name="family_name" placeholder="{{trans('display.cofamily_namede')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="surname">{{trans('display.surname')}}</label>
    <input type="text" id="surname" class="base-input" name="surname"  placeholder="{{trans('display.surname')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="lastname">{{trans('display.lastname')}}</label>
    <input type="text" id="lastname" class="base-input" name="lastname"  placeholder="{{trans('display.lastname')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="register">{{trans('display.register')}}</label>
    <input type="text" id="register" class="base-input" name="register"  placeholder="{{trans('display.register')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="email">{{trans('display.email')}}</label>
    <input type="email" id="email" class="base-input" name="email"  placeholder="{{trans('display.email')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="phone">{{trans('display.phone')}}</label>
    <input type="number" id="phone" class="base-input" name="phone"  placeholder="{{trans('display.phone')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="citizenship">{{trans('display.citizenship')}}</label>
    <input type="text" id="citizenship" class="base-input" name="citizenship"  placeholder="{{trans('display.citizenship')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="active_status">{{trans('display.active_status')}}</label>
    <input type="text" id="active_status" class="base-input" name="active_status"  placeholder="{{trans('display.active_status')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>