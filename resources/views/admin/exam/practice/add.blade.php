<form method="POST" id="exam-add-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exam_name">{{trans('display.exam_name')}}</label>
    <input type="text" id="name" class="base-input" name="name" placeholder="{{trans('display.exam_name')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="exam_name">{{trans('display.description')}}</label>
    <input type="text" id="exam_description" class="base-input" name="exam_description" placeholder="{{trans('display.description')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="exam_name">{{trans('display.time')}} Жишээ нь: 20 минут бол 00:20</label>
    <input type="number" id="exam_time" class="base-input get_time" name="exam_time" placeholder="{{trans('display.time')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="exam_name">{{trans('display.lower_score')}}</label>
    <input type="number" id="lower_percent" class="base-input" name="lower_percent" placeholder="{{trans('display.lower_score')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="exam_name">{{trans('display.question')}}</label>
    <div>
      <select id="questions" name="questions[]" class="chosen-select base-input" multiple>
        @foreach($questions as $question)
          <option value="{{$question->id}}">{{$question->question}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <input type="checkbox" id="is_active" name="is_active" value="1" checked>
    <label for="is_active">{{trans('display.is_active')}}</label>
  </div>
  <div class="form-group">
    <label for="exam_name">{{trans('display.required_exam')}}</label>
    <div>
      <select id="required_exam_id" name="required_exam_id" class="chosen-select base-input">
        <option value="">{{trans('display.select')}}</option>
        @foreach($exams as $exam)
          <option value="{{$exam->id}}">{{$exam->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>
<script>
  function updateTextView(_obj){
    var num = getNumber(_obj.val());
    if(num==0){
      _obj.val('');
    }else{
      _obj.val(num.toLocaleString());
    }
  }
  function getNumber(_str){
    var arr = _str.split('');
    var out = new Array();
    for(var cnt=0;cnt<arr.length;cnt++){
      if(isNaN(arr[cnt])==false){
        out.push(arr[cnt]);
      }
    }
    return Number(out.join(''));
  }
  $(document).ready(function(){
    $('#exam_time').on('keyup',function(){
      updateTextView($(this));
    });
  });
  $(".chosen-select").chosen({search_contains: true, no_results_text: "{{trans('messages.no_result')}}", placeholder_text_multiple: "{{trans('display.select')}}"}); 
</script>