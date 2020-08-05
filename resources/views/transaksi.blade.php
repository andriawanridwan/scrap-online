@extends('layouts.master')

@section('content')
<section class="section" >
    <div class="section-header">
        <h1> Dashboard</h1>
    </div>
    <form action="">
    <div class="row">
        
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">Info Transaksi</h5>
                </div>
                <div class="card-body">
                
                     <div class="form-group">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for=>Kode Transaksi</label>
                                <input type="text" name="kode_transaksi" class="form-control" value="{{$kode}}" readonly required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" readonly required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">No Spr</label>
                        <input type="text" name="no_spr" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">Info Customer</h5>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Pembeli</label>
                        <input type="text" name="pembeli" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Penerima</label>
                        <input type="text" name="penerima" class="form-control" required>
                    </div>
                </div>
            </div>
        </div> 
    </div>

        <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Barang</h5>
                    </div>
                    <div class="card-body">
                         <a href="{{ route('caribarang') }}" class="modal-show big-modal btn btn-primary caribarang" title="Cari Barang">Cari Barang</a>
                        <br> <br>
                         <table id="keranjang" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Harga</th>
                                <th>Satuan</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th width="5%"><i class="fa fa-cog"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-primary">
                                <tr>
                                    <th colspan="5" class="text-right text-white">Total Harga</th>
                                    <th colspan="2" id="total" class="text-right text-white">Rp. 0</th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right text-white">Bayar</th>
                                    <th colspan="2" width="20%">
                                            <input type="text" name="bayar" class="form-control" id="bayar" required >
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right text-white">Kembali</th>
                                    <th colspan="2" id="kembali" class="text-right text-white">Rp. 0</th>
                                </tr>
                            </tfoot>
                         </table>
                         <!-- <div class="card">
                            <div class="card-body bg-primary">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2 class="text-white float-right">TOTAL </h2>
                                    </div>
                                    <div class="text-white float-right">
                                    <H2>0,00</H2>
                                    </div>
                                </div>
                            </div>
                         </div> -->
                    </div>
                </div>

                <button id="selesai" type="button" class="btn btn-primary float-right">Selesai</button>
      </form>  
    
</section>

@push('jsku')
    <script>

        $(document).ready(function(){
           
            loadtable();
            
            $('#bayar').keyup(() => {
                var test = $('#bayar').val();
               $('#bayar').val(rupiah($('#bayar').val(), 'Rp. '));
               var bayar = $('#bayar').val().toString().split('Rp. ');
               var angka = bayar[1].toString().split('.');
               var hitung = angka.length;
               var a = 0;
               var fbayar = '';
               for(var i=0; i < hitung;i++){
                   fbayar += angka[a];
                   a++;
               }
               
               var total = $('#total').html().toString().split('Rp. ');
               
               var angka2 = total[1].toString().split('.');
               var hitung2 = angka2.length;
               var b = 0;
               var ftotal = '';
               for(var i=0;i <hitung2;i++){
                   ftotal += angka2[b];
                   b++;
               }
               var kembali = parseInt(fbayar) - parseInt(ftotal);
               var fkembali;
               var cek = $('#bayar').val();
               if(kembali < 0){
                fkembali = '- ' + rupiah(kembali,'Rp.');
               }else if(test == 'Rp.'){
                fkembali = 'Rp. 0';
               }else{
                fkembali = rupiah(kembali,'Rp.');
               }
               $('#kembali').html(fkembali);

            });


            $('#selesai').click(function(){
                $(document).ajaxStart(function () {
                    $('#spanner').show();
                });
                $(document).ajaxStop(function () {
                    $('#spanner').hide();
                    Swal.fire({
                     icon: 'success',
                    title: 'Sukses',
                    text: 'Transaksi Berhasil!',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton : false,
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                    
                });
                 

                var id = $('form').serialize();
                $.ajax({
                    url : " {{ route('keranjang.selesai') }} ",
                    method : 'post',
                    data : id,
                    success:function(data){
                        /* $('form').trigger('reset');
                        loadtable();
                        $('#total').html('Rp. 0');
                        $('#kembali').html('Rp. 0'); */
                    
                        
                        $("html, body").animate({ scrollTop: 0 }, "fast");
                        
                        
                    }
                });
            });
        });
        

        function cari(id){
            $.ajax({
                url : " {{ route('keranjang.store') }} ",
                method : 'post',
                data : {id : id},
                success :function(data){
                    if(data.status == 'error'){
                        swal.fire({
                            title : data.message,
                            icon : 'warning',
                            text : 'Harap Mengisi Stok Terlebih Dahulu'
                        })
                    }else{
                        loadtable();
                        $('#myModal').modal('hide');
                    }
                }
            });
        }

        function hapus(id){
            $.ajax({
                url : " {{ route('keranjang.hapus') }} ",
                method : 'post',
                data : {id : id, },
                success:function(data){
                    loadtable();
                    $('#kembali').html('Rp. 0');
                    $('#bayar').val('');
                }
            });
        }

       

        $(document).on('keyup mouseup', '#qty',function(e){
            e.preventDefault();
            var row = $('table#keranjang tbody tr').length;
            var barang = $(this).parent().parent().find('td:nth-child(2)').html();
            var harga = $(this).parent().parent().find('td:nth-child(3)').html().toString().split('Rp. ');
            var id = $(this).val();
            var element = this;
             $.ajax({
                url : " {{ route('keranjang.cekqty') }} ",
                method : 'post',
                data : {barang : barang,qty : id},
                success:function(data){
                    if(data.status == 'Gagal'){
                        
                        swal.fire({
                            title : 'Stok Hanya Tersedia '+ data.message,
                            icon : 'warning',
                            text : 'Harap Mengisi Stok Terlebih Dahulu'
                        });
                        $(element).val(data.message);
                        id = data.message;
                         $.ajax({
                            url : " {{ route('updateqty') }} ",
                            method : 'post',
                            data : {barang : barang,qty : id}
                            
                        });
                        var jum = harga[1].replace('.','') * id;
                        $(element).parent().parent().find('td:nth-child(6)').html(rupiah(jum,'Rp. '));

                    }else{
                        $.ajax({
                            url : " {{ route('updateqty') }} ",
                            method : 'post',
                            data : {barang : barang,qty : id}
                            
                        });
                    }
                }
            });
            
           
            var total = 0;
            var harga = $(this).parent().parent().find('td:nth-child(3)').html().toString().split('Rp. ');
            var sub = harga[1].replace('.','')*id;
            $(this).parent().parent().find('td:nth-child(6)').html(rupiah(sub,'Rp. '));
            
            var t = 0;
            $('table#keranjang > tbody > tr').each(function(){
                    var id = $(this).find('td:nth-child(6)').html().toString().split('Rp. ');;
                    t = t + parseInt(id[1].replace('.',''));             
            });
            var tot = rupiah(t,"Rp. ");
             $('table#keranjang tfoot tr:nth-child(1)').find('th:nth-child(2)').html(tot);

        });

      

        function rupiah(angka, prefix){
            var number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
            split   		= number_string.split(','),
            sisa     		= split[0].length % 3,
            rupiah     		= split[0].substr(0, sisa),
            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
        
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        

        function loadtable(){
            $('table#keranjang tbody > tr').remove();
            var html = '';
            var no = 0;
            var total = 0;
            $.ajax({
                url : " {{ route('keranjang.index') }} ",
                success:function(data){
                    $.each(data, function(index,item){
                        no++;
                        html += '<tr>';
                            html += '<td>' + no + '</td>';
                            html += '<td>' + item.barang + '</td>';
                            html += '<td>' + rupiah(item.harga,'Rp. ') + '</td>';
                            html += '<td>' + item.satuan + '</td>';
                            html += '<td width="12%"><input type="number" min="1"  id="qty" value="'+item.qty+'" class="form-control"></td>';
                            html += '<td>' + rupiah(item.qty*item.harga,'Rp. ') + '</td>';
                            html += '<td width="5%"><a href="javascript:void(0)" onclick="hapus('+item.id+')" class="btn btn-danger btn-sm">X</a></td>';
                        html += '</tr>';
                        total = total + parseInt(item.harga);
                    });
                    var tot = rupiah(total,"Rp. ");
                    $('table#keranjang tbody').html(html);
                    $('table#keranjang tfoot tr:nth-child(1)').find('th:nth-child(2)').html(tot);
                }
            })
        };

       

        

       
    </script>
@endpush
@endsection