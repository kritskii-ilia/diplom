@extends('layout')

@section('title', 'Главная')

@section('page-content')



    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Помогаем расти вместе</h1>
            <p class="lead my-3">Мы помогаем инвесторам с маленьким капиталом вкладывать в крупные проекты</p>
            <p class="lead mb-0"><a href="{{route('signup-page')}}" class="text-white fw-bold ">Присоединиться</a></p>
        </div>
    </div>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Три простых шага</h1>
    </div>
    <div class="container marketing">
        <div class="row">
            <div class="col-lg-4 text-center">
                <img src="../public/img/reg-img.png" class="" width="140" height="140" alt="">
                <h2>Регистрация</h2>
                <p>Для полного доступа ко всем функциям нужно зарегистрироваться на нашем сайте.</p>
                <p><a class="btn btn-secondary" href="{{route('signup-page')}}" role="button">Регистрация</a></p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="../public/img/molotok-sudi.png" width="140" height="140" alt="">
                <h2>Выбор проекта</h2>
                <p>Выбираете проект, который вам приглянулся, вкладываете в него через наш сервис</p>
                <p><a class="btn btn-secondary" href="{{route('projects')}}" role="button">Проекты</a></p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="../public/img/profits.png" width="140" height="140" alt="">
                <h2>Фиксация</h2>
                <p>В случае удачного расклада событий, фиксируете прибыль вместе со всеми вкладчиками</p>
                @if(Auth::user())
                    <p><a class="btn btn-secondary" href="{{route('profile-page')}}" role="button">Мои сделки</a></p>
                @else
                    <p><a class="btn btn-secondary" role="button">Мои сделки</a></p>
                @endif
            </div>
        </div>
    </div>

@endsection
