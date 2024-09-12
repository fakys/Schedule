@extends('admin.layouts.base')

@section('content')

    <div class="admin-table-show-model">
        <form method="get" action="{{route('admin.show_model', ['table'=>$table])}}" class="d-flex mb-2">
            <div class="d-flex gap-2">
                <a href="#" class="btn-main-b"><i class="fa fa-plus" aria-hidden="true"></i> Добавить</a>
                <a href="#" class="btn btn-success btn-show-model d-none"><i class="fa fa-paint-brush" aria-hidden="true"></i> Редактировать</a>
                <a href="#" class="btn btn-danger btn-show-model d-none"><i class="fa fa-ban" aria-hidden="true"></i> Удалить</a>
            </div>
            <div class="form ml-auto search-form input-group">
                <input type="search" name="search" class="form-control form-control-sm" placeholder="Найти">
                <div class="input-group-append">
                    <button class="btn btn-light btn-search p-0 pl-2 pr-2" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
        <table class="table table-bordered mb-0 table-hover table-show-model">
            <thead>
            <tr>
                <th>
                    <div class="check-all-show-model">
                        <label for="check_all_show_model" class="m-0">Отметиь все</label>
                        <div class="d-flex justify-content-center"><input id="check_all_show_model" type="checkbox"></div>
                    </div>
                </th>
                @foreach($columns as $col)
                    <th>{{$col}}</th>
                @endforeach

            </tr>
            </thead>
            <tbody>
                @foreach($model as $val)
                    <tr class="row-object">
                        <td><div class="d-flex justify-content-center"><input type="checkbox" class="checkbox-show-model"></div></td>
                        @foreach($columns as $col)
                            @if($val->$col)
                                <td>{{$val->$col}}</td>
                            @else
                                <td><div class="null">Null</div></td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-footer clearfix mb-3">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item page-link pagination-prev">«</li>
                <div class="pages-items">
                </div>
                <li class="page-item page-link pagination-next">»</li>
            </ul>
        </div>
    </div>

@endsection
