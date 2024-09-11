@extends('admin.layouts.base')

@section('content')

    <div class="admin-table-show-model">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <div class="d-flex ml-auto input-group mb-2">
                    <div class="d-flex gap-2">
                        <a href="#" class="btn-main-b"><i class="fa fa-plus" aria-hidden="true"></i> Добавить</a>
                        <a href="#" class="btn btn-success btn-show-model d-none"><i class="fa fa-paint-brush" aria-hidden="true"></i> Редактировать</a>
                        <a href="#" class="btn btn-danger btn-show-model d-none"><i class="fa fa-ban" aria-hidden="true"></i> Удалить</a>
                    </div>
                    <div class="ml-auto"><input type="search" class="form-control form-control-sm" placeholder="Найти"></div>
                    <div class="input-group-append">
                        <button class="btn btn-light btn-search p-0 pl-2 pr-2" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </tr>
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
            @foreach($model::all() as $val)
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
    </div>

@endsection
