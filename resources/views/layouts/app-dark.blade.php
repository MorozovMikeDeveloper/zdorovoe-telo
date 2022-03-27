<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
    <link href="/css/main.css" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__wrap">
                <ul class="header__menu header__menu--dark">
                    <li><a class="header-menu__link" href="/">Главная</a></li>
                    <li><a class="header-menu__link" href="/login">Войти</a></li>
                    <li><a class="header-menu__link" href="/signup">Регистрация</a></li>
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
    <footer class="text-center">© <span id="curryear"></span> Физиотерапевт Илья Денисов. Сайт создан <a
            href="https://t.me/kekovina">@kekovina</a></footer>
    <div class="overlay"></div>
    <div class="header__menu--mobile"><a class="header-menu__link" href="#" data-page="home-page">Главная</a> <a
            class="header-menu__link" href="#" data-page="about-page">Обо мне</a> <a class="header-menu__link" href="#"
            data-page="course-page">Курсы</a> <a class="header-menu__link" href="#" data-page="reviews-page">Отзывы</a>
        <a class="header-menu__link header-menu__link--auth" href="#" data-page="contact-page">Кабинет</a>
    </div>
</body>
<script src="/js/main.js"></script>

</html>
