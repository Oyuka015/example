<form method="POST" id="feedback-edit-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <label for="user_name">{{trans('display.user_name')}}</label>
    <input type="text" id="user_name" class="base-input" name="user_name" placeholder="{{trans('display.user_name')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="feedback">{{trans('display.feedback')}}</label>
    <input type="text" id="feedback" class="base-input" name="feedback" value="{{@$placeType->feedback}}" placeholder="{{trans('display.feedback')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>