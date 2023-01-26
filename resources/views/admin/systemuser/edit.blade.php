<form method="POST" id="systemuser-edit-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <label for="user_name">{{trans('display.user_name')}}</label>
    <input type="text" id="user_name" class="base-input" name="user_name" value="{{@$placeType->user_name}}" placeholder="{{trans('display.code')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="province">{{trans('display.province')}}</label>
    <input type="text" id="province" class="base-input" name="province" value="{{@$placeType->province}}" placeholder="{{trans('display.code')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="surname">{{trans('display.surname')}}</label>
    <input type="text" id="surname" class="base-input" name="surname" value="{{@$placeType->surname}}" placeholder="{{trans('display.code')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="lastname">{{trans('display.lastname')}}</label>
    <input type="text" id="lastname" class="base-input" name="lastname" value="{{@$placeType->lastname}}" placeholder="{{trans('display.code')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="email">{{trans('display.email')}}</label>
    <input type="text" id="email" class="base-input" name="email" value="{{@$placeType->email}}" placeholder="{{trans('display.code')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="phone">{{trans('display.phone')}}</label>
    <input type="text" id="phone" class="base-input" name="phone" value="{{@$placeType->phone}}" placeholder="{{trans('display.code')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="active_status">{{trans('display.active_status')}}</label>
    <input type="text" id="active_status" class="base-input" name="active_status" value="{{@$placeType->active_status}}" placeholder="{{trans('display.code')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>