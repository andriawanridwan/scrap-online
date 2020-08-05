
<form action="{{$model->exists ? route('srsmasuk.update',$model->id) : route('srsmasuk.store') }}" method="post">
    
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
                <label for="">Bulan</label>
                <select name="bulan" id="bulan" class="form-control select2">
                    <option value="" disabled selected>-- Pilih Bulan --</option>
                    <option {{ $model->exists && $model->bulan == 'Januari' ? 'selected' : '' }} >Januari</option>
                    <option {{ $model->exists && $model->bulan == 'Februari' ? 'selected' : '' }}>Februari</option>
                    <option {{ $model->exists && $model->bulan == 'Maret' ? 'selected' : '' }}>Maret</option>
                    <option {{ $model->exists && $model->bulan == 'April' ? 'selected' : '' }}>April</option>
                    <option {{ $model->exists && $model->bulan == 'Mei' ? 'selected' : '' }}>Mei</option>
                    <option {{ $model->exists && $model->bulan == 'Juni' ? 'selected' : '' }}>Juni</option>
                    <option {{ $model->exists && $model->bulan == 'Juli' ? 'selected' : '' }}>Juli</option>
                    <option {{ $model->exists && $model->bulan == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                    <option {{ $model->exists && $model->bulan == 'September' ? 'selected' : '' }}>September</option>
                    <option {{ $model->exists && $model->bulan == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                    <option {{ $model->exists && $model->bulan == 'November' ? 'selected' : '' }}>November</option>
                    <option {{ $model->exists && $model->bulan == 'Desember' ? 'selected' : '' }}>Desember</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tgl Datang</label>
                <input type="date" id="tanggal_date" name="tanggal_date" value="{{$model->exists ? $model->tanggal_date : ''}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">No Dokumen</label>
                <input type="text" id="no_dokumen" name="no_dokumen" value="{{$model->exists ? $model->no_dokumen : ''}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Dept</label>
                <select type="text" id="dept" name="dept" class="form-control select2">
                    <option value="" disabled selected>-- Pilih Departemen --</option>
                    @foreach($deptiot as $d)
                        <option {{$model->exists && $model->dept == $d->id ? 'selected' : ''}} value="{{$d->id}}">{{$d->deptiot}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
             <div class="form-group">
                <label for="">Workcenter</label>
                <select type="text" id="workcenter" name="workcenter" class="form-control select2">
                    <option value="" disabled selected>-- Pilih Workcenter --</option>
                    @foreach($workcenter as $w)
                        <option {{$model->exists && $model->workcenter == $w->id ? 'selected' : ''}} value="{{$w->id}}">{{$w->workcenter}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Plant</label>
                <select type="text" id="plant" name="plant" class="form-control select2">
                    <option value="" disabled selected>-- Pilih Plant --</option>
                    @foreach($plant as $p)
                        <option {{$model->exists && $model->plant == $p->id ? 'selected' : ''}} value="{{$p->id}}">{{$p->plant}}</option>
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

