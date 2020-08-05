@extends('layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1> SRS Masuk</h1>
    </div>
    <div class="container">
        <div class="card">
         <div class="card-header">
          <a href="{{route('srsmasuk.create')}}" class="btn btn-primary modal-show big-modal" title="Input SRS Masuk">+ Tambah</a>
          
        </div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered table-responsive" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Tanggal</th>
                            <th style="min-width:100px;">No Dokumen</th>
                            <th>Dept</th>
                            <th style="min-width:100px;">Workcenter</th>
                            <th style="min-width:100px;">Plant</th>
                            <th>Qty</th>
                            <th>Satuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div><!-- card -->
    </div><!-- row -->
</section>

@push('myjs')
    <script>
      var table =  $('#datatable').DataTable({
            "scrollX" : true,
            dom: 'Bfrtip',
            buttons: [
               { extend: 'copy', className: 'btn btn-primary',
            exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8]
            } },
               { extend: 'csv', className: 'btn btn-info',
             exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8]
            } },
               { extend: 'excel', className: 'btn btn-success',
             exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8]
            } },
               { extend: 'pdf', className: 'btn btn-danger',
             exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8]
            } },
               { extend: 'print', className: 'btn btn-warning',
             exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8]
            } }
            ],
            initComplete: function () {
                var btns = $('.dt-button');
                btns.removeClass('dt-button');
            },
            
            responsive : true,
            processing : true,
            serverSide : true,
            ajax : "{{route('table.srsmasuk')}}",
            columns: [
                {data : 'DT_RowIndex', name : 'id'},
                {data : 'bulan', name : 'bulan'},
                {data : 'tanggal_date', name: 'tanggal_date'},
                {data : 'no_dokumen', name: 'no_dokumen'},
                {data : 'rel_dept', name : 'rel_dept.deptiot'},
                {data : 'rel_workcenter', name : 'rel_workcenter.workcenter'},
                {data : 'rel_plant', name: 'rel_plant.plant'},
                {data : 'qty', name : 'qty'},
                {data : 'satuan', name : 'satuan'},
                {data : 'action'}
            ]
        });

       
    </script>
@endpush
@endsection