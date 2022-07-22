@extends('layout')

@section('title', 'Главная')

@section('page-content')

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Редактирование профиля</h2>
            </div>

            <div class="container text-center ">
                <div class="row justify-content-center ">
                    <form class="needs-validation" novalidate=""
                          action="{{route('profile')}}"
                          method="post"
                          autocomplete="off">
                        @csrf
                        <div class="row g-3 col-4 offset-4">
                            <div class="col-12">
                                <label for="username" class="form-label">Login</label>
                                <input type="text" class="form-control" id="login" name="login" placeholder="login" required="" value="{{Auth::user()->login}}">
                                @error('login')
                                <span class="form__error">Введите Login</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="{{old('email') ?? Auth::user()->email}}">
                                @error('email')
                                <span class="form__error">Введите Email</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Password</label>
                                <input type="password" class="form-control" id="address" name="password" placeholder="Password" required="">
                                @error('password')
                                <span class="form__error">Введите Password</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Balance</label>
                                <input type="text" class="form-control" id="balance" name="balance" placeholder="Balance" required="" readonly value="{{Auth::user()->balance}}">
                                @error('balance')
                                <span class="form__error">Введите </span>
                                @enderror
                            </div>

                            <hr class="my-4">
                            <button class="w-100 btn btn-primary btn-lg " type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

@endsection
