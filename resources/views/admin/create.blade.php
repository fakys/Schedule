@extends('admin.layouts.base')


@section('content')
{{\App\View\Components\CreateComponent::object(['model'=>$model])->render()}}
@endsection
