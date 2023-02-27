<form method="POST" id="question-edit-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group">
    <label for="question">{{trans('display.question')}}</label>
    <input type="text" id="question" class="base-input" name="question" placeholder="{{trans('display.question')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{@$question->question}}">
  </div>
  <div class="form-group">
    <label for="answer1">{{trans('display.answer1')}}</label>
    <input type="text" id="answer1" class="base-input" name="answer1"  placeholder="{{trans('display.answer1')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{@$question->answer1}}">
  </div>
  <div class="form-group">
    <label for="answer2">{{trans('display.answer2')}}</label>
    <input type="text" id="answer2" class="base-input" name="answer2" placeholder="{{trans('display.answer2')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{@$question->answer2}}">
  </div>
  <div class="form-group">
    <label for="answer3">{{trans('display.answer3')}}</label>
    <input type="text" id="answer3" class="base-input" name="answer3"  placeholder="{{trans('display.answer3')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{@$question->answer3}}">
  </div>
  <div class="form-group">
    <label for="answer4">{{trans('display.answer4')}}</label>
    <input type="text" id="answer4" class="base-input" name="answer4"  placeholder="{{trans('display.answer4')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}" value="{{@$question->answer4}}">
  </div>
  <div class="form-group">
    <label for="correct_answer">{{trans('display.correct_answer')}}</label>
    <select name="correct_answer" id="correct_answer">
      <option value="answer1" {{'answer1' == $question->correct_answer ? 'selected' : ''}} >{{trans('display.answer1')}}</option>
      <option value="answer2" {{'answer2' == $question->correct_answer ? 'selected' : ''}}>{{trans('display.answer2')}}</option>
      <option value="answer3"{{'answer3' == $question->correct_answer ? 'selected' : ''}}>{{trans('display.answer3')}}</option>
      <option value="answer4"{{'answer4' == $question->correct_answer ? 'selected' : ''}}>{{trans('display.answer4')}}</option>
    </select>
  </div>
  <div class="form-group">
    <label for="score">{{trans('display.score')}}</label>
    <input type="text" id="score" class="base-input" name="score"  placeholder="{{trans('display.score')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>