<form method="POST" id="online-add-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <div class="buttons">
        <div class="video">
            <div class="upload">
                {{trans('display.upload_video')}}
            </div>
        </div>
    </div>
  </div>
  <div class="form-group">
    <label for="lesson_name">{{trans('display.lesson_name')}}</label>
    <input type="text" id="lesson_name" class="base-input" name="lesson_name" placeholder="{{trans('display.lesson_name')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="lesson_summary">{{trans('display.lesson_summary')}}</label>
    <input type="text" id="lesson_summary" class="base-input" name="lesson_summary" placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="lesson_posted">{{trans('display.lesson_posted')}}</label>
    <input type="text" id="lesson_posted" class="base-input" name="lesson_posted"  placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="posted_date">{{trans('display.posted_date')}}</label>
    <input type="number" id="posted_date" class="base-input" name="posted_date"  placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <div class="form-group">
    <label for="lesson_type">{{trans('display.lesson_type')}}</label>
    <input type="text" id="lesson_type" class="base-input" name="lesson_type"  placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>

<script>
   $(document).ready(function () {
    uploadVideo();
    function uploadVideo() {
      var button = $('.video .upload')
      var uploader = $('<input type="file" accept="video/mp4" id="video" name="video"/>')
      var video = $('.video')
      
      button.on('click', function () {
        uploader.click()
      })
      
      uploader.on('change', function () {
          var reader = new FileReader()
          reader.onload = function(event) {
            video.prepend('<div class="vid" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>{{trans("display.remove")}}</span></div>')
          }
          reader.readAsDataURL(uploader[0].files[0]);
          uploadedVideo.push(uploader[0].files[0]);
       })
      
      video.on('click', '.vid', function () {
        $(this).remove()
      })
    
    }
  });
</script>