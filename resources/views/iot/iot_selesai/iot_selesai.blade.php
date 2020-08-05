@extends('layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1> IOT Selesai</h1>
    </div>
    <div class="container">
        <div class="card">
         <div class="card-header">
          <a href="{{route('iotselesai.create')}}" class="btn btn-primary modal-show big-modal" title="Input Iot Masuk">+ Tambah</a>
          
        </div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered table-responsive" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="min-width:100px;">Tanggal Selesai</th>
                            <th style="min-width:100px;">No Rbap</th>
                            <th style="min-width:100px;">Tanggal Rbap</th>
                            <th>Produk Kemasan</th>
                            <th style="min-width:100px;">Jenis Hasil</th>
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
                columns: [0,1,2,3,4,5,6,7]
            } },
               { extend: 'csv', className: 'btn btn-info',
             exportOptions: {
                columns: [0,1,2,3,4,5,6,7]
            } },
               { extend: 'excel', className: 'btn btn-success',
             exportOptions: {
                columns: [0,1,2,3,4,5,6,7]
            } },
               { extend: 'pdf', className: 'btn btn-danger',
             exportOptions: {
                columns: [0,1,2,3,4,5,6,7]
            } },
               { extend: 'print', className: 'btn btn-warning',
             exportOptions: {
                columns: [0,1,2,3,4,5,6,7]
            } }
            ],
            initComplete: function () {
                var btns = $('.dt-button');
                btns.removeClass('dt-button');
            },
            
            responsive : true,
            processing : true,
            serverSide : true,
            ajax : "{{route('table.iotselesai')}}",
            columns: [
                {data : 'DT_RowIndex', name : 'id'},
                {data : 'tanggal_selesai', name : 'tanggal_selesai'},
                {data : 'no_rbap', name: 'no_rbap'},
                {data : 'tanggal_rbap', name: 'tanggal_rbap'},
                {data : 'produk_kemasan', name : 'produk_kemasan'},
                {data : 'rel_jenishasil', name : 'jenishasil.jenis_hasil_iot'},
                {data : 'qty', name : 'qty'},
                {data : 'satuan', name : 'satuan'},
                {data : 'action'}
            ]
        });

       
    </script>
@endpush
@endsection