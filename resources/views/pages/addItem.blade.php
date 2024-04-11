@extends('template')
@section('content')
    <section class="hero">
        <div class="container my-3">
            <h2 class="text-center my-3">Добавление товара</h2>
            <div class="col-sm-6 mx-auto">
                <form action="/addItem" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Название товара">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="cost" placeholder="Цена">
                    </div>
                    <div class="mb-3">
                        <textarea name="description" class="form-control" placeholder="Описание товара"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Изображения товара (до 3х штук)</label>
                        <input name="images[]" type="file" class="form-control" multiple>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control btn btn-primary" value="Добавть товар">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
