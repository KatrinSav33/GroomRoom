<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ГрумRoom</title>
    <link rel="stylesheet" href="/resources/css/app.css">
</head>
<body>
    <div class="container">
        <img src="../../public/assets/image/logo_groom.png" alt="">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{route('index')}}">Главная</a>
                    @guest()
                        <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                        <a class="nav-link" href="{{route('login')}}">Авторизация</a>
                    @endguest
                    @auth()
                        @if(Auth::user()->role===1)
                                <a class="nav-link" href="{{route('admin')}}">Аккаунт</a>
                                <a class="nav-link" href="{{route('editCategory')}}">Категории</a>
                        @endif
                        @if(Auth::user()->role===0)
                                <a class="nav-link" href="{{route('create')}}">Создать заявку</a>
                                <a class="nav-link" href="{{route('account')}}">Аккаунт</a>
                        @endif
                            <a class="nav-link" href="{{route('logout')}}">Выход</a>
                    @endauth
                </div>
    </div>
@yield('content')
</body>
</html>
