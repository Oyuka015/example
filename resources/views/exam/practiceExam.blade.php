@extends('layout.layout')
 
@section('content')
<section class="admin_register_section">
  
  <h1 class="admin_register_title">{{trans('display.practice_exam')}}</h1>
  
  <div class="form-sub-heading">

  </div>

  <!-- collapse -->
  <style>
    .search-collapse{
      width:100%;
      border:1px solid #9999;
      padding:5px 10px;
    }
  </style>
  <div style="margin-bottom: 10px">
    <label class="search-form" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      {{trans('display.filter_search')}}
    </label>
    <div class="collapse search-collapse" id="collapseExample">
      <div class="card card-body">
        <form method="POST" id="question-search-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-4">
              <div style="padding:5px">
                <input type="text" id="question" name="question" placeholder="{{trans('display.question')}}">
              </div>
            </div>
            <div class="col-md-4">
              <div style="padding:5px">
                <button type="submit" class="btn btn-primary" style="float:right">{{trans('display.search')}}</button>
              </div>
            </div>
            <div class="col-md-4">
              
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- collapse end -->
  <div style="margin-bottom: 10px">
    <button type="button" class="link-1" id="question-add" data-toggle="modal" data-target="#question-add-modal" style="border-color:white">{{trans('display.add_new')}}</button>
  </div>

  <table cellpadding="0" cellspacing="0" border="0" id="question-table">
    <thead class="tbl-header">
      <tr>
        <th style="width:30px">№</th>
        <th style="width:15%">{{trans('display.question')}}</th>
        <th style="width:15%">{{trans('display.answer1')}}</th>
        <th style="width:15%">{{trans('display.answer2')}}</th>
        <th style="width:15%">{{trans('display.answer3')}}</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
  <div class="modal fade" id="question-add-modal" tabindex="-1" role="dialog" aria-labelledby="question-add-modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="question-add-modalLabel">{{trans('display.add_new')}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-close" data-dismiss="modal">{{trans('display.close')}}</button>
          <button type="button" class="btn btn-primary">{{trans('display.save')}}</button>
        </div> -->
      </div>
    </div>
  </div>
  <div class="modal fade" id="question-edit-modal" tabindex="-1" role="dialog" aria-labelledby="question-edit-modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="question-edit-modalLabel">{{trans('display.edit')}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-close" data-dismiss="modal">{{trans('display.close')}}</button>
          <button type="button" class="btn btn-primary">{{trans('display.save')}}</button>
        </div> -->
      </div>
    </div>
  </div>

</section>
<!-- collapse style -->
<style>
  .text-right{
    float: right;
  }
  * {
    box-sizing: border-box;
  }

  input[type=text], select, textarea {
    width: 100%;
    padding: 6px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }

  .chosen-single{
    width: 100%;
    padding: 12px !important;
    height: 45px !important;
  }

  .chosen-choices{
    width: 100%;
    padding: 12px !important;
    height: 45px !important;
    border-radius: 5px;
  }

  label {
    padding: 12px 12px 12px 0;
    display: inline-block;
  }

  input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
  }

  input[type=submit]:hover {
    background-color: #45a049;
  }

  .col-35 {
    float: left;
    width: 30%;
    margin-top: 6px;
  }

  .col-65 {
    float: left;
    width: 65%;
    margin-top: 6px;
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  /* Responsive layout - when the screen is less than 350px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 350px) {
    .col-25, .col-75, input[type=submit] {
      width: 100%;
      margin-top: 0;
    }
  }
</style>
<!-- collapse style end -->
<script>
  var questionTable = $('#question-table').DataTable( {
      // searching: false,
      paging: true,
      lengthChange: false,
      processing:     true,
      serverSide:     true,
      deferRender:    true,
      autoWidth:      false,
      // filter:         false,
      // deferRender:    true,
      // autoWidth:      true,
      // dom: 'Bfrtip',
      dataType: 'json',
      paginationType: "full_numbers",
      ajax: {
          url: '{!! route('question.datalist') !!}',
          dataType: "JSON",
          type: 'post',
          data: function ( d ) {

              d.register_number = $('#app-search-form input[id="search_register_number"]').val();
              
              d.question = $('#question-search-form input[id="question"]').val();
          }
      },
      columns: [
        { 
          data: null,
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        { data: 'question', "defaultContent": ''},
        { data: 'answer1', "defaultContent": ''},
        { data: 'answer2', "defaultContent": ''},
        { data: 'answer3', "defaultContent": ''},
        { data: 'answer4', "defaultContent": ''},
        { data: 'correct_answer', "defaultContent": ''},
        { data: 'score', "defaultContent": ''},
        { data: 'action', "defaultContent": ''},
      ],
      columnDefs: [
        {
            searchable: false,
            orderable: false,
            targets: [0,8]
        },{
            class: "text-center",
            targets: [0,8]
        },{
            targets: [0,7],
            class: "border-right"
        }
      ],
      order: [[ 1, "asc" ]],
      dom: '<"pull-left"B><"pull-right"l><"clear">tip',
      buttons: [
          // {
          //     text: '{{trans("display.add_new")}}',
          //     className: 'link-1',
          //     action: function ( e, dt, node, config ) {
          //         alert( 'Button activated' );
          //     }
          // }
      ],
      "language": 
        {
          "decimal":        "",
          "emptyTable":     "{{trans('messages.table_empty')}}",
          "info":           "{{trans('messages.table_showing')}}",
          "infoEmpty":      "{{trans('messages.table_showing_empty')}}",
          "infoFiltered":   "{{trans('messages.table_filtered')}}",
          "infoPostFix":    "",
          "thousands":      ",",
          // "lengthMenu":     "Show _MENU_ entries",
          // "loadingRecords": "Loading...",
          "processing":     "{{trans('messages.table_processing')}}",
          // "search":         "Search:",
          "zeroRecords":    "{{trans('messages.table_no_match')}}",
          "paginate": {
            "first":      "{{trans('messages.table_first')}}",
            "last":       "{{trans('messages.table_last')}}",
            "next":       "{{trans('messages.table_next')}}",
            "previous":   "{{trans('messages.table_previous')}}"
          }
        }
  }); 
  //add role
  $("#question-add").on('click', function(){
    $.get( '/admin/question/create', function( data ) {
      $('#question-add-modal .modal-body').html(data);
      $('#question-add-form').validate({
        ignore: [],
        highlight:function(element) {
            $(element).parents('.form-group').addClass('has-error has-feedback');
        },
        unhighlight: function(element) {
            $(element).parents('.form-group').removeClass('has-error');
        },
        submitHandler: function(form) {
          var formData = new FormData(form);
          $.ajax({
            url: '{!! route('question.store') !!}',
            type: form.method,
            data: $(form).serialize(),
            beforeSend: function() {
                //$('#preloader').show();
            },
            success: function(response) {
                $('#question-add-modal').modal('hide');
                // $("#role-add-modal").trigger('click');
                // $('#role-add-modal').modal('hide');
                $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
                questionTable.draw();
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
            async: false          
        }).done(function(data) {
            //submitButton.prop('disabled', false);
        });
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        }
      });
    });
  });
  //edit role
  $('#question-table tbody').on( 'click', 'tr td a.question-edit', function () {
    var questionId = $(this).data('questionid');

    $.get( '/admin/question/'+questionId+'/edit', function( data ) {
      $("#question-edit-modal").modal('show');
      $('#question-edit-modal .modal-body').html(data);
      $('#question-edit-form').validate({
        ignore: [],
        highlight:function(element) {
            $(element).parents('.form-group').addClass('has-error has-feedback');
        },
        unhighlight: function(element) {
            $(element).parents('.form-group').removeClass('has-error');
        },
        submitHandler: function(form) {
          var formData = new FormData(form);
          $.ajax({
            url: '/admin/question/'+questionId,
            type: 'PUT',
            data: $(form).serialize(),
            beforeSend: function() {
                //$('#preloader').show();
            },
            success: function(response) {
                $('#question-edit-modal').modal('hide');
                $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
                questionTable.draw();
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
            async: false          
        }).done(function(data) {
            //submitButton.prop('disabled', false);
        });
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        }
      });
    });
  });
  //delete role
  $('#question-table tbody').on( 'click', 'tr td a.question-delete', function () {
    var questionId = $(this).data('questionid');

    $.confirm({
      title: '{{trans('messages.warning_title')}}',
      content: '{{trans('messages.confirm_delete_content')}}',
      confirmButton: 'Тийм',
      cancelButton: 'Үгүй',
      type: 'red',
      typeAnimated: true,
      buttons: {
        tryAgain: {
            text: 'Устгах',
            btnClass: 'btn-red',
            action: function(){
              $.ajax({
                type: 'POST',
                url: '/admin/question/' + questionId,
                data: {_method: 'DELETE'},
                success: function (response) {
                  $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
                  questionTable.draw();
                },
                error: function (xhr, textStatus, error) {
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                },
                async: false
            });
            }
        },
        close: {
          text: 'Цуцлах',
          action: function(){

          }
        }
      }
    });
  });

  $('#question-search-form').on('submit', function(e) {
    questionTable.draw();
    e.preventDefault();
  });

</script>
@endsection
 
@push('js')

@endpush