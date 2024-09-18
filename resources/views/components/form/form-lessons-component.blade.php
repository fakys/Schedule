<div>
    <form class="admin-form" action="{{route('admin.store_model', ['table'=>$model::nameTable()])}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-head">
            {{$model::ru_nameTable()}}
        </div>
        @csrf
        <div class="form-body">
            <div class="form-group">
                <label>{{$model::get_ru_field('name')}} <i class="required-label">*</i></label>
                <input type="text" class="form-control @if($errors->has('name')) {{'is-invalid'}} @endif" name="name" value="{{ old('name') }}" placeholder="Заполните поле '{{$model::get_ru_field('name')}}'">
                @if($errors->has('name'))
                    <div class="error">{{$errors->first('name')}}</div>
                @endif
            </div>
            <div class="form-group">
                <label>{{$model::get_ru_field('description')}}</label>
                <textarea class="form-control @if($errors->has('description')) {{'is-invalid'}} @endif" placeholder="Заполните поле '{{$model::get_ru_field('description')}}'" name="description"></textarea>
                @if($errors->has('description'))
                    <div class="error">{{$errors->first('description')}}</div>
                @endif
            </div>
            <div class="form-group">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{$model::$connected_models['teachers']::ru_nameTable()}}</label>
                                    <select class="duallistbox" multiple name="teachers[]">
                                        @foreach($model::$connected_models['teachers']::all() as $row)
                                            <option value="{{$row->id}}">{{$row->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" value="Создать" class="btn-main-r">
            </div>
        </div>
    </form>

</div>
