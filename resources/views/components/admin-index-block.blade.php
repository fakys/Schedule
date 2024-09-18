<div class="admin-index-block">
    <div class="admin-index-block-head">
        <div class="admin-index-block-title">
            <a href="{{route('admin.show_model', ['table'=>$model::nameTable()])}}">
                {{$model::ru_nameTable()}}
            </a>
        </div>
        <div class="collapse-admin-index-block"><i class="fa fa-window-minimize" aria-hidden="true"></i></div>
        <div class="open-admin-index-block d-none"><i class="fa fa-plus" aria-hidden="true"></i></div>
    </div>
    <div class="admin-index-block-body">
        <table class="table admin-mini-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                @foreach($model::getMainFields() as $field)
                    <th scope="col">{{$model::get_ru_field($field)}}</th>
                @endforeach
                <th scope="col">Просмотреть</th>
            </tr>
            </thead>
            <tbody>
            @foreach($model::all() as $table)
                <tr>
                    <th scope="row">{{$table->id}}</th>
                    @foreach($table->toArray() as $field=>$val)
                        @if(in_array($field, $model::getMainFields()))
                            @if(!$val)
                                <th scope="row"><div class="null">Null</div></th>
                            @else
                                <th scope="row">{{\Illuminate\Support\Str::limit($val, 10)}}</th>
                            @endif

                        @endif
                    @endforeach
                    <td><a href="#" class="btn btn-success p-0 pl-1 pr-1 text-nowrap"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
