@extends('layout.layout')
 
@section('content')
<section class="admin_register_section">
  <h1 class="admin_register_title">{{trans('display.online_course_group_register')}}</h1>
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
  <table cellpadding="0" cellspacing="0" border="0" id="online-group-table">
    <thead class="tbl-header">
      <tr>
        <th style="width:30px">№</th>
        <th style="width:15px%">{{trans('display.lesson_group')}}</th>
        <th style="width:15px%">{{trans('display.group_post')}}</th>
        <th style="width:15px%">{{trans('display.posted_date')}}</th>
        <th style="width:120px">{{trans('display.manage')}}</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <div class="modal fade" id="online-edit-modal" tabindex="-1" role="dialog" aria-labelledby="online-edit-modalLabel" aria-hidden="true">
    <div style=" width:400px" class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="online-edit-modalLabel">{{trans('display.edit')}}</h4>
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
  var uploadedVideo = [];
  var uploadedFile = [];
  var uploadedVideoEdit = [];
  var uploadedFileEdit = [];
  var onlineTable = $('#online-group-table').DataTable( {
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
          url: '{!! route('online.group.datalist') !!}',
          dataType: "JSON",
          type: 'post',
          data: function ( d ) {
              // d.register_number = $('#app-search-form input[id="search_register_number"]').val();
              // d.lesson_name = $('#online-search-form input[id="lesson_name"]').val();
          }
      },
      columns: [
        { 
          data: null,
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        { data: 'name', "defaultContent": ''},
        { data: 'created_by', "defaultContent": ''},
        { data: 'created_at', "defaultContent": ''},
        { data: 'action', "defaultContent": ''},
      ],
      columnDefs: [
        {
            searchable: false,
            orderable: false,
            targets: [0,4]
        },{
            class: "text-center",
            targets: [0,4]
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
  //edit role
  $('#online-group-table tbody').on( 'click', 'tr td a.online-edit', function () {
    var onlineId = $(this).data('onlineid');
  
    $.get( '/admin/online/group/'+onlineId+'/edit', function( data ) {
      $("#online-edit-modal").modal('show');
      $('#online-edit-modal .modal-body').html(data);
      $('#online-edit-form').validate({
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
            url: '/admin/online/group/update/data/' + onlineId,
            type: 'POST',
            data: formData,
            beforeSend: function() {
                //$('#preloader').show();
            },
            success: function(response) {
              $('#online-edit-modal').modal('hide');
              $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
              onlineTable.draw();
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
            async: false,
            cache: false,
            contentType: false,
            processData: false         
          }).done(function(data) {
          });
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        }
      });
    });
  });
  //delete role
  $('#online-group-table tbody').on( 'click', 'tr td a.online-delete', function () {
    var onlineId = $(this).data('onlineid');

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
                url: '/admin/online/group/' + onlineId+ '/delete',
                data: {_method: 'DELETE'},
                success: function (response) {
                  $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
                  onlineTable.draw();
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

  $('#online-search-form').on('submit', function(e) {
    onlineTable.draw();
    e.preventDefault();
  });
</script>
@endsection
 
@push('js')

@endpush