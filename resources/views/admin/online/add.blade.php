<form method="POST" id="online-add-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <label for="image">{{trans('display.image')}}</label>
    <input type="file" id="image" class="base-input" name="image" placeholder="{{trans('display.image')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="lesson_name">{{trans('display.lesson_name')}}</label>
    <input type="text" id="lesson_name" class="base-input" name="lesson_name" placeholder="{{trans('display.lesson_name')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="lesson_summary">{{trans('display.lesson_summary')}}</label>
    <input type="text" id="lesson_summary" class="base-input" name="lesson_summary" value="{{@$placeType->lesson_summary}}" placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="lesson_posted">{{trans('display.lesson_posted')}}</label>
    <input type="text" id="lesson_posted" class="base-input" name="lesson_posted" value="{{@$placeType->lesson_posted}}" placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="posted_date">{{trans('display.posted_date')}}</label>
    <input type="text" id="posted_date" class="base-input" name="posted_date" value="{{@$placeType->posted_date}}" placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="lesson_type">{{trans('display.lesson_type')}}</label>
    <input type="text" id="lesson_type" class="base-input" name="lesson_type" value="{{@$placeType->lesson_type}}" placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>