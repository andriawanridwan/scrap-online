<form action="{{$model->exists ? route('deptiot.update',$model->id) : route('deptiot.store') }}" method="post">
    
    {{ $model->exists ? method_field('PUT') : '' }} 
    @if($model->exists)
        <input type="hidden" name="mtd" value="put">
    @else
        <input type="hidden" name="mtd" value="post">
    @endif
    @csrf

    <div class="form-group">
        <label for="">Dept</label>
        <input type="text" name="deptiot" id="deptiot" value="{{$model->exists ? $model->deptiot : ''}}" class="form-control">
    </div>
</form>