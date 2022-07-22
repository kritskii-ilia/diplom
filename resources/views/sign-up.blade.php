<!doctype html>
<html lang="ru" class="h-100">
<x-head></x-head>
<body class="text-center h-100 align-content-center" >
<div class="d-inline-flex d-flex justify-content-center">
    <main class="form-signin ">
        <form action="{{route('signup')}}" class="@if($errors->any()) {{  'form__item--invalid' }} @endif"
              method="post"
              autocomplete="off">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
            <div class="form__item @error('email')form__item--invalid @enderror">
                <label for="Email" >Email<sup>*</sup></label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="" autofocus="" value="{{old('email')}}"><br>
                @error('email')
                <span class="form__error">Введите корректный e-mail</span>
                @enderror
            </div>

            <div class="form__item @error('login')form__item--invalid @enderror">
                <label for="Login" >Login<sup>*</sup></label>
                <input type="text" name="login" id="login" class="form-control" placeholder="Login" required="" value="{{old('login')}}"><br>
                @error('login')
                <span class="form__error">Введите другой логин</span>
                @enderror
            </div>

            <div class="form__item @error('password')form__item--invalid @enderror">
                <label for="Password" >Password<sup>*</sup></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
                @error('password')
                <span class="form__error">Введите пароль</span>
                @enderror
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
            <p class="mt-5 mb-3 text-muted">© 2020-2021</p>
        </form>
    </main>
</div>
</body>
</html>
