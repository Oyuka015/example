<form method="POST" id="online-edit-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group" id="radio_buttons">
    <label class="form-control">
      <input type="radio" name="radio" id="old_group" checked/>
      {{trans('display.select_lesson_group')}}
    </label>
    <label class="form-control">
      <input type="radio" name="radio" id="new_group"/>
      {{trans('display.add_lesson_group')}}
    </label>
  </div>
  <div class="form-group">
    <select name="selected_lesson_group" class="base-input" id="selected_lesson_group">
      <option value="" hidden>{{trans('display.select_lesson_group')}}</option>
      @foreach(@$lesson_groups as $group)
      <option value="{{$group->id}}">{{@$group->name}}</option>
      @endforeach
    </select>
    <input type="text" id="add_lesson_group" class="base-input" name="add_lesson_group" placeholder="{{trans('display.add_lesson_group')}}">
  </div>
  <button type="button" style="right:0; position:absolute;" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="form-group">
    <video width="320" height="240" controls>
        <source src="/{{$online->video}}" type="video/mp4">
    </video>
 </div>
  <div class="form-group" style="display:flex; gap:5px">
    <div style="width:50%">
      <label for="lesson_name">{{trans('display.lesson_name')}}</label>
      <input type="text" id="lesson_name" class="base-input" name="lesson_name" placeholder="{{trans('display.lesson_name')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{$online->lesson_name}}">
    </div>
    <div style="width:50%">
      <label for="lesson_summary">{{trans('display.lesson_summary')}}</label>
      <input type="text" id="lesson_summary" class="base-input" name="lesson_summary"  placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{$online->lesson_summary}}">
    </div>
  </div>
  <div class="form-group" style="display:flex; gap:5px">
    <div style="width:50%">
      <label for="lesson_posted">{{trans('display.lesson_posted')}}</label>
      <input type="text" id="lesson_posted" class="base-input" name="lesson_posted"  placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{$online->user->firstname}}">
    </div>
    <div style="width:50%">
      <label for="posted_date">{{trans('display.posted_date')}}</label>
      <input type="text" readonly id="posted_date" class="base-input" name="posted_date"  placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{date('Y-m-d H:i:s', strtotime($online->created_at))}}">
    </div>
  </div>
  <button type="button" style="right:0; position:absolute;" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="form-group">
    <iframe src="/{{$online->pdf_file}}#toolbar=4" type="application/pdf" height="450" style="width: 100%;"></iframe>
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>