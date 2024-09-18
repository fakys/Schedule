<div>
    <form class="admin-form" method="post" action="{{route('admin.store_model', ['table'=>$model::nameTable()])}}">
        @csrf
        <div class="form-head">
            {{$model::ru_nameTable()}}
        </div>
        <div class="form-body">
            <div class="form-group">
                <label>{{$model::get_ru_field('name')}}</label>
                <input class="form-control @if($errors->has('name')){{'is-invalid'}}@endif" name="name" placeholder="Заполните поле '{{$model::get_ru_field('name')}}'">
                @if($errors->has('name'))
                    <div class="error">{{$errors->first('name')}}</div>
                @endif
            </div>
            <div>
                <input type="submit" value="Создать" class="btn-main-r">
            </div>
        </div>
    </form>
</div>
