
<form action="{{$model->exists ? route('iotselesai.update',$model->id) : route('iotselesai.store') }}" method="post">
    
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
                <label for="">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" value="{{$model->exists ? $model->tanggal_selesai : '' }}">
            </div>
        
            <div class="form-group">
                <label for="">No Rbap</label>
                <input type="text" id="no_rbap" name="no_rbap" value="{{$model->exists ? $model->no_rbap : ''}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Tanggal Rbap</label>
                <input type="date" name="tanggal_rbap" id="tanggal_rbap" class="form-control" value="{{$model->exists ? $model->tanggal_rbap : '' }}">
            </div>

            <div class="form-group">
                <label for="">Produk Kemasan</label>
                <select type="text" id="produk_kemasan" name="produk_kemasan" class="form-control select2">
                    <option value="" disabled selected>-- Pilih Produk Kemasan --</option>
                    <option {{$model->exists && $model->produk_kemasan == 'Kemasan IOT' ? 'selected' : ''}} >Kemasan IOT</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
             <div class="form-group">
                <label for="">Jenis Hasil</label>
                <select type="text" id="jenis_hasil" name="jenis_hasil" class="form-control select2">
                    <option value="" disabled selected>-- Pilih Jenis Hasil --</option>
                    @foreach($jenishasil as $w)
                        <option {{$model->exists && $model->jenis_hasil == $w->id ? 'selected' : ''}} value="{{$w->id}}">{{$w->jenis_hasil_iot}}</option>
                    @endforeach
                </select>
            </div>
            
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
         </div>
    </div>
</form>

