
<form action="{{$model->exists ? route('srskeluar.update',$model->id) : route('srskeluar.store') }}" method="post">
    
    {{ $model->exists ? method_field('PUT') : '' }} 
    @if($model->exists)
        <input type="hidden" name="mtd" value="put">
    @else
        <input type="hidden" name="mtd" value="post">
    @endif
    @csrf
    <div class="row">
        <div class="col-md-6">
             <div class="form-group">
                <label for="">Tanggal keluar</label>
                <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control" value="{{$model->exists ? $model->tanggal_keluar : '' }}">
            </div>
        
           <div class="form-group">
                <label for="">Tujuan</label>
                <select type="text" id="tujuan" name="tujuan" class="form-control select2">
                    <option value="" disabled selected>-- Pilih Tujuan --</option>
                    @foreach($tujuan as $t)
                        <option {{$model->exists && $model->tujuan == $t->id ? 'selected' : ''}} value="{{$t->id}}" >{{$t->tujuan_iot}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="">Jenis Transaksi</label>
                <select type="text" id="jenis_transaksi" name="jenis_transaksi" class="form-control select2">
                    <option value="" disabled selected>-- Pilih Jenis Transaksi --</option>
                    <option {{$model->exists && $model->jenis_transaksi == 'Dijual' ? 'selected' : ''}} >Dijual</option>
                    <option {{$model->exists && $model->jenis_transaksi == 'Internal' ? 'selected' : ''}} >Internal</option>
                    <option {{$model->exists && $model->jenis_transaksi == 'Oleh Pihak Ke - 3' ? 'selected' : ''}} >Oleh Pihak Ke - 3</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Kategori Pengurangan</label>
                <select type="text" id="kategori_pengurangan" name="kategori_pengurangan" class="form-control select2">
                    <option value="" disabled selected>-- Pilih Jenis Transaksi --</option>
                    <option {{$model->exists && $model->kategori_pengurangan == 'Reuse' ? 'selected' : ''}} >Reuse</option>
                    <option {{$model->exists && $model->kategori_pengurangan == 'Recycle' ? 'selected' : ''}} >Recycle</option>
                </select>
            </div>

             <div class="form-group">
                <label for="">No. Spr</label>
                <input type="text" id="no_spr" name="no_spr" value="{{$model->exists ? $model->no_spr : ''}}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            
            <div class="form-group ">
                <label for="">Qty</label>
                <input type="number" id="qty" name="qty" value="{{$model->exists ? $model->qty : ''}}" class="form-control">
            </div>
            <div class="form-group ">
                <label for="">Satuan </label>
                <select type="text" id="satuan" name="satuan" class="form-control select2">
                    <option value="" disabled selected>-- Pilih Satuan --</option>
                    <option  {{$model->exists && $model->satuan == 'Dus' ? 'selected' : ''}} >Dus</option>
                    <option  {{$model->exists && $model->satuan == 'Kg' ? 'selected' : ''}} >Kg</option>
                    <option  {{$model->exists && $model->satuan == 'Roll' ? 'selected' : ''}} >Roll</option>
                    <option  {{$model->exists && $model->satuan == 'Pcs' ? 'selected' : ''}} >Pcs</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Kategori</label>
                <select type="text" id="kategori" name="kategori" class="form-control select2">
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    <option {{$model->exists && $model->kategori == 'Kertas' ? 'selected' : ''}} >Kertas</option>
                    <option {{$model->exists && $model->kategori == 'Packaging' ? 'selected' : ''}} >Packaging</option>
                    <option {{$model->exists && $model->kategori == 'Plastik' ? 'selected' : ''}} >Plastik</option>
                    <option {{$model->exists && $model->kategori == 'Other' ? 'selected' : ''}} >Other</option>
                </select>
            </div>

            <div class="form-group ">
                <label for="">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" value="{{$model->exists ? $model->keterangan : ''}}" class="form-control">
            </div>

         </div>
    </div>
</form>

