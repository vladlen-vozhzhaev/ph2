@extends('template')
@section('content')
    <section class="hero">
        <div class="container my-5">
            <h2 class="text-center my-3">Регистрация на сайте</h2>
            <div class="col-sm-6 mx-auto">
                <form action="/register" method="POST">
                    @csrf
                    <p>Уже зарегистрированы? <a href="/login">Авторизуйтесь</a></p>
                    <div class="mb-3">
                        <input name="name" type="text" class="form-control" placeholder="Имя">
                    </div>
                    <div class="mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Пароль">
                    </div>
                    <div class="mb-3">
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Пароль ещё раз">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control btn btn-primary" value="Зарегистрироваться">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
