@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1> Workcenter</h1>
    </div>
    <div class="container">
        <div class="card">
         <div class="card-header">
          <a href="{{route('workcenter.create')}}" class="btn btn-primary modal-show" title="Input workcenter">+ Tambah</a>
          
        </div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered table-responsive float-center" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="min-width:90%" class="text-center">Workcenter</th>
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
                columns: [0,1]
            } },
               { extend: 'csv', className: 'btn btn-info',
             exportOptions: {
                columns: [0,1]
            } },
               { extend: 'excel', className: 'btn btn-success',
             exportOptions: {
                columns: [0,1]
            } },
               { extend: 'pdf', className: 'btn btn-danger',
             exportOptions: {
                columns: [0,1]
            } },
               { extend: 'print', className: 'btn btn-warning',
             exportOptions: {
                columns: [0,1]
            } }
            ],
            initComplete: function () {
                var btns = $('.dt-button');
                btns.removeClass('dt-button');
            },
            
            responsive : true,
            processing : true,
            serverSide : true,
            ajax : "{{route('table.workcenter')}}",
            columns: [
                {data : 'DT_RowIndex', name : 'id'},
                {data : 'workcenter', name : 'workcenter'},
                {data : 'action'}
            ]
        });

       
    </script>
@endpush
@endsection