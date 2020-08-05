<form action="{{$model->exists ? route('workcenter.update',$model->id) : route('workcenter.store') }}" method="post">
    
    {{ $model->exists ? method_field('PUT') : '' }} 
    @if($model->exists)
        <input type="hidden" name="mtd" value="put">
    @else
        <input type="hidden" name="mtd" value="post">
    @endif
    @csrf

    <div class="form-group">
        <label for="">Workcenter</label>
        <input type="text" name="workcenter" id="workcenter" value="{{$model->exists ? $model->workcenter : ''}}" class="form-control">
    </div>
</form>