<form action="{{$model->exists ? route('jenishasilsrs.update',$model->id) : route('jenishasilsrs.store') }}" method="post">
    
    {{ $model->exists ? method_field('PUT') : '' }} 
    @if($model->exists)
        <input type="hidden" name="mtd" value="put">
    @else
        <input type="hidden" name="mtd" value="post">
    @endif
    @csrf

    <div class="form-group">
        <label for="">Jenis Hasil SRS</label>
        <input type="text" name="jenis_hasil_srs" id="jenis_hasil_srs" value="{{$model->exists ? $model->jenis_hasil_srs : ''}}" class="form-control">
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
</form>