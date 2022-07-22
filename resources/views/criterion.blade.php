@extends('layout')

@section('title', 'Аддитивный критерий')

@section('page-content')


    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
{{--                    <th>ID пользователя</th>--}}
                    <th>Баланс</th>
                    <th>Объём транзакций</th>
                    <th>Участия</th>
                    <th>Вложенная сумма в проекты</th>
                    <th>Собирается в проект</th>
                    <th>Собрано в проект</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $date)
                    <tr>
{{--                        <td>{{$date->id}}</td>--}}
                        <td>{{$date->balance}}</td>
                        <td>{{$date->volume}}</td>
                        <td>{{$date->participations}}</td>
                        <td>{{$date->invested_sum}}</td>
                        <td>{{$date->supply}}</td>
                        <td>{{$date->max_supply}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <h1>Максимальные значения</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Баланс</th>
                    <th>Объём транзакций</th>
                    <th>Участия</th>
                    <th>Вложенная сумма в проекты</th>
                    <th>Собирается в проект</th>
                    <th>Собрано в проект</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$balance}}</td>
                        <td>{{$volume}}</td>
                        <td>{{$participations}}</td>
                        <td>{{$invested_sum}}</td>
                        <td>{{$supply}}</td>
                        <td>{{$max_supply}}</td>
                    </tr>
                </tbody>
            </table>
            <h1>Коэффициенты по критериям</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Баланс</th>
                    <th>Объём транзакций</th>
                    <th>Участия</th>
                    <th>Вложенная сумма в проекты</th>
                    <th>Собирается в проект</th>
                    <th>Собрано в проект</th>
                </tr>
                </thead>
                <tbody>
                @foreach($matrix as $item)
                    <tr>
                        <td>{{$item[0]}}</td>
                        <td>{{$item[1]}}</td>
                        <td>{{$item[2]}}</td>
                        <td>{{$item[3]}}</td>
                        <td>{{$item[4]}}</td>
                        <td>{{$item[5]}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id Пользователя</th>
                        <th>Рейтинг</th>
                    </tr>
                </thead>
                <tbody>
                    <td>{{$tmp[0]}}</td>
                    <td>{{$tmp[1]}}</td>
                    <td>{{$tmp[2]}}</td>
                    <td>{{$tmp[3]}}</td>
                    <td>{{$tmp[4]}}</td>
                </tbody>
            </table>

        </div>
    </div>


@endsection
