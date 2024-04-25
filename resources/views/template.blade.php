<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <link rel="stylesheet" href="/assets/css/vendor.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />

    <title>Contact Us</title>
</head>
<body>

<!-- header -->
<header class="header header-dark bg-dark header-sticky">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a href="/" class="navbar-brand order-1 order-lg-2"><img src="/assets/images/logo.svg" alt="Logo"></a>
                <button class="navbar-toggler order-2" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3 order-lg-1" id="navbarMenu">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="/">
                                Главная
                            </a>
                        </li>
                        {{--<li class="nav-item">
                            <a class="nav-link" href="/shop">
                                Каталог
                            </a>
                        </li>--}}
                    </ul>
                </div>

                <div class="collapse navbar-collapse order-4 order-lg-3" id="navbarMenu2">
                    <ul class="navbar-nav ml-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/profile">Личный кабинет</a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="post" id="logoutForm">@csrf</form>
                                <a class="nav-link" href="#" onclick="logoutForm.submit(); return false;">Выход</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Войти</a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a data-bs-toggle="modal" data-bs-target="#cart" class="nav-link"><span>Корзина</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

@yield('content')

<!-- footer -->
<footer class="bg-dark text-white py-0">
    <div class="container">
        <div class="row separated">
            <div class="col-lg-6 py-10">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="eyebrow mb-2"> Навигация</h4>
                        <ul class="list-group list-group-columns">
                            <li class="list-group-item"><a href="/">Главная</a></li>
                            <li class="list-group-item"><a href="/shop">Каталог</a></li>
                            <li class="list-group-item"><a href="/login">Авторизация</a></li>
                            <li class="list-group-item"><a href="/cart">Корзина</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 py-10">
                <div class="row justify-content-end">
                    <div class="col-lg-10">
                        <h4 class="eyebrow mb-2">Наши социальные сети</h4>
                        <nav class="nav nav-icons">
                            <a class="nav-link" href="#!"><i class="icon-facebook-o"></i></a>
                            <a class="nav-link" href="#!"><i class="icon-twitter-o"></i></a>
                            <a class="nav-link" href="#!"><i class="icon-youtube-o"></i></a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- cart -->
<div class="modal fade sidebar" id="cart" tabindex="-1" role="dialog" aria-labelledby="cartLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartLabel">Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row gutter-3" id="cartList">

                </div>

            </div>
            <div class="modal-footer">
                <div class="container-fluid">
                    <div class="row gutter-0">
                        <div class="col d-none d-md-block">
                            <a href="/cart" class="btn btn-lg btn-block btn-secondary">Перейти к корзине</a>
                        </div>
                        <div class="col">
                            <a href="checkout.html" class="btn btn-lg btn-block btn-primary">Заказать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/vendor.min.js"></script>
<script src="/assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<script>
    const cartList = document.getElementById('cartList');
    const myModalEl = document.getElementById('cart')
    myModalEl.addEventListener('show.bs.modal', event => {
        getCart();
    })

    function getCart(){
        fetch('/getCart')
            .then(response=>response.json())
            .then(result=>{
                cartList.innerHTML = "";
                result.forEach(cart=>{
                    renderCartItem(cart)
                })
            })
    }

    function renderCartItem(cart){
        const col12 = document.createElement('div');
        const cartItem = document.createElement('div');
        const row = document.createElement('div');
        const colLg9 = document.createElement('div');
        const colLg3 = document.createElement('div');
        const deleteBtn = document.createElement('a');
        const mediaProduct = document.createElement('div');
        const img = document.createElement('img');
        const mediaBody = document.createElement('div');
        col12.classList.add('col-12');
        cartItem.classList.add('cart-item', 'cart-item-sm');
        row.classList.add('row', 'align-items-center');
        colLg9.classList.add('col-lg-9');
        colLg3.classList.add('col-lg-3', 'text-center', 'text-lg-right');
        colLg3.innerHTML = `<span class="cart-item-price">${cart.cost}руб.</span>`;
        deleteBtn.classList.add('cart-item-close');
        deleteBtn.innerHTML = `<i class="icon-x"></i>`;
        mediaProduct.classList.add('media', 'media-product');
        img.src = cart.image;
        mediaBody.classList.add('media-body');
        mediaBody.innerHTML = `<h5 class="media-title">${cart.name}</h5>`;
        mediaProduct.append(img, mediaBody);
        colLg9.append(mediaProduct);
        row.append(colLg9, colLg3, deleteBtn);
        cartItem.append(row);
        col12.append(cartItem);
        cartList.append(col12);
        deleteBtn.onclick = ()=>{
            const token = document.getElementsByName('_token')[0].value;
            const cartId = cart.cartId;
            const formData = new FormData();
            formData.append('cart_id', cartId);
            formData.append('_token', token);
            fetch('/deleteCart', {
                method: 'post',
                body:formData
            }).then(response=>response.json())
                .then(result=>{
                    if(result.result === 'success'){
                        getCart();
                    }
                })
        }
    }
</script>
</body>
</html>
