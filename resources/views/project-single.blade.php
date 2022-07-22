@extends('layout')

@section('title', 'Главная')

@section('page-content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>{{$project->name}}</h1>
                <br>
                <div class="col-6">
                    <img class="rounded" src="../{{$project->img_url}}" alt="{{$project->name}}" width="700">
                </div>
                <div>
                    <br>
                    <h3>Описание</h3>
                    <br>
                    <small>{{$project->description}}</small>
                </div>
            </div>
            @if(Auth::user())
            <div class="col-2">
                <div>
                    <h2>Участие</h2>
                    <br>
                    @if(Auth::user()->role_id === 1)
                        <div class="card" style="width:300px">
                            <div class="card-body">
                                <a href="{{route('project-edit-page', ['id' => $project->id])}}" class="btn btn-secondary">Редактировать</a>
                                <a href="{{route('delProject', ['id' => $project->id])}}" class="btn btn-danger">Удалить</a>
                            </div>
                            @endif
                        </div>
                    <br>
                        <div class="card" style="width:300px">
                            <div class="card-body">
                                <h4 class="card-title">Заявка</h4>
                                @foreach(Auth::user()->requests as $request)
                                    @if($request->status_id == 1)
                                        <p class="card-text">Запрошено</p>
                                    @elseif($request->status_id == 2)
                                        <p class="card-text">Одобрено</p>
{{--                                        <form class="lot-item__form" action="" method="post" autocomplete="off">--}}
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="card-text">Готовое инвестиционное решение</p>
                                                    <p >Рекомендуем инвестировать данную сумму:
                                                        @if($rate <= 2)
                                                            <h6>100</h6>
                                                        @elseif($rate <= 4)
                                                            <h6>200</h6>
                                                        @else
                                                            <h6>300</h6>
                                                        @endif
                                                    </p>
                                            </div>
                                        </div>

                                        <!-- <form class="needs-validation" novalidate=""
                                              action="{{route('add-bet')}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf -->
                                            <div id="native-balances" class="col-12">
                                                <div class="row">
                                                    @if($project->max_supply == $project->supply)
                                                        <label for="sum" class="form-label ">Вся сумма собрана</label>
                                                    @else
                                                    <p class="lot-item__form-item form__item @error('sum') form__item--invalid" @enderror>
                                                        <label for="sum" class="form-label ">Сколько инвестируем?</label>
                                                        <br>
                                                        <br>
                                                        <button id="btn-login">Login</button>
                                                        <button id="btn-logout">Logout</button>
                                                        <div class="mb-3">
                                                            
                                                            <input placeholder="amount to send" type="text" class="form-control" id="erc20-amount" name='sum'>
                                                            
                                                            </div>
                                                            <div class="mb-3">
                                                            
                                                            <input placeholder="address to send to" type="text" class="form-control" id="erc20-address">
                                                            </div>

                                                            <div class="mb-3">
                                                            
                                                            <input placeholder="token contract" type="text"  class="form-control" id="erc20-contract">
                                                            </div>

                                                            <div class="mb-3">
                                                            
                                                            <input placeholder="decimals" type="text" class="form-control" id="erc20-decimals">
                                                            </div>
                                                            <input hidden value="{{$project->id}}" name="project_id">
                                                        <!-- <input type="text" class="form-control " id="sum" name="sum" placeholder="Введите сумму" value=""> -->
                                                    @endif
                                                        @error('sum')
                                                        <span class="form__error">{{$message}}</span>
                                                        @enderror
                                                        <h6>Собрано: {{$project->supply}}/{{$project->max_supply}}</h6>
                                                    </p>
                                                </div>
                                            </div>
                                            @if($project->max_supply != $project->supply)
                                                <hr>
                                                <button id="transfer-erc20" type="submit" type="submit" class="w-100 btn btn-primary btn-lg">Ивестировать</button>
                                            @endif
                                        <!-- </form> -->
                                    @elseif($request->status_id == 3)
                                        <p class="card-text">Отклонено</p>
                                    @endif
                                @endforeach
                                @if(Auth::user()->requests->isEmpty())
                                    <p class="card-text">Для участия нужно подать заявку</p>
                                    <a href="{{route('add-request', ['user_id' => Auth::user()->id, 'project_id' => $project->id])}}" class="btn btn-primary">Подать заявку</a>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
            @endif
        </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript" src="/js/main.js"></script>
@endsection