@extends('admin.layouts.base')

@section('content')
    <div class="admin-index-page row">
        <div class="col index-col d-flex align-items-center">
            @foreach($models[0] as $model)
                <x-admin-index-block model="{{$model}}"></x-admin-index-block>
            @endforeach
        </div>
        <div class="col index-col d-flex align-items-center">
            @foreach($models[1] as $model)
                <x-admin-index-block model="{{$model}}"></x-admin-index-block>
            @endforeach
        </div>
    </div>
@endsection
