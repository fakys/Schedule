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
                <label>
                    Описание
                </label>
                <textarea class="form-control @if($errors->has('description')) {{'is-invalid'}} @endif" name="description" placeholder="Введите название">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="error">{{$errors->first('description')}}</div>
                @endif
            </div>
            <div>
                <input type="submit" value="Создать" class="btn-main-r">
            </div>
        </div>
    </form>
</div>
