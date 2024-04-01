<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
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
                <input type="submit" class="form-control btn btn-primary" value="Добавть товар">
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
