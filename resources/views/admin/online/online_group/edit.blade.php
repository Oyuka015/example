<form method="POST" id="online-edit-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <input type="text" class="base-input" name="group_name" id="group_name"  placeholder="{{trans('display.name')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{@$getData->name}}">
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>