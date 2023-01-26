<form method="POST" id="exam-add-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exam_name">{{trans('display.exam_name')}}</label>
    <input type="text" id="exam_name" class="base-input" name="exam_name" placeholder="{{trans('display.exam_name')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="exam_file">{{trans('display.exam_file')}}</label>
    <input type="file" id="exam_file" class="base-input" name="exam_file" value="{{@$placeType->exam_file}}" placeholder="{{trans('display.exam_file')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>