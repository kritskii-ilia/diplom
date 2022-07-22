<!doctype html>
<html lang="ru" class="h-100">
<x-head></x-head>
<body class="text-center h-100 align-content-center" >
<div class="d-inline-flex d-flex justify-content-center">
    <main class="form-signin ">
        <form class="form container @if($errors->any()) {{'form--invalid'}} @endif" action="{{route('login')}}" method="post"> <!-- form--invalid -->
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please log in</h1>
            <div class="form__item @error('email')form__item--invalid @enderror"> <!-- form__item--invalid -->
                <label for="email">E-mail <sup>*</sup></label>
                <input id="email" type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                @error('email')
                <span class="form__error">Введите Email</span>
                @enderror
            </div>
            <br>
            <div class="form__item @error('email')form__item--invalid @enderror">
                <label for="password">Password<sup>*</sup></label>
                <input id="password" type="password" name="password" class="form-control" placeholder="Password">
                @error('password')
                <span class="form__error">Введите пароль</span>
                @enderror
            </div>
            <div class="form__item @error('auth_error')form__item--invalid @enderror">
                @error('auth_error')
                <span class="form__error">{{$message}}</span>
                @enderror
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
            <p class="mt-5 mb-3 text-muted">© 2020-2021</p>
        </form>
    </main>
</div>
</body>
</html>
