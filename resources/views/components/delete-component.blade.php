<div class="delete-menu-container">
    <div content="delete-menu">
        <div class="delete-menu-head">
            Вы уверены что хотите удалить элемент из таблицы 'TableName'?
        </div>
        <form action="{{route('admin.delete_model', ['table'=>$model::nameTable()])}}" method="post" class="delete-menu-body">
            @csrf
            <div class="admin-delete-panel">
                <div class="admin-delete-panel-head">
                    <div>
                        Удалив этот элемент его нельзя будет вернуть назад
                    </div>
                    <div class="collapse-admin-index-block"><i class="fa fa-window-minimize" aria-hidden="true"></i></div>
                    <div class="open-admin-index-block d-none"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </div>
                <div class="admin-delete-panel-body">
                    <table class="table admin-mini-table">
                        <thead>
                        <tr>
                            <th scope="col">
                                <div class="check-all-delete-panel">
                                    <label for="input_check_all_delete_pane">Выбрать все</label>
                                    <input id="input_check_all_delete_pane" type="checkbox" checked>
                                </div>

                            </th>
                            @foreach($model::getMainFields() as $field)
                                <th scope="col">{{$model::get_ru_field($field)}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model::all() as $data)
                            <tr class="delete-objects delete-object-{{$data->id}}">
                                <th scope="col"><div class="d-flex justify-content-center"><input type="checkbox" name="deleted[]" checked class="check-row-delete-panel" value="{{$data->id}}"></div></th>
                                @foreach($data->toArray() as $key=>$val)
                                    @if(in_array($key, $model::getMainFields()))
                                        @if($val)
                                        <td>{{Str::limit($val, 15)}}</td>
                                        @else
                                            <td><div class="null">Null</div></td>
                                        @endif
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="mt-auto form-delete-table">
                <div class="reliability-delete-container"><input type="checkbox" id="reliability-delete"><label for="reliability-delete"> Подтвердите удаление</label></div>
                <div class="d-flex align-items-center justify-content-around">
                    <input type="submit" class="btn-main-r delete-btn-component d-none p-1" value="Удалить">
                    <div class="btn btn-success p-1 close-delete-panel">Отмена</div>
                </div>
            </div>
        </form>
    </div>
</div>
