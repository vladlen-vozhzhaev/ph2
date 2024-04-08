@extends('template')
@section('content')
    <section class="hero">
        <div class="container my-5">
            <h2 class="text-center my-3">Авторизация на сайте</h2>
            <div class="col-sm-6 mx-auto">
                <form action="/login" method="POST">
                    @csrf
                    <p>Нет аккаунта? <a href="/register">Зарегистрируйтесь</a></p>
                    <div class="mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Пароль">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control btn btn-primary" value="Войти">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection


