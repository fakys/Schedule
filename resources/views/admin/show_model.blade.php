@extends('admin.layouts.base')

@section('content')

    <div class="admin-table-show-model">
        <form method="get" action="{{route('admin.show_model', ['table'=>$model::nameTable()])}}" class="d-flex mb-2">
            <div class="d-flex gap-2">
                <a href="{{route('admin.create_model', ['table'=>$model::nameTable()])}}" class="btn-main-b"><i class="fa fa-plus" aria-hidden="true"></i> Добавить</a>
                <a href="#" class="btn btn-success btn-show-model d-none"><i class="fa fa-paint-brush" aria-hidden="true"></i> Редактировать</a>
                <a href="#" class="btn btn-danger btn-show-model d-none"><i class="fa fa-ban" aria-hidden="true"></i> Удалить</a>
            </div>
            <div class="form ml-auto search-form input-group">
                @if($search)
                    <div class="d-flex justify-content-center align-items-center mr-1"><a href="{{route('admin.show_model', $model::nameTable())}}" class="btn btn-danger p-0 pl-1 pr-1"><i class="fa fa-times" aria-hidden="true"></i> Отменить</a> </div>
                @endif
                <input type="search" name="search" class="form-control form-control-sm" placeholder="Найти" value="{{$search}}">
                <div class="input-group-append">
                    <button class="btn btn-light btn-search p-0 pl-2 pr-2" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
        <div class="admin-table-container">
            <table class="table table-bordered mb-0 table-hover table-show-model">
                <thead>
                <tr>
                    <th>
                        <div class="check-all-show-model">
                            <label for="check_all_show_model" class="m-0 text-nowrap">Отметиь все</label>
                            <div class="d-flex justify-content-center"><input id="check_all_show_model" type="checkbox"></div>
                        </div>
                    </th>
                    @foreach($columns as $col)
                        <th>{{$model::get_ru_field($col)}}</th>
                    @endforeach

                </tr>
                </thead>
                <tbody>
                @foreach($data as $val)
                    <tr class="row-object">
                        <td><div class="d-flex justify-content-center"><input type="checkbox" class="checkbox-show-model"></div></td>
                        @foreach($columns as $col)
                            @if($val->$col)
                                @if(in_array($col, $val->getMainFields()))
                                    <td><a href="#">{{\Illuminate\Support\Str::limit($val->$col, 50)}}</a></td>
                                @elseif($val->image_fields && in_array($col, $val->image_fields))
                                    <td>
                                        <img src="{{asset($val->$col)}}" class="image-show-model"/>
                                    </td>
                                @else
                                    <td>{{\Illuminate\Support\Str::limit($val->$col, 50)}}</td>
                                @endif

                            @else
                                <td><div class="null">Null</div></td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix mb-3">
            <div class="null-show-table @if($data->isEmpty()) {{'d-block'}} @endif">
                Здесть пока ничего нет
            </div>
            <ul class="pagination pagination-sm m-0 float-left">
                <li class="page-item page-link pagination-prev">«</li>
                <div class="pages-items">
                </div>
                <li class="page-item page-link pagination-next">»</li>
            </ul>
        </div>
    </div>

@endsection
