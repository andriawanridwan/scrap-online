@extends('layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1> SRS Keluar</h1>
    </div>
    <div class="container">
        <div class="card">
         <div class="card-header">
          <a href="{{route('srskeluar.create')}}" class="btn btn-primary modal-show big-modal" title="Input SRS keluar">+ Tambah</a>
          
        </div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered table-responsive" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="min-width:100px;">Tanggal Keluar</th>
                            <th style="min-width:100px;">Tujuan</th>
                            <th style="min-width:100px;">Jenis Transaksi</th>
                            <th style="min-width:100px;">Kategori Pengurangan</th>
                            <th style="min-width:100px;">No Spr</th>
                            <th>Qty</th>
                            <th>Satuan</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
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
                columns: [0,1,2,3,4,5,6,7,8,9]
            } },
               { extend: 'csv', className: 'btn btn-info',
             exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8,9]
            } },
               { extend: 'excel', className: 'btn btn-success',
             exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8,9]
            } },
               { extend: 'pdf', className: 'btn btn-danger',
             exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8,9]
            } },
               { extend: 'print', className: 'btn btn-warning',
             exportOptions: {
                columns: [0,1,2,3,4,5,6,7,8,9]
            } }
            ],
            initComplete: function () {
                var btns = $('.dt-button');
                btns.removeClass('dt-button');
            },
            
            responsive : true,
            processing : true,
            serverSide : true,
            ajax : "{{route('table.srskeluar')}}",
            columns: [
                {data : 'DT_RowIndex', name : 'id'},
                {data : 'tanggal_keluar', name : 'tanggal_keluar'},
                {data : 'tujuan', name: 'rel_tujuan.tujuan_iot'},
                {data : 'jenis_transaksi', name: 'jenis_transaksi'},
                {data : 'kategori_pengurangan', name : 'kategori_pengurangan'},
                {data : 'no_spr',name : 'no_spr'},
                {data : 'qty', name : 'qty'},
                {data : 'satuan', name : 'satuan'},
                {data : 'kategori', name : 'kategori'},
                {data : 'keterangan', name : 'keterangan'},
                {data : 'action'}
            ]
        });

       
    </script>
@endpush
@endsection