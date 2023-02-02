<form method="POST" id="online-edit-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <video width="320" height="240" autoplay playsinline style="pointer-events: none;">
        <source src="/{{$online->video}}" type="video/mp4">
    </video>
 </div>
  <div class="form-group">
    <label for="lesson_name">{{trans('display.lesson_name')}}</label>
    <input type="text" id="lesson_name" class="base-input" name="lesson_name" placeholder="{{trans('display.lesson_name')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{$online->lesson_name}}">
  </div>
  <div class="form-group">
    <label for="lesson_summary">{{trans('display.lesson_summary')}}</label>
    <input type="text" id="lesson_summary" class="base-input" name="lesson_summary"  placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{$online->lesson_summary}}">
  </div>
  <div class="form-group">
    <label for="lesson_posted">{{trans('display.lesson_posted')}}</label>
    <input type="text" id="lesson_posted" class="base-input" name="lesson_posted"  placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{$online->lesson_posted}}">
  </div>
  <div class="form-group">
    <label for="posted_date">{{trans('display.posted_date')}}</label>
    <input type="number" id="posted_date" class="base-input" name="posted_date"  placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{$online->posted_date}}">
  </div>
  <div class="form-group">
    <label for="lesson_type">{{trans('display.lesson_type')}}</label>
    <input type="text" id="lesson_type" class="base-input" name="lesson_type" placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{$online->lesson_type}}">
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>