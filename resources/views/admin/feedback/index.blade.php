@extends('layout.layout')
 
@section('content')
<section class="admin_register_section">
  <h1 class="admin_register_title">{{trans('display.feedback_list')}}</h1>
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
        <form method="POST" id="feedback-search-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-4">
              <div style="padding:5px">
                <input type="text" id="feedback" name="feedback" placeholder="{{trans('display.feedback')}}">
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
    <button type="button" class="link-1" id="feedback-add" data-toggle="modal" data-target="#feedback-add-modal" style="border-color:white">{{trans('display.add_new')}}</button>
  </div>

  <table cellpadding="0" cellspacing="0" border="0" id="feedback-table">
    <thead class="tbl-header">
      <tr>
        <th style="width:30px">№</th>
        <th style="width:50%">{{trans('display.user_name')}}</th>
        <th style="width:50%">{{trans('display.email')}}</th>
        <th style="width:50%">{{trans('display.phone_number')}}</th>
        <th style="width:50%">{{trans('display.feedback')}}</th>
        <th style="width:120px">{{trans('display.manage')}}</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
  <div class="modal fade" id="feedback-add-modal" tabindex="-1" role="dialog" aria-labelledby="feedback-add-modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="feedback-add-modalLabel">{{trans('display.add_new')}}</h4>
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
  <div class="modal fade" id="feedback-edit-modal" tabindex="-1" role="dialog" aria-labelledby="feedback-edit-modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="feedback-edit-modalLabel">{{trans('display.edit')}}</h4>
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
  @csrf
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
  var feedbackTable = $('#feedback-table').DataTable( {
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
          url: '{!! route('feedback.datalist') !!}',
          dataType: "JSON",
          type: 'post',
          data: function ( d ) {
              var dateArr = {};
              $('#app-search-form input[name^="search_date"]').map(function(){ 
                  dateArr[this.id] = this.value;
              }).get();

              d.register_number = $('#app-search-form input[id="search_register_number"]').val();
              d.date = dateArr;
              d.feedback = $('#feedback-search-form input[id="feedback"]').val();
          }
      },
      columns: [
        { 
          data: null,
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        { data: 'user_name', "defaultContent": ''},
        { data: 'email', "defaultContent": ''},
        { data: 'phone_number', "defaultContent": ''},
        { data: 'feedback', "defaultContent": ''},
        { data: 'action', "defaultContent": ''},
      ],
      columnDefs: [
        {
            searchable: false,
            orderable: false,
            targets: [0,5]
        },{
            class: "text-center",
            targets: [0,5]
        },{
            targets: [0,3],
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
  $("#feedback-add").on('click', function(){
    $.get( '/admin/feedback/create', function( data ) {
      $('#feedback-add-modal .modal-body').html(data);
      $('#feedback-add-form').validate({
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
            url: '{!! route('feedback.store') !!}',
            type: form.method,
            data: $(form).serialize(),
            beforeSend: function() {
                //$('#preloader').show();
            },
            success: function(response) {
                $('#feedback-add-modal').modal('hide');
                // $("#role-add-modal").trigger('click');
                // $('#role-add-modal').modal('hide');
                $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
                feedbackTable.draw();
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
  $('#feedback-table tbody').on( 'click', 'tr td a.feedback-edit', function () {
    var feedbackId = $(this).data('feedbackid');

    $.get( '/admin/feedback/'+feedbackId+'/edit', function( data ) {
      $("#feedback-edit-modal").modal('show');
      $('#feedback-edit-modal .modal-body').html(data);
      $('#feedback-edit-form').validate({
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
            url: '/admin/feedback/'+feedbackId,
            type: 'PUT',
            data: $(form).serialize(),
            beforeSend: function() {
                //$('#preloader').show();
            },
            success: function(response) {
                $('#feedback-edit-modal').modal('hide');
                $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
                feedbackTable.draw();
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
  $('#feedback-table tbody').on( 'click', 'tr td a.feedback-delete', function () {
    var feedbackId = $(this).data('feedbackid');

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
                url: '/admin/feedback/' + feedbackId,
                data: {_method: 'DELETE'},
                success: function (response) {
                  $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
                  feedbackTable.draw();
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

  $('#feedback-search-form').on('submit', function(e) {
    feedbackTable.draw();
    e.preventDefault();
  });

</script>
@endsection
 
@push('js')

@endpush