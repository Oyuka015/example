@extends('ulayout.ulayout')
 
@section('content')
<style>
    .lil-content::before{
        background-image: url('https://img.freepik.com/free-photo/closeup-view-handshake-two-businessmen-suits-shaking-hands_1163-4891.jpg?size=626&ext=jpg&ga=GA1.2.821502220.1669877714&semt=sph');
    }
</style>
<div class="lil-header-section">
    <div class="lil-content">
        <h1>Гэрчилгээ хайлт</h1>
    </div>
</div>
<div class="certi">
    <div class="certi-con">
        <form action="" method="POST"  class="certi-search" id="certificate-search-form">
            <p class="title">Гэрчилгээ баталгаажуулалт</p>
            <p class="des">Манайхаас өгсөн гэрчилгээний дугаараар хайлт хийнэ үү?</p>
            <input id="certificate_id" name="certificate_id" type="search" placeholder="Гэрчилгээний дугаар оруулна уу?" required/>
            <button id="cert-search-button" type="submit">Хайлт хийх</button>
        </form>
    </div>
</div>

<table style="display:none; max-width:1400px; margin:auto;" cellpadding="0" cellspacing="0" border="0" id="certificate-table">
    <thead class="tbl-header">
      <tr>
        <th style="width:30px">№</th>
        <th style="width:25%">{{trans('display.username')}}</th>
        <th style="width:25%">{{trans('display.certificate_id')}}</th>
        <!-- <th style="width:10%">{{trans('display.register')}}</th> -->
        <th style="width:25%">{{trans('display.registered_date')}}</th>
        <!-- <th style="width:10%">{{trans('display.registered_user')}}</th> -->
        <!-- <th style="width:10%">{{trans('display.lastname')}}</th> -->
        <!-- <th style="width:10%">{{trans('display.surname')}}</th> -->
        <th style="width:25%">{{trans('display.valid_for')}}</th>
        <!-- <th style="width:10%">{{trans('display.signature')}}</th> -->
        <!-- <th style="width:120px">{{trans('display.manage')}}</th> -->
      </tr>
    </thead>
    <tbody>

    </tbody>
</table>



<script type="text/javascript" charset="utf8" src="/js/datatables.min.js"></script>
<script type="text/javascript" charset="utf8" src="/js/dataTables.buttons.min.js"></script>
<script>
    document.getElementById('cert-search-button').click();
    var certificateTable = $('#certificate-table').DataTable( {
    // searching: false,
    paging: false,
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
        url: '{!! route('certificate.datalist') !!}',
        dataType: "JSON",
        type: 'post',
        data: function ( d ) {
            var dateArr = {};
            $('#app-search-form input[name^="search_date"]').map(function(){ 
                dateArr[this.id] = this.value;
            }).get();

            d.register_number = $('#app-search-form input[id="search_register_number"]').val();
            d.date = dateArr;
            d.certificate_id = $('#certificate-search-form input[id="certificate_id"]').val();
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
        { data: 'certificate_id', "defaultContent": ''},
        // { data: 'register', "defaultContent": ''},
        { data: 'registered_date', "defaultContent": ''},
        // { data: 'registered_user', "defaultContent": ''},
        // { data: 'lastname', "defaultContent": ''},
        // { data: 'surname', "defaultContent": ''},
        { data: 'valid_for', "defaultContent": ''},
        // { data: 'signature', "defaultContent": ''},
        // { data: 'action', "defaultContent": ''},
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
        "info":           "",
        "infoEmpty":      "{{trans('messages.table_showing_empty')}}",
        "infoFiltered":   "",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Show _MENU_ entries",
        "loadingRecords": "Loading...",
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
    $('#certificate-search-form').on('submit', function(e) {
        document.getElementById("certificate-table").style.display = "block";
        certificateTable.draw();
        e.preventDefault();
    });
</script>
@endsection
 
@push('js')

@endpush