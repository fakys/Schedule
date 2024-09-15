<div>
    <form class="admin-form" action="{{route('admin.store_model', ['table'=>$model::nameTable()])}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-head">
            {{$model::ru_nameTable()}}
        </div>
        @csrf
        <div class="form-body">
            <div class="form-group">
                <label>Название <i class="required-label">*</i></label>
                <input type="text" class="form-control @if($errors->has('name')) {{'is-invalid'}} @endif" name="name" value="{{ old('name') }}" placeholder="Введите название">
                @if($errors->has('name'))
                    <div class="error">{{$errors->first('name')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Полное название <i class="required-label">*</i></label>
                <input type="text" class="form-control @if($errors->has('full_name')) {{'is-invalid'}} @endif" name="full_name" value="{{ old('full_name') }}" placeholder="Введите полное название">
                @if($errors->has('full_name'))
                    <div class="error">{{$errors->first('full_name')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>Cпециальность <i class="required-label">*</i></label>
                <select class="form-control @if($errors->has('speciality_id')){{'is-invalid'}}@endif" name="speciality_id">
                    <option selected value="">Не выбрано</option>
                    @foreach($model::$connected_models['specialities']::all() as $val)
                        <option value="{{$val->id}}">{{$val->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('speciality_id'))
                    <div class="error">{{$errors->first('speciality_id')}}</div>
                @endif
            </div>
            <div>
                <input type="submit" value="Создать" class="btn-main-r">
            </div>
        </div>
    </form>
</div>
