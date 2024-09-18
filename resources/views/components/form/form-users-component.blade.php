<div class="create-page">
    <form class="admin-form" action="{{route('admin.store_model', ['table'=>$model::nameTable()])}}" enctype="multipart/form-data" method="POST">
        <div class="form-head">
            {{$model::ru_nameTable()}}
        </div>
        @csrf
        <div class="form-body">
            <div class="form-group">
                <label>{{$model::get_ru_field('login')}} <i class="required-label">*</i></label>
                <input type="text" class="form-control @if($errors->has('login')) {{'is-invalid'}} @endif" name="number" value="{{ old('login') }}" placeholder="Заполните поле '{{$model::get_ru_field('login')}}'">
                @if($errors->has('login'))
                    <div class="error">{{$errors->first('login')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('name')}} <i class="required-label">*</i></label>
                <input type="text" class="form-control @if($errors->has('name')) {{'is-invalid'}} @endif" name="name" value="{{ old('name') }}" placeholder="Заполните поле '{{$model::get_ru_field('name')}}'">
                @if($errors->has('name'))
                    <div class="error">{{$errors->first('name')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('surname')}} <i class="required-label">*</i></label>
                <input type="text" class="form-control @if($errors->has('surname')) {{'is-invalid'}} @endif" name="surname" value="{{ old('surname') }}" placeholder="Заполните поле '{{$model::get_ru_field('surname')}}'">
                @if($errors->has('surname'))
                    <div class="error">{{$errors->first('surname')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('patronymic')}}</label>
                <input type="text" class="form-control @if($errors->has('patronymic')) {{'is-invalid'}} @endif" name="patronymic" value="{{ old('patronymic') }}" placeholder="Заполните поле '{{$model::get_ru_field('patronymic')}}'">
                @if($errors->has('patronymic'))
                    <div class="error">{{$errors->first('patronymic')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('email')}} <i class="required-label">*</i></label>
                <input type="email" class="form-control @if($errors->has('email')) {{'is-invalid'}} @endif" name='email' value="{{ old('email') }}" placeholder="Заполните поле '{{$model::get_ru_field('email')}}'">
                @if($errors->has('email'))
                    <div class="error">{{$errors->first('email')}}</div>
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
                <select class="form-control @if($errors->has('user_group_id')) {{'is-invalid'}} @endif" name="user_group_id">
                    @if(old('user_group_id'))
                        <option value="">Не выбрано</option>
                        @foreach($model::$connected_models['user_group']::all() as $val)
                            @if(old('user_group_id') ==  $val->id)
                                <option value="{{$val->id}}" selected>{{$val->name}}</option>
                            @else
                                <option value="{{$val->id}}">{{$val->name}}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="" selected>Не выбрано</option>
                        @foreach($model::$connected_models['user_group']::all() as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('user_group_id'))
                    <div class="error">{{$errors->first('user_group_id')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('password')}} <i class="required-label">*</i></label>
                <input type="password" name="password" value="{{old('password')}}" class="form-control @if($errors->has('password')) {{'is-invalid'}} @endif" placeholder="Заполните поле '{{$model::get_ru_field('password')}}'">
                @if($errors->has('password'))
                    <div class="error">{{$errors->first('password')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('password_confirm')}} <i class="required-label">*</i></label>
                <input type="password" name="password_confirm" value="{{old('password_confirm')}}" class="form-control @if($errors->has('password_confirm')) {{'is-invalid'}} @endif" placeholder="Заполните поле '{{$model::get_ru_field('password_confirm')}}'">
                @if($errors->has('password_confirm'))
                    <div class="error">{{$errors->first('password_confirm')}}</div>
                @endif
            </div>
            <div>
                <input type="submit" value="Создать" class="btn-main-r">
            </div>
        </div>
    </form>
</div>
