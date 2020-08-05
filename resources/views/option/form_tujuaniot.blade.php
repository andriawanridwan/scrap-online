<form action="{{$model->exists ? route('tujuaniot.update',$model->id) : route('tujuaniot.store') }}" method="post">
    
    {{ $model->exists ? method_field('PUT') : '' }} 
    @if($model->exists)
        <input type="hidden" name="mtd" value="put">
    @else
        <input type="hidden" name="mtd" value="post">
    @endif
    @csrf

    <div class="form-group">
        <label for="">Tujuan IOT</label>
        <input type="text" name="tujuan_iot" id="tujuan_iot" value="{{$model->exists ? $model->tujuan_iot : ''}}" class="form-control">
    </div>
</form>