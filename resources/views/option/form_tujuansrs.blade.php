<form action="{{$model->exists ? route('tujuansrs.update',$model->id) : route('tujuansrs.store') }}" method="post">
    
    {{ $model->exists ? method_field('PUT') : '' }} 
    @if($model->exists)
        <input type="hidden" name="mtd" value="put">
    @else
        <input type="hidden" name="mtd" value="post">
    @endif
    @csrf

    <div class="form-group">
        <label for="">Tujuan SRS</label>
        <input type="text" name="tujuan_srs" id="tujuan_srs" value="{{$model->exists ? $model->tujuan_srs : ''}}" class="form-control">
    </div>
</form>