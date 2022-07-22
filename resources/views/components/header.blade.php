<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <a class="h5 my-0 me-md-0 fw-normal text-dark text-decoration-none" href="{{route('main-page')}}">InvestInspector</a>
    <img class="my-0 me-md-auto fw-normal" src="../../../public/img/logo.png" width="50" height="50" alt="Logo">
    <nav class="my-2 my-md-auto me-md-3">
        @if(Auth::user() && Auth::user()->id === 1)
            <a class="p-2 text-dark text-decoration-none" href="{{route('bets-page')}}">Ставки</a>
            <a class="p-2 text-dark text-decoration-none" href="{{route('requests-page')}}">Заявки</a>
            <a class="p-2 text-dark text-decoration-none" href="{{route('criterion-page')}}">Аддитивный критерий</a>
        @endif
        <a class="p-2 text-dark text-decoration-none" href="{{route('projects')}}">Проекты</a>
        <a class="p-2 text-dark text-decoration-none" href="#">О нас</a>
    </nav>
    <div>
        @if(Auth::user())
            {{--            <p>{{Auth::user()->name}}</p>--}}
            @if(Auth::user()->id === 1)
                <a class="btn btn-primary" href="{{route('project-add-page')}}">Добавить</a>
            @endif
            <a class="btn btn-success" href="{{route('profile-page')}}">Профиль</a>
            <a class="btn btn-danger" href="{{route('logout')}}">Выход</a>
        @else
            <a class="btn btn-outline-primary" href="{{route('signup-page')}}">Sign up</a>
            <a class="btn btn-primary" href="{{route('login-page')}}">Log in</a>
        @endif
    </div>
</header>
