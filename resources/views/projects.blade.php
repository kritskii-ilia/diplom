@extends('layout')

@section('title', 'Главная')

@section('page-content')

        <section class="text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Всё самое лучшее у нас</h1>
                    <p class="lead text-muted">Мы вам представляем широкий выбор проектов, в которые вы можете вложить ваши денежки</p>
                    <div class="row justify-content-center">
                        <form class="row py-5 g-3" method="get" action="{{route('search')}}" autocomplete="off">
                            <div class="col-md-10">
                            <input type="search" class="form-control" name="search" placeholder="Поиск по проектам">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class=" btn btn-primary">Поиск</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <div class="album">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($projects as $project)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" src="../{{$project->img_url}}" width="100%" height="100%"  role="img">
                            <div class="card-body">
                                <p class="card-text">{{$project->name}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{route('project-single-page',['id' => $project->id])}}" type="button" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

@endsection
