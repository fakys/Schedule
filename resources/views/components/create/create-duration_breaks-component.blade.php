<div>
<form class="admin-form" action="{{route('admin.store_model', ['table'=>$model::nameTable()])}}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-head">
        {{$model::ru_nameTable()}}
    </div>
    @csrf
    <div class="form-body">
        <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control @if($errors->has('name')) {{'is-invalid'}} @endif" name="name" value="{{ old('name') }}" placeholder="Введите название">
            @if($errors->has('name'))
                <div class="error">{{$errors->first('name')}}</div>
            @endif
        </div>
        <div class="form-group">
            <label>Номер перерыва <i class="required-label">*</i></label>
            <input type="number" class="form-control @if($errors->has('number_breaks')) {{'is-invalid'}} @endif" name="number_breaks" value="{{ old('number_breaks') }}" placeholder="Введите номер перерыва">
            @if($errors->has('number_breaks'))
                <div class="error">{{$errors->first('number_breaks')}}</div>
            @endif
        </div>
        <div class="form-group">
            <label>Длительность в минутах</label>
            <input list="defaultNumbers" step='5' type="number" class="form-control input_minutes @if($errors->has('duration_minutes')) {{'is-invalid'}} @endif" name="duration_minutes" value="{{ old('duration_minutes') }}" placeholder="Введите длительность в минутах">
            <datalist id="defaultNumbers">
                <option value="10"></option>
                <option value="15"></option>
                <option value="20"></option>
                <option value="30"></option>
            </datalist>
            @if($errors->has('duration_minutes'))
                <div class="error">{{$errors->first('duration_minutes')}}</div>
            @endif
        </div>
        <div class="form-group">
            <label>Время начала <i class="required-label">*</i></label>
            <input type="time" class="form-control @if($errors->has('time_start')) {{'is-invalid'}} @endif" name="time_start" value="{{ old('time_start') }}" placeholder="Введите время начала">
            @if($errors->has('time_start'))
                <div class="error">{{$errors->first('time_start')}}</div>
            @endif
        </div>
        <div class="form-group">
            <label>Время окончания <i class="required-label">*</i></label>
            <input type="time" class="form-control @if($errors->has('time_end')) {{'is-invalid'}} @endif" name="time_end" value="{{ old('time_end') }}" placeholder="Введите время окончания">
            @if($errors->has('time_end'))
                <div class="error">{{$errors->first('time_end')}}</div>
            @endif
        </div>
        <div>
            <input type="submit" value="Создать" class="btn-main-r">
        </div>
    </div>
</form>
</div>
