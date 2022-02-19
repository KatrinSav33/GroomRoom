@extends('welcome')

@section('content')
    @error('field')
    <div class="alert alert-danger text-center">{{$message}}</div>
    @enderror
    <form method="POST">
        <p>Авторизация</p>
        @csrf
        <div class="mb-3">
            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="inputLogin" aria-describedby="inputLoginValidation" placeholder="Логин">
            @error('login')
            <div id="inputLoginValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" aria-describedby="inputPasswordValidation" placeholder="Пароль">
            @error('password')
            <div id="inputPasswordValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Вход</button>
    </form>
    <div class="register-transit">
        <p>У вас ещё нет аккаунта?</p>
        <a href="{{route('register')}}">Зарегистрироваться</a>
    </div>
@endsection
