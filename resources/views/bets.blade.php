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
                    <th>Название Проекта</th>
                    <th>Сумма</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bets as $bet)
                    <tr>
                        <td>{{$bet->users->login}}</td>
                        <td>{{$bet->projects->id}}</td>
                        <td>{{$bet->projects->name}}</td>
                        <td>
                            {{$bet->sum}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
