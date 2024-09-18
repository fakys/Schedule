<div class="create-page">
    <form class="admin-form" action="{{route('admin.store_model', ['table'=>$model::nameTable()])}}" enctype="multipart/form-data" method="POST">
        <div class="form-head">
            {{$model::ru_nameTable()}}
        </div>
        @csrf
        <div class="form-body">
            <div class="form-group">
                <label>{{$model::get_ru_field('name')}} <i class="required-label">*</i></label>
                <input type="text" class="form-control @if($errors->has('name')) {{'is-invalid'}} @endif" name="name" value="{{ old('name') }}" placeholder="Введите имя">
                @if($errors->has('name'))
                    <div class="error">{{$errors->first('name')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('surname')}} <i class="required-label">*</i></label>
                <input type="text" class="form-control @if($errors->has('surname')) {{'is-invalid'}} @endif" name="surname" value="{{ old('surname') }}" placeholder="Введите фамилию">
                @if($errors->has('surname'))
                    <div class="error">{{$errors->first('surname')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('patronymic')}}</label>
                <input type="text" class="form-control @if($errors->has('patronymic')) {{'is-invalid'}} @endif" name="patronymic" value="{{ old('patronymic') }}" placeholder="Введите отчество">
                @if($errors->has('patronymic'))
                    <div class="error">{{$errors->first('patronymic')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('email')}} <i class="required-label">*</i></label>
                <input type="email" class="form-control @if($errors->has('email')) {{'is-invalid'}} @endif" name='email' value="{{ old('email') }}" placeholder="Введите email">
                @if($errors->has('email'))
                    <div class="error">{{$errors->first('email')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('number')}}</label>
                <input type="number" class="form-control @if($errors->has('number')) {{'is-invalid'}} @endif" name="number" value="{{ old('number') }}" placeholder="Введите номер телефона">
                @if($errors->has('number'))
                    <div class="error">{{$errors->first('number')}}</div>
                @endif
            </div>
            <div class="admin-form-photo-block">
                <div class="form-group d-flex gap-2">
                    <div class="admin-drop-zone-container">
                        <label>{{$model::get_ru_field('avatar')}}</label>
                        <label for="admin-photo-input" class="admin-drop-zone @if($errors->has('avatar')) invalid-drop-zone @endif">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="" class="admin-drop-zone-image">
                            </div>
                            <div class="admin-drop-zone-content">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                <div class="btn-main-r">
                                    Загрузить изображение
                                </div>
                            </div>
                        </label>
                        <div class="name-image-drop-zone"></div>
                        @if($errors->has('avatar'))
                            <div class="error">{{$errors->first('avatar')}}</div>
                        @endif
                    </div>
                    <div class="pt-5">
                        <div class="btn-main-r admin-close-drop-zone">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type="file" id="admin-photo-input" accept=".png, .jpg, .jpeg" class="form-control @if($errors->has('avatar')) {{'is-invalid'}} @endif photo-input" name="avatar">
                </div>
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('date_birth')}}</label>
                <input type="date" class="form-control @if($errors->has('date_birth')) {{'is-invalid'}} @endif" value="{{ old('date_birth') }}" name="date_birth">
                @if($errors->has('date_birth'))
                    <div class="error">{{$errors->first('date_birth')}}</div>
                @endif
            </div>
            <div>
                <input type="submit" value="Создать" class="btn-main-r">
            </div>
        </div>
    </form>
</div>
