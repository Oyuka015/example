<form method="POST" id="exam-edit-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exam_name">{{trans('display.exam_name')}}</label>
    <input type="text" id="name" class="base-input" name="name" placeholder="{{trans('display.exam_name')}}" value="{{@$exam->name}}" data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="exam_name">{{trans('display.lower_score')}}</label>
    <input type="number" id="lower_percent" class="base-input"  value="{{@$exam->lower_percent}}" name="lower_percent" placeholder="{{trans('display.lower_score')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="exam_name">{{trans('display.question')}}</label>
    <div>
      <select id="questions" name="questions[]" class="chosen-select base-input" multiple>
        @foreach($questions as $question)
          <option value="{{$question->id}}" {{in_array($question->id, @$exam->questions->pluck('id')->toArray()) ? 'selected' : ''}}>{{$question->question}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <input type="checkbox" id="is_active" name="is_active" value="1" {{@$exam->is_active ? 'checked' : ''}}>
    <label for="is_active">{{trans('display.is_active')}}</label>
  </div>
  <div class="form-group">
    <label for="exam_name">{{trans('display.required_exam')}}</label>
    <div>
      <select id="required_exam_id" name="required_exam_id" class="chosen-select base-input">
        <option value="">{{trans('display.select')}}</option>
        @foreach($exams as $exm)
          <option value="{{$exm->id}}" {{$exm->id == @$exam->required_exam_id ? 'selected' : ''}}>{{$exm->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>
<script>
  $(".chosen-select").chosen({search_contains: true, no_results_text: "{{trans('messages.no_result')}}", placeholder_text_multiple: "{{trans('display.select')}}"}); 
</script>