@extends('welcome')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">Регистрация выполнена успешно</div>
    @endif
    <form method="POST">
        @csrf
        <p>Регистрация</p>
        <div class="mb-3">
            <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" id="inputFull_name" aria-describedby="inputFull_nameValidation" placeholder="ФИО">
            @error('full_name')
            <div id="inputFull_nameValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="inputLogin" aria-describedby="inputLoginValidation" placeholder="Логин">
            @error('login')
            <div id="inputLoginValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" aria-describedby="inputEmailValidation" placeholder="E-mail">
            @error('email')
            <div id="inputEmailValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" aria-describedby="inputPasswordValidation" placeholder="Пароль">
            @error('password')
            <div id="inputPasswordValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="password" name="password_confirmation"  class="form-control" id="inputConfirmedPassword" placeholder="Повторите пароль">
        </div>
        <div class="personal-info">
            <input type="checkbox" name="personal_info" class=" @error('personal_info') is-invalid @enderror" id="inputPersonal_info" aria-describedby="inputPersonal_infoValidation">
            <label for="inputPersonal_info" class="form-label">Я даю согласие на обработку персональных данных</label>
            @error('personal_info')
            <div id="inputPersonal_infoValidation" class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
@endsection
