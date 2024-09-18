@extends('admin.layouts.base')

@section('content')
    <div class="admin-index-page row">
        <div class="col index-col d-flex align-items-center">
            <x-admin-index-block title="{{$teachers::ru_nameTable()}}" table="{{$teachers::nameTable()}}">
                <table class="table admin-mini-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Фото</th>
                        <th scope="col">Фамилия</th>
                        <th scope="col">Email</th>
                        <th scope="col">Просмотреть</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers::all() as $teacher)
                        <tr>
                            <th scope="row">{{$teacher->id}}</th>
                            <td class="d-flex justify-content-center align-items-center">@if($teacher->avatar)<img src="{{asset($teacher->avatar)}}" width="20">@else<div class = 'null'>Null</div>@endif</td>
                            <td>{{Str::limit($teacher->surname, 15)}}</td>
                            <td>{{Str::limit($teacher->email, 15)}}</td>
                            <td><a href="#" class="btn btn-success p-0 pl-1 pr-1 text-nowrap"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </x-admin-index-block>
            <x-admin-index-block title="{{$lessons::ru_nameTable()}}" table="{{$lessons::nameTable()}}">
                <table class="table admin-mini-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Просмотреть</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lessons::all() as $lesson)
                        <tr>
                            <th scope="row">{{$lesson->id}}</th>
                            <td>{{Str::limit($lesson->name, 15)}}</td>
                            @if($lesson->description)
                                <td>{{Str::limit($lesson->description, 15)}}</td>
                            @else
                                <td><div class="null">Null</div></td>
                            @endif
                            <td><a href="#" class="btn btn-success p-0 pl-1 pr-1 text-nowrap"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </x-admin-index-block>

            <x-admin-index-block title="{{$lesson_formats::ru_nameTable()}}" table="{{$lesson_formats::nameTable()}}">
                <table class="table admin-mini-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Просмотреть</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lesson_formats::all() as $format)
                        <tr>
                            <th scope="row">{{$format->id}}</th>
                            <td>{{Str::limit($format->name, 15)}}</td>
                            @if($format->description)
                                <td>{{Str::limit($format->description, 15)}}</td>
                            @else
                                <td><div class="null">Null</div></td>
                            @endif
                            <td><a href="#" class="btn btn-success p-0 pl-1 pr-1 text-nowrap"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </x-admin-index-block>
            <x-admin-index-block title="{{$schedule::ru_nameTable()}}" table="{{$schedule::nameTable()}}">
                <table class="table admin-mini-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Дата начала</th>
                        <th scope="col">Название пары</th>
                        <th scope="col">Группа</th>
                        <th scope="col">Просмотреть</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedule::all() as $val)
                        <tr>
                            <th scope="row">{{$val->id}}</th>
                            <td>{{Str::limit($val->date_start, 15)}}</td>
                            <td>{{Str::limit($val->lesson->name, 15)}}</td>
                            <td>{{Str::limit($val->student_group->name, 15)}}</td>
                            <td><a href="#" class="btn btn-success p-0 pl-1 pr-1 text-nowrap"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </x-admin-index-block>

        </div>

        <div class="col index-col d-flex align-items-center">
            <x-admin-index-block title="{{$specialities::ru_nameTable()}}" table="{{$specialities::nameTable()}}">
                <table class="table admin-mini-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Номер</th>
                        <th scope="col">Просмотреть</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($specialities::all() as $speciality)
                        <tr>
                            <th scope="row">{{$speciality->id}}</th>
                            <td>{{Str::limit($speciality->name, 15)}}</td>
                            <td>{{Str::limit($speciality->number, 15)}}</td>
                            <td><a href="#" class="btn btn-success p-0 pl-1 pr-1 text-nowrap"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </x-admin-index-block>

            <x-admin-index-block title="{{$student_groups::ru_nameTable()}}" table="{{$student_groups::nameTable()}}">
                <table class="table admin-mini-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Номер</th>
                        <th scope="col">Название</th>
                        <th scope="col">Специальность</th>
                        <th scope="col">Просмотреть</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student_groups::all() as $group)
                        <tr>

                            <th scope="row">{{$group->id}}</th>
                            <td>{{Str::limit($group->name, 15)}}</td>
                            <td>{{Str::limit($group->full_name, 15)}}</td>
                            <td>{{Str::limit($group->speciality->name, 15)}}</td>
                            <td><a href="#" class="btn btn-success p-0 pl-1 pr-1 text-nowrap"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </x-admin-index-block>
            <x-admin-index-block title="{{$duration_breaks::ru_nameTable()}}" table="{{$duration_breaks::nameTable()}}">
                <table class="table admin-mini-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Номер перерыва</th>
                        <th scope="col">Длительность</th>
                        <th scope="col">Просмотреть</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($duration_breaks::all() as $break)
                        <tr>
                            <th scope="row">{{$break->id}}</th>
                            @if($break->name)
                                <td>{{Str::limit($break->name, 15)}}</td>
                            @else
                                <td><div class="null">Null</div></td>
                            @endif
                            <td>{{Str::limit($break->number_breaks, 15)}}</td>
                            @if($break->duration_minutes)
                                <td>{{Str::limit($break->duration_minutes, 15)}}</td>
                            @else
                                <td><div class="null">Null</div></td>
                            @endif
                            <td><a href="#" class="btn btn-success p-0 pl-1 pr-1 text-nowrap"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </x-admin-index-block>
            <x-admin-index-block title="{{$group_breaks::ru_nameTable()}}" table="{{$group_breaks::nameTable()}}">
                <table class="table admin-mini-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Просмотреть</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($group_breaks::all() as $group)
                        <tr>
                            <th scope="row">{{$group->id}}</th>
                            <td>{{Str::limit($group->name, 15)}}</td>
                            @if($group->description)
                            <td>{{Str::limit($group->description, 15)}}</td>
                            @else
                                <td><div>Null</div></td>
                            @endif
                            <td><a href="#" class="btn btn-success p-0 pl-1 pr-1 text-nowrap"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </x-admin-index-block>
        </div>
    </div>
@endsection
