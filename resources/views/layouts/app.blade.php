<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Document</title>
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
                    <li><a class="header-menu__link" href="#" data-page="reviews-page">Отзывы</a></li>
                    <li><a class="header-menu__link header-menu__link--auth" href="#">Кабинет</a></li>
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
        <a class="header-menu__link header-menu__link--auth" href="#" data-page="contact-page">Кабинет</a></div>
    <div class="modal">
        <div class="d-flex flex-column w-100 align-items-center modal-body">
            <div class="modal-alert"></div>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-x-lg close-modal" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
                <path fill-rule="evenodd"
                    d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
            </svg>
            <div class="signup-block">
                <form action="/signup" method="post" id="signup-form">
                @csrf
                    <h3>Регистрация</h3>
                    <div class="form-group my-2">
                        <input id="my-input" class="form-control" type="text" name="email" placeholder="Ваш email">
                    </div>
                    <div class="form-group my-2">
                        <input id="my-input" class="form-control" type="text" name="password" placeholder="Пароль">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary w-100" style="padding:8px 10px" id="signup-btn">Создать аккаунт</button>
                    </div>
                </form>
            </div>
            <div class="separator"></div>
            <div class="signup-block">
                <form action="/login" method="post" id="login-form">
                    @csrf
                    <h3>Вход в кабинет</h3>
                    <div class="form-group my-2">
                        <input id="my-input" class="form-control" type="text" name="email" placeholder="Логин">
                    </div>
                    <div class="form-group my-2">
                        <input id="my-input" class="form-control" type="text" name="password" placeholder="Пароль">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary w-100" style="padding:8px 10px" id="login-btn">Войти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="js/main.js"></script>

</html>
