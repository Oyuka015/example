<form method="POST" id="faq-add-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <label for="question">{{trans('display.question')}}</label>
    <input type="text" id="question" class="base-input" name="question" placeholder="{{trans('display.question')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="answer">{{trans('display.answer')}}</label>
    <input type="text" id="answer" class="base-input" name="answer" value="{{@$placeType->answer}}" placeholder="{{trans('display.answer')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>