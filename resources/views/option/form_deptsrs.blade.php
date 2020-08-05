<form action="{{$model->exists ? route('deptsrs.update',$model->id) : route('deptsrs.store') }}" method="post">
    
    {{ $model->exists ? method_field('PUT') : '' }} 
    @if($model->exists)
        <input type="hidden" name="mtd" value="put">
    @else
        <input type="hidden" name="mtd" value="post">
    @endif
    @csrf

    <div class="form-group">
        <label for="">Dept SRS</label>
        <input type="text" name="deptsrs" id="deptsrs" value="{{$model->exists ? $model->deptsrs : ''}}" class="form-control">
    </div>
</form>