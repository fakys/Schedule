<div>
    <form class="admin-form" action="{{route('admin.store_model', ['table'=>$model::nameTable()])}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-head">
            {{$model::ru_nameTable()}}
        </div>
        @csrf
        <div class="form-body">
            <div class="form-group">
                <label>{{$model::get_ru_field('number_pairs')}} <i class="required-label">*</i></label>
                <input type="number" class="form-control @if($errors->has('number_pairs')) {{'is-invalid'}} @endif" name="number_pairs" value="{{ old('number_pairs') }}" placeholder="Заполните поле '{{$model::get_ru_field('number_pairs')}}'">
                @if($errors->has('number_pairs'))
                    <div class="error">{{$errors->first('number_pairs')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('date_start')}} <i class="required-label">*</i></label>
                <input type="date" class="form-control @if($errors->has('date_start')) {{'is-invalid'}} @endif" name="date_start" value="{{ old('date_start') }}">
                @if($errors->has('date_start'))
                    <div class="error">{{$errors->first('date_start')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('day_of_week')}} <i class="required-label">*</i></label>
                <input type="number" class="form-control @if($errors->has('day_of_week')) {{'is-invalid'}} @endif" name="day_of_week" value="{{ old('day_of_week') }}" placeholder="Заполните поле '{{$model::get_ru_field('day_of_week')}}'">
                @if($errors->has('day_of_week'))
                    <div class="error">{{$errors->first('day_of_week')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('time_start')}} <i class="required-label">*</i></label>
                <input type="time" class="form-control @if($errors->has('time_start')) {{'is-invalid'}} @endif" name="time_start" value="{{ old('time_start') }}" placeholder="Заполните поле '{{$model::get_ru_field('time_start')}}'">
                @if($errors->has('time_start'))
                    <div class="error">{{$errors->first('time_start')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('time_end')}} <i class="required-label">*</i></label>
                <input type="time" class="form-control @if($errors->has('time_end')) {{'is-invalid'}} @endif" name="time_end" value="{{ old('time_end') }}" placeholder="Заполните поле '{{$model::get_ru_field('time_end')}}'">
                @if($errors->has('time_end'))
                    <div class="error">{{$errors->first('time_end')}}</div>
                @endif
            </div>

            <div class="form-group">
                <label>{{$model::get_ru_field('student_group_id')}} <i class="required-label">*</i></label>
               <select class="form-control @if($errors->has('student_group_id')) {{'is-invalid'}} @endif" name="student_group_id">
                   @if(old('student_group_id'))
                       <option value="">Не выбрано</option>
                       @foreach($model::$connected_models['group']::all() as $val)
                           @if(old('student_group_id') ==  $val->id)
                               <option value="{{$val->id}}" selected>{{$val->name}}</option>
                           @else
                               <option value="{{$val->id}}">{{$val->name}}</option>
                           @endif
                       @endforeach
                   @else
                       <option value="" selected>Не выбрано</option>
                       @foreach($model::$connected_models['group']::all() as $val)
                           <option value="{{$val->id}}">{{$val->name}}</option>
                       @endforeach
                   @endif
               </select>
                @if($errors->has('student_group_id'))
                    <div class="error">{{$errors->first('student_group_id')}}</div>
                @endif
            </div>

            <div class="form-group">
                <label>{{$model::get_ru_field('lesson_id')}} <i class="required-label">*</i></label>
                <select class="form-control @if($errors->has('lesson_id')) {{'is-invalid'}} @endif" name="lesson_id">
                    @if(old('lesson_id'))
                        <option value="">Не выбрано</option>
                        @foreach($model::$connected_models['lesson']::all() as $val)
                            @if(old('lesson_id') ==  $val->id)
                                <option value="{{$val->id}}" selected>{{$val->name}}</option>
                            @else
                                <option value="{{$val->id}}">{{$val->name}}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="" selected>Не выбрано</option>
                        @foreach($model::$connected_models['lesson']::all() as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('lesson_id'))
                    <div class="error">{{$errors->first('lesson_id')}}</div>
                @endif
            </div>

            <div class="form-group">
                <label>{{$model::get_ru_field('teacher_id')}}</label>
                <select class="form-control @if($errors->has('teacher_id')) {{'is-invalid'}} @endif" name="teacher_id">
                    @if(old('teacher_id'))
                        <option value="">Не выбрано</option>
                        @foreach($model::$connected_models['teacher']::all() as $val)
                            @if(old('teacher_id') ==  $val->id)
                                <option value="{{$val->id}}" selected>{{$val->surname}}</option>
                            @else
                                <option value="{{$val->id}}">{{$val->surname}}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="" selected>Не выбрано</option>
                        @foreach($model::$connected_models['teacher']::all() as $val)
                            <option value="{{$val->id}}">{{$val->surname}}</option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('teacher_id'))
                    <div class="error">{{$errors->first('teacher_id')}}</div>
                @endif
            </div>

            <div class="form-group">
                <label>{{$model::get_ru_field('lesson_duration_id')}}</label>
                <select class="form-control @if($errors->has('lesson_duration_id')) {{'is-invalid'}} @endif" name="lesson_duration_id">
                    @if(old('lesson_duration_id'))
                        <option value="">Не выбрано</option>
                        @foreach($model::$connected_models['lesson_duration']::all() as $val)
                            @if(old('lesson_duration_id') ==  $val->id)
                                <option value="{{$val->id}}" selected>{{$val->name}}</option>
                            @else
                                <option value="{{$val->id}}">{{$val->name}}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="" selected>Не выбрано</option>
                        @foreach($model::$connected_models['lesson_duration']::all() as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('lesson_duration_id'))
                    <div class="error">{{$errors->first('lesson_duration_id')}}</div>
                @endif
            </div>

            <div class="form-group">
                <label>{{$model::get_ru_field('lesson_format_id')}}</label>
                <select class="form-control @if($errors->has('lesson_format_id')) {{'is-invalid'}} @endif" name="lesson_format_id">
                    @if(old('lesson_format_id'))
                        <option value="">Не выбрано</option>
                        @foreach($model::$connected_models['lesson_format']::all() as $val)
                            @if(old('lesson_format_id') ==  $val->id)
                                <option value="{{$val->id}}" selected>{{$val->name}}</option>
                            @else
                                <option value="{{$val->id}}">{{$val->name}}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="" selected>Не выбрано</option>
                        @foreach($model::$connected_models['lesson_format']::all() as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('lesson_format_id'))
                    <div class="error">{{$errors->first('lesson_format_id')}}</div>
                @endif
            </div>

            <div>
                <input type="submit" value="Создать" class="btn-main-r">
            </div>
        </div>
    </form>

</div>
