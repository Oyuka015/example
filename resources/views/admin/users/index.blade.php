@extends('layout.layout')
 
@section('content')
<section style="min-height:100vh; ">
  <h1 class="admin_register_title">{{trans('display.user_information')}}</h1>
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
        <form method="POST" id="users-search-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
          <div class="row">
          <div class="col-md-4">
              <div style="padding:5px">
                <input type="text" id="username" name="username" placeholder="{{trans('display.username')}}">
              </div>
            </div>
            <div class="col-md-4">
              <div style="padding:5px">
                <input type="text" id="firstname" name="firstname" placeholder="{{trans('display.firstname')}}">
              </div>
            </div>
            <div class="col-md-4">
              <div style="padding:5px">
                <input type="text" id="lastname" name="lastname" placeholder="{{trans('display.lastname')}}">
              </div>
              <div style="padding:5px">
                <button type="submit" class="btn btn-primary" style="float:right">{{trans('display.search')}}</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- collapse end -->
  <div style="margin-bottom: 10px">
   <button type="button" class="link-1" id="users-add" data-toggle="modal" data-target="#users-add-modal" style="border-color:white">{{trans('display.add_new')}}</button>
  </div>
 
  
  <table  cellpadding="0" cellspacing="0" border="0" id="users-table">
    <thead class="tbl-header">
      <tr>
        <th style="width:30px">№</th>
        <th style="width:10%">{{trans('display.username')}}</th>
        <!-- <th style="width:10%">{{trans('display.citizenship')}}</th> -->
        <!-- <th style="width:10%">{{trans('display.family_name')}}</th> -->
        <th style="width:10%">{{trans('display.firstname')}}</th>
        <th style="width:10%">{{trans('display.lastname')}}</th>
        <th style="width:10%">{{trans('display.register')}}</th>
        <!-- <th style="width:10%">{{trans('display.age')}}</th> -->
        <!-- <th style="width:10%">{{trans('display.gender')}}</th> -->
        <!-- <th style="width:10%">{{trans('display.work_status')}}</th> -->
        <th style="width:10%">{{trans('display.email')}}</th>
        <th style="width:10%">{{trans('display.phone')}}</th>
        <!-- <th style="width:10%">{{trans('display.special_person')}}</th>
        <th style="width:10%">{{trans('display.special_phone')}}</th>
        <th style="width:10%">{{trans('display.province_capital')}}</th>
        <th style="width:10%">{{trans('display.district')}}</th> -->
        <th style="width:10%">{{trans('display.education_degree')}}</th>
        <th style="width:10%">{{trans('display.school_name')}}</th>
        <!-- <th style="width:10%">{{trans('display.home_address')}}</th> -->
        <th style="width:120px">{{trans('display.manage')}}</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>

  <div style=" width:100%; height:10px; margin:50px 0;">

  </div>

  <div class="modal fade" id="users-add-modal" tabindex="-1" role="dialog" aria-labelledby="users-add-modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="users-add-modalLabel">{{trans('display.add_new')}}</h4>
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
  <div class="modal fade" id="users-edit-modal" tabindex="-1" role="dialog" aria-labelledby="users-edit-modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="users-edit-modalLabel">{{trans('display.edit')}}</h4>
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
  var usersTable = $('#users-table').DataTable( {
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
          url: '{!! route('users.datalist') !!}',
          dataType: "JSON",
          type: 'post',
          data: function ( d ) {

              d.register_number = $('#app-search-form input[id="search_register_number"]').val();
              d.username = $('#users-search-form input[id="username"]').val();
              d.surname = $('#users-search-form input[id="surname"]').val();
              d.lastname = $('#users-search-form input[id="lastname"]').val();
          }
      },
      columns: [
        { 
          data: null,
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        { data: 'username', "defaultContent": ''},
        // { data: 'citizenship', "defaultContent": ''},
        // { data: 'family_name', "defaultContent": ''},
        { data: 'firstname', "defaultContent": ''},
        { data: 'lastname', "defaultContent": ''},
        { data: 'register', "defaultContent": ''},
        // { data: 'age', "defaultContent": ''},
        // { data: 'gender', "defaultContent": ''},
        // { data: 'work_status', "defaultContent": ''},
        { data: 'email', "defaultContent": ''},
        { data: 'phone', "defaultContent": ''},
        // { data: 'special_person', "defaultContent": ''},
        // { data: 'special_phone', "defaultContent": ''},
        // { data: 'province_capital', "defaultContent": ''},
        // { data: 'district', "defaultContent": ''},
        { data: 'school_name', "defaultContent": ''},
        { data: 'education_degree', "defaultContent": ''},
        // { data: 'home_address', "defaultContent": ''},
        { data: 'action', "defaultContent": ''},
      ],
      columnDefs: [
          {
            searchable: false,
            orderable: false,
            targets: [0,9]
        },{
            class: "text-center",
            targets: [0,9]
        },{
            targets: [0,8],
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
  $("#users-add").on('click', function(){
    $.get( '/admin/users/create', function( data ) {
      $('#users-add-modal .modal-body').html(data);
      $('#users-add-form').validate({
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
            url: '{!! route('users.store') !!}',
            type: form.method,
            data: $(form).serialize(),
            beforeSend: function() {
                //$('#preloader').show();
            },
            success: function(response) {
                $('#users-add-modal').modal('hide');
                // $("#role-add-modal").trigger('click');
                // $('#role-add-modal').modal('hide');
                $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
                usersTable.draw();
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
  $('#users-table tbody').on( 'click', 'tr td a.users-edit', function () {
    var usersId = $(this).data('usersid');

    $.get( '/admin/users/'+usersId+'/edit', function( data ) {
      $("#users-edit-modal").modal('show');
      $('#users-edit-modal .modal-body').html(data);
      $('#users-edit-form').validate({
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
            url: '/admin/users/'+usersId,
            type: 'PUT',
            data: $(form).serialize(),
            beforeSend: function() {
                //$('#preloader').show();
            },
            success: function(response) {
                $('#users-edit-modal').modal('hide');
                $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
                usersTable.draw();
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
  $('#users-table tbody').on( 'click', 'tr td a.users-delete', function () {
    var usersId = $(this).data('usersid');
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
                url: '/admin/users/' + usersId,
                data: {_method: 'DELETE'},
                success: function (response) {
                  $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
                  usersTable.draw();
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
  $('#users-school-table tbody').on( 'click', 'tr td a.users-delete', function () {
    var usersId = $(this).data('usersid');
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
                url: '/admin/users/' + usersId,
                data: {_method: 'DELETE'},
                success: function (response) {
                  $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
                  usersTable.draw();
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

  // search
  $('#users-search-form').on('submit', function(e) {
    usersTable.draw();
    e.preventDefault();
  });


</script>
@endsection
 
@push('js')

@endpush