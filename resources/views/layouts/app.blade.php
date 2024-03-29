<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Спорт - это жизнь!</title>
    <link rel="icon" href="{{ asset('img/favicon.svg') }}">
    <link href="css/main.css" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__wrap">
                <ul class="header__menu">
                    <li><a class="header-menu__link active" href="#" data-page="home-page">Главная</a></li>
                    <li><a class="header-menu__link" href="#" data-page="about-page">Обо мне</a></li>
                    <li><a class="header-menu__link" href="#" data-page="course-page">Курсы</a></li>
                    @if(!Auth::check())
                    <li><a class="header-menu__link" href="{{ route('login_form') }}">Войти</a></li>
                    <li><a class="header-menu__link" href="{{ route('signup_form') }}">Регистрация</a></li>
                    @else
                    <li><a class="header-menu__link" href="/user">Кабинет</a></li>
                    <li><a class="header-menu__link" href="/logout">Выйти</a></li>
                    @endif
                </ul>
                <div class="header__mobile-menu-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="text-center">© <span id="curryear"></span> Физиотерапевт Илья Щербаков. Сайт создан <a
            href="https://t.me/kekovina">@kekovina</a> и <a
            href="https://t.me/MorozovMike">@MorozovMike</a></footer>
    <div class="overlay"></div>
    <div class="header__menu--mobile">
        <a class="header-menu__link" href="#" data-page="home-page">Главная</a>
        <a class="header-menu__link" href="#" data-page="about-page">Обо мне</a>
        <a class="header-menu__link" href="#" data-page="course-page">Курсы</a>
        <a class="header-menu__link" href="#" data-page="reviews-page">Отзывы</a>
        @if(!Auth::check())
            <a class="header-menu__link" href="/login">Войти</a>
            <a class="header-menu__link" href="/signup">Регистрация</a>
        @else
            <a class="header-menu__link" href="/user">Кабинет</a>
        @endif
    </div>
</body>
<script src="js/main.js"></script>

</html>
