<form method="POST" id="online-edit-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  <div class="form-group" id="radio_buttons_edit">
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
    <select name="selected_lesson_group_edit" class="base-input" id="selected_lesson_group_edit">
      <option value="" hidden>{{trans('display.select_lesson_group')}}</option>
      @foreach(@$lesson_groups as $group)
      <option value="{{$group->id}}" {{@$online->lesson_group_id == $group->id ? 'selected' : ''}}>{{@$group->name}}</option>
      @endforeach
    </select>
    <input type="text" id="add_lesson_group_edit" class="base-input" name="add_lesson_group_edit" placeholder="{{trans('display.add_lesson_group')}}">
  </div>
  <div class="form-group">
    <video width="100%" height="240" controls>
        <source src="/{{$online->video}}" type="video/mp4">
    </video>
  </div>
  <div class="form-group">
    <button type="button" style="right:0; position:absolute; margin-bottom: 10px;" class="close new_video">
      <span aria-hidden="true" class="new_vid">{{trans('display.new_video_upload')}}</span>
    </button>
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
  <div class="form-group">
    <iframe src="/{{$online->pdf_file}}#toolbar=4" type="application/pdf" height="450" style="width: 100%;"></iframe>
  </div>
  <div class="form-group">
    <button type="button" style="right:0; position:absolute; margin-bottom: 10px;" class="close file_edit">
      <span aria-hidden="true" class="pdf_edit">{{trans('display.new_file_upload')}}</span>
    </button>
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>
<script>
  $(document).ready(function () {
    checkRadioEdit();
    uploadVideoEdit();
    uploadFileEdit();
    function uploadVideoEdit() {
      var button = $('.new_video .new_vid')
      var uploaders = $('<input type="file" accept="video/mp4" id="video" name="video"/>')
      var videos = $('.new_video')
      
      button.on('click', function () {
        $.confirm({
          title: '{{trans('messages.warning_title')}}',
          content: '{{trans('messages.current_video_delete')}}',
          confirmButton: 'Тийм',
          cancelButton: 'Үгүй',
          type: 'red',
          typeAnimated: true,
          buttons: {
            tryAgain: {
                text: 'Устгах',
                btnClass: 'btn-red',
                action: function(){
                  uploader.click()
                }
            },
            close: {
              text: 'Цуцлах',
              action: function(){

              }
            }
          }
        });
      })
      
      uploaders.on('change', function () {
          var reader = new FileReader()
          reader.onload = function(event) {
            videos.prepend('<div class="vid" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>{{trans("display.remove")}}</span></div>')
          }
          reader.readAsDataURL(uploaders[0].files[0]);
          uploadedVideoEdit.push(uploaders[0].files[0]);
       })
      
      videos.on('click', '.new_vid', function () {
        $(this).remove()
      })
    }

    function uploadFileEdit() {
      var button = $('.file_edit .pdf_edit')
      var uploader = $('<input type="file" accept="application/pdf" id="file" name="file"/>')
      var file = $('.file_edit')
      
      button.on('click', function () {
        $.confirm({
          title: '{{trans('messages.warning_title')}}',
          content: '{{trans('messages.current_file_delete')}}',
          confirmButton: 'Тийм',
          cancelButton: 'Үгүй',
          type: 'red',
          typeAnimated: true,
          buttons: {
            tryAgain: {
                text: 'Устгах',
                btnClass: 'btn-red',
                action: function(){
                  uploader.click()
                }
            },
            close: {
              text: 'Цуцлах',
              action: function(){

              }
            }
          }
        });      
      })
      
      uploader.on('change', function () {
          var reader = new FileReader()
          reader.onload = function(event) {
            file.prepend('<div class="files_edit" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>{{trans("display.remove")}}</span></div>')
          }
          reader.readAsDataURL(uploader[0].files[0]);
          uploadedFileEdit.push(uploader[0].files[0]);
       })
      
       file.on('click', '.files_edit', function () {
        $(this).remove()
      })
    }
    $("#radio_buttons_edit").on('change', function(){
      checkRadioEdit();
    })
    function checkRadioEdit(){
      if($("#old_group").is(':checked')){
        $("#selected_lesson_group_edit").show();
        $("#add_lesson_group_edit").val('').hide();
      }
      else{
        $("#selected_lesson_group_edit").val('').hide();
        $("#add_lesson_group_edit").show();
      }
    }
  });
</script> 