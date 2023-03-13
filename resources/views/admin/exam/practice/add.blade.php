<form method="POST" id="exam-add-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <label for="student">{{trans('display.student')}}</label>
    <select name="user_id" id="student">
      <option value="" hidden>{{trans('display.select')}}</option>
      @foreach($customers as $customer)
      <option value="{{$customer->id}}">{{$customer->lastname}} {{$customer->firstname}}</option>
      @endforeach
    </select> 
  </div>
  <div class="form-group" style="display:flex;">
    <div style="width: 49%">
      <label for="begin_date">{{trans('display.begin_date')}}</label>
      <input type="datetime-local" id="begin_date" class="base-input" name="begin_date" placeholder="{{trans('display.begin_date')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
    </div>
    <div style="width: 49%; margin-left: 1%;">
      <label for="end_date">{{trans('display.end_date')}}</label>
      <input type="datetime-local" id="end_date" class="base-input" name="end_date" placeholder="{{trans('display.end_date')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
    </div>
  </div>
  <div class="form-group">
    <label for="zoom_link">{{trans('display.zoom_link')}}</label>
    <input type="text" autocomplete="off" id="zoom_link" class="base-input" name="zoom_link" placeholder="{{trans('display.zoom_link')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
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