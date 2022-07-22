@extends('layout')

@section('title', 'Главная')

@section('page-content')

    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Пользователь</th>
                        <th>ID Проекта</th>
                        <th>Статус</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requests as $request)
                    <tr>
                        <td>{{$request->users->login}}</td>
                        <td>{{$request->projects->name}}</td>
                        <td>{{$request->statuses->title}}</td>
                        <td>
                            <a href="{{route('request-wait', ['id' => $request->id])}}" class="btn btn-warning">Запрошено</a>
                            <a href="{{route('request-success', ['id' => $request->id])}}" class="btn btn-success">Одобрено</a>
                            <a href="{{route('request-denied', ['id' => $request->id])}}" class="btn btn-danger">Отклонено</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>

        </div>
    </div>

@endsection
