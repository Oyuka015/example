<style>
    .file {
        /* display: flex; */
        flex-wrap: wrap;
        margin-top: 20px;
    }
    .file .files,
    .file .pdf {
        flex-basis: 31%;
        margin-bottom: 10px;
        border-radius: 4px;
        background-color:3px solid orange;
    }
    .file .files {
        
        width: 100px;
        height: 100px;
        background-size: cover;
        margin-right: 10px;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    .file .files:nth-child(3n) {
        margin-right: 0;
    }
    .file .files span {
        display: none;
        text-transform: capitalize;
        z-index: 2;
    }
    .file .files::after {
        content: "";
        width: 100%;
        height: 100%;
        transition: opacity 0.1s ease-in;
        border-radius: 4px;
        opacity: 0;
        position: absolute;
    }
    .file .files:hover::after {
        display: block;
        background-color: #000;
        opacity: 0.5;
    }
    .file .files:hover span {
        display: block;
        color: #fff;
    }
    .file .pdf {
        background-color: #f5f7fa;
        align-self: center;
        text-align: center;
        padding: 40px 0;
        text-transform: uppercase;
        color: #848ea1;
        font-size: 12px;
        cursor: pointer;
    }

</style>
<form method="POST" id="online-add-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
  {{ csrf_field() }}
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
  <div class="form-group" style="display:flex; gap:5px">
    <div style="width:50%">
      <label for="lesson_name">{{trans('display.lesson_name')}}</label>
      <input type="text" id="lesson_name" class="base-input" name="lesson_name" placeholder="{{trans('display.lesson_name')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
    </div>
    <div style="width:50%">
      <label for="lesson_summary">{{trans('display.lesson_summary')}}</label>
      <input type="text" id="lesson_summary" class="base-input" name="lesson_summary" placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
    </div>
  </div>
  <!-- <div class="form-group">
    <label for="lesson_summary">{{trans('display.lesson_summary')}}</label>
    <input type="text" id="lesson_summary" class="base-input" name="lesson_summary" placeholder="{{trans('display.lesson')}}"  data-rule-required="true" data-msg-required="{{ trans('messages.validation_field_required') }}">
  </div> -->
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
    <div class="buttons">
        <div class="file">
            <div class="pdf">
                {{trans('display.upload_homework')}}
            </div>
        </div>
    </div>
  </div>
  <input type="submit" class="base-submit" value="Хадгалах">
  @csrf
</form>

<script>
   $(document).ready(function () {
     uploadFile();
     checkRadio();
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
    function uploadFile() {
      var button = $('.file .pdf')
      var uploader = $('<input type="file" accept="application/pdf" id="file" name="file"/>')
      var file = $('.file')
      
      button.on('click', function () {
        uploader.click()
      })
      
      uploader.on('change', function () {
          var reader = new FileReader()
          reader.onload = function(event) {
            file.prepend('<div class="files" style="background-image: url(\'' + event.target.result + '\');" rel="'+ event.target.result  +'"><span>{{trans("display.remove")}}</span></div>')
          }
          reader.readAsDataURL(uploader[0].files[0]);
          uploadedFile.push(uploader[0].files[0]);
       })
      
       file.on('click', '.files', function () {
        $(this).remove()
      })
    }
    $("#radio_buttons").on('change', function(){
      checkRadio();
    })
    function checkRadio(){
      if($("#old_group").is(':checked')){
        $("#selected_lesson_group").show();
        $("#add_lesson_group").val('').hide();
      }
      else{
        $("#selected_lesson_group").val('').hide();
        $("#add_lesson_group").show();
      }
    }
  });
</script>

<style>
  /* upload video */
  .video {
      /* display: flex; */
      flex-wrap: wrap;
      margin-top: 20px;
  }
  .video .vid,
  .video .upload {
      flex-basis: 31%;
      /* margin-bottom: 10px; */
      border-radius: 4px;
  }
  .video .vid {
      width: 112px;
      height: 93px;
      background-size: cover;
      margin-right: 10px;
      background-position: center;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      position: relative;
      overflow: hidden;
  }
  .video .vid:nth-child(3n) {
      margin-right: 0;
  }
  .video .vid span {
      display: none;
      text-transform: capitalize;
      z-index: 2;
  }
  .video .vid::after {
      content: "";
      width: 100%;
      height: 100%;
      transition: opacity 0.1s ease-in;
      border-radius: 4px;
      opacity: 0;
      position: absolute;
  }
  .video .vid:hover::after {
      display: block;
      background-color: #000;
      opacity: 0.5;
  }
  .video .vid:hover span {
      display: block;
      color: #fff;
  }
  .video .upload {
      background-color: #f5f7fa;
      align-self: center;
      text-align: center;
      padding: 40px 0;
      text-transform: uppercase;
      color: #848ea1;
      font-size: 12px;
      cursor: pointer;
  }
</style>