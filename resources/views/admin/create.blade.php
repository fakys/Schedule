@extends('admin.layouts.base')


@section('content')
{{(new \App\View\Components\CreateComponent(['model'=>$model]))->render()}}
@endsection
