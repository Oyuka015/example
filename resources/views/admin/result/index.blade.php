@extends('layout.layout')
 
@section('content')
<section class="admin_register_section">
  <h1 class="admin_register_title">{{trans('display.exam_takers')}}</h1>
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
        <form method="POST" id="result-search-form" class="form-horizontal form-bordered smart-form" action="javascript:;" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-4">
              <div style="padding:5px">
                <input type="text" id="user_id" name="user_id" placeholder="{{trans('display.user_name')}}">
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
  

  <table cellpadding="0" cellspacing="0" border="0" id="result-table">
    <thead class="tbl-header">
      <tr>
        <th style="width:30px">№</th>
        <th style="width:30%">{{trans('display.user_name')}}</th>
        @foreach($exams as $exam)
        <th style="width:30%">{{$exam->name}}</th>
        @endforeach
        <th style="width:120px">{{trans('display.manage')}}</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
  @csrf
</section>


<script>
  var resultTable = $('#result-table').DataTable( {
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
          url: '{!! route('result.datalist') !!}',
          dataType: "JSON",
          type: 'post',
          data: function ( d ) {
              var dateArr = {};
              $('#app-search-form input[name^="search_date"]').map(function(){ 
                  dateArr[this.id] = this.value;
              }).get();

              d.register_number = $('#app-search-form input[id="search_register_number"]').val();
              d.date = dateArr;
              // d.question = $('#examtakers-search-form input[id="question"]').val();
              d.user_id = $('#result-search-form input[id="user_id"]').val();
          }
      },
      columns: [
        { 
          data: null,
          render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        // { data: 'question', "defaultContent": ''},
        // { data: 'answer', "defaultContent": ''},
        { data: 'user_name', "defaultContent": ''},
        { data: 'exam_1', "defaultContent": ''},
        { data: 'exam_2', "defaultContent": ''},
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
  //delete role
  $('#result-table tbody').on( 'click', 'tr td a.result-delete', function () {
    var resultId = $(this).data('resultid');

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
                url: '/admin/result/' + resultId,
                data: {_method: 'DELETE'},
                success: function (response) {
                  $('.form-sub-heading').html(response).fadeIn().delay(5000).fadeOut();
                  resultTable.draw();
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

  $('#result-search-form').on('submit', function(e) {
    resultTable.draw();
    e.preventDefault();
  });

</script>
@endsection
 
@push('js')

@endpush