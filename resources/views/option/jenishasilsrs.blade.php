@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1> Jenis Hasil SRS</h1>
    </div>
    <div class="container">
        <div class="card">
         <div class="card-header">
          <a href="{{route('jenishasilsrs.create')}}" class="btn btn-primary modal-show" title="Input Jenis Hasil SRS">+ Tambah</a>
          
        </div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered table-responsive float-center" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="min-width:50%" class="text-center">Jenis Hasil SRS</th>
                            <th style="min-width:30%">Harga</th>
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
                columns: [0,1,2,3]
            } },
               { extend: 'csv', className: 'btn btn-info',
             exportOptions: {
                columns: [0,1,2,3]
            } },
               { extend: 'excel', className: 'btn btn-success',
             exportOptions: {
                columns: [0,1,2,3]
            } },
               { extend: 'pdf', className: 'btn btn-danger',
             exportOptions: {
                columns: [0,1,2,3]
            } },
               { extend: 'print', className: 'btn btn-warning',
             exportOptions: {
                columns: [0,1,2,3]
            } }
            ],
            initComplete: function () {
                var btns = $('.dt-button');
                btns.removeClass('dt-button');
            },
            
            responsive : true,
            processing : true,
            serverSide : true,
            ajax : "{{route('table.jenis_hasil_srs')}}",
            columns: [
                {data : 'DT_RowIndex', name : 'id'},
                {data : 'jenis_hasil_srs', name : 'jenis_hasil_srs'},
                {data : 'harga', name: 'harga'},
                {data : 'satuan', name : 'satuan'},
                {data : 'action'}
            ]
        }).columns.adjust();

       
    </script>
@endpush
@endsection