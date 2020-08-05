<table id="caribarang" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Barang</th>
            <th>Harga</th>
            <th>Satuan</th>
            <th>Qty</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barang as $b)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td class="text-left"><a href="javascript:void(0);" onclick="cari( {{$b->id}} )">{{$b->jenis_hasil_iot}}</a></td>
            <td class="text-left">Rp. {{number_format($b->harga,2,",",".") }}</td>
            <td>{{$b->satuan}}</td>
            <td id="qty">{{$b->qty}}</td>
        </tr>
        @endforeach
    </tbody>

</table>
<script>
    $('#caribarang').DataTable();
</script>