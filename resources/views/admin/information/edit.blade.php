<form method="POST" id="information-edit-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <label for="image">{{trans('display.image')}}</label>
    <input type="file" id="image" class="base-input" name="image" placeholder="{{trans('display.image')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="title">{{trans('display.title')}}</label>
    <input type="text" id="title" class="base-input" name="title" placeholder="{{trans('display.title')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="information">{{trans('display.information')}}</label>
    <input type="text" id="information" class="base-input" name="information" value="{{@$placeType->information}}" placeholder="{{trans('display.information')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>