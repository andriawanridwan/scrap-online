<form action="{{$model->exists ? route('plant.update',$model->id) : route('plant.store') }}" method="post">
    
    {{ $model->exists ? method_field('PUT') : '' }} 
    @if($model->exists)
        <input type="hidden" name="mtd" value="put">
    @else
        <input type="hidden" name="mtd" value="post">
    @endif
    @csrf

    <div class="form-group">
        <label for="">Plant</label>
        <input type="text" name="plant" id="plant" value="{{$model->exists ? $model->plant : ''}}" class="form-control">
    </div>
</form>