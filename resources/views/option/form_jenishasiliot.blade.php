<form action="{{$model->exists ? route('jenishasiliot.update',$model->id) : route('jenishasiliot.store') }}" method="post">
    
    {{ $model->exists ? method_field('PUT') : '' }} 
    @if($model->exists)
        <input type="hidden" name="mtd" value="put">
    @else
        <input type="hidden" name="mtd" value="post">
    @endif
    @csrf

    <div class="form-group">
        <label for="">Jenis Hasil</label>
        <input type="text" name="jenis_hasil_iot" id="jenis_hasil_iot" value="{{$model->exists ? $model->jenis_hasil_iot : ''}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Harga</label>
        <input type="text" name="harga" id="harga" value="{{$model->exists ? $model->harga : ''}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="">satuan</label>
        <select name="satuan" id="satuan" class="form-control">
            <option value="" disabled selected>-- Pilih Satuan --</option>
            <option {{ $model->exists && $model->satuan == 'Dus' ? 'selected' : '' }} >Dus</option>
            <option {{ $model->exists && $model->satuan == 'Kg' ? 'selected' : '' }} >Kg</option>
            <option {{ $model->exists && $model->satuan == 'Roll' ? 'selected' : '' }} >Roll</option>
            <option {{ $model->exists && $model->satuan == 'Pcs' ? 'selected' : '' }} >Pcs</option>
        </select>
    </div>
     <div class="form-group">
        <label for="">Qty</label>
        <input type="qty" name="qty" id="qty" value="{{$model->exists ? $model->qty : ''}}" class="form-control">
    </div>
</form>