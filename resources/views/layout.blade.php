<!doctype html>
<html lang="ru">
    <x-head></x-head>
<body>
    <div class="page-wrapper">
        <x-header></x-header>
        <main class="container">
            @yield('page-content')
            <x-footer></x-footer>
        </main>
    </div>
    @yield('scripts')
</body>
</html>
