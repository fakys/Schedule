@extends('admin.layouts.base')

@section('content')

    <div class="admin-table-show-model">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                @foreach($columns as $col)
                    <th>{{$col}}</th>
                @endforeach

            </tr>
            </thead>
            <tbody>
            @foreach($model::all() as $val)
                <tr>
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
