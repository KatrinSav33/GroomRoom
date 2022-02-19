@extends('welcome')

@section('content')
    <div class="header">
        <div class="welcome">
            <p class="welcome-groom">Добро пожаловать на сайт GroomRoom!</p>
            <p class="welcome-description"> В руках опытных специалистов ваш питомец не испытает и капли волнения во время бьюти-процедур. Подайте заявку для записи вашего питомца на процедуру.</p>
            <div class="welcome-login"><a href="{{route('login')}}">Подать заявку</a></div>
        </div>
    </div>

    <div class="main">
        <p>НАШИ РАБОТЫ</p>
        <div class="work-card">
            <div class="work-card-row">
                <img src="public/assets/image/1.jpg" alt="work">
                <img src="public/assets/image/1.jpg" alt="work">
            </div>
            <div class="work-card-row">
                <img src="public/assets/image/1.jpg" alt="work">
                <img src="public/assets/image/1.jpg" alt="work">
            </div>
        </div>
    </div>
@endsection
