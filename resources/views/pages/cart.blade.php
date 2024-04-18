@extends('template')
@section('content')
    <!-- hero -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1>Моя корзина</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-0">
        <div class="container">
            <div class="row mb-1 d-none d-lg-flex">
                <div class="col-lg-8">
                    <div class="row pr-6">
                        <div class="col-lg-6"><span class="eyebrow">Product</span></div>
                        <div class="col-lg-2 text-center"><span class="eyebrow">Price</span></div>
                        <div class="col-lg-2 text-center"><span class="eyebrow">Quantity</span></div>
                        <div class="col-lg-2 text-center"><span class="eyebrow">Total</span></div>
                    </div>
                </div>
            </div>
            <div class="row gutter-2 gutter-lg-4 justify-content-end">

                <div class="col-lg-8 cart-item-list">
                    @foreach($products as $product)
                        <!-- cart item -->
                        <div class="cart-item cart-product">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-6">
                                    <div class="media media-product">
                                        <a href="#!"><img src="{{$product->image}}" alt="Image"></a>
                                        <div class="media-body">
                                            <h5 class="media-title">{{$product->name}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-2 text-center">
                                    <span class="cart-item-price">
                                        <span class="price">{{$product->cost}}</span>руб.</span>
                                </div>
                                <div class="col-4 col-lg-2 text-center">
                                    <div class="counter">
                                        <span onclick="changeQuantity(this, '-')" class="counter-minus icon-minus"></span>
                                        <input data-cart-id="{{$product->cart_id}}" type='text' name='qty-1' class="counter-value" value="{{$product->quantity}}" min="1" max="10">
                                        <span onclick="changeQuantity(this, '+')" class="counter-plus icon-plus" ></span>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-2 text-center">
                                    <span class="cart-item-price">
                                        <span class="price total-price">{{$product->cost * $product->quantity}}</span>руб.
                                    </span>
                                </div>
                                <a href="#!" onclick="deleteCart({{$product->cart_id}})" class="cart-item-close"><i class="icon-x"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-4">
                    <div class="card card-data bg-light">
                        <div class="card-header py-2 px-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="fs-18 mb-0">Итог</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="card-footer py-2">
                            <ul class="list-group list-group-minimal">
                                <li class="list-group-item d-flex justify-content-between align-items-center text-dark fs-18">
                                    Итого:
                                    <span id="resultPrice">$418</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="checkout.html" class="btn btn-lg btn-primary btn-block mt-1">Checkout</a>
                </div>

            </div>
        </div>
    </section>
    @csrf
    <script>
        const _token = document.getElementsByName('_token')[0].value
        function changeQuantity(btn, changer){
            const quantityInput = btn.parentElement.getElementsByTagName('input')[0];
            const price = +btn.parentElement.parentElement.previousElementSibling.querySelector('span.price').innerText;
            const totalSpan = btn.parentElement.parentElement.nextElementSibling.querySelector('span.price');
            const cartId = quantityInput.dataset.cartId;
            const resultPrice = document.getElementById('resultPrice');
            let currentQuantity = +quantityInput.value;
            if(changer === '+' && currentQuantity < 10){
                currentQuantity = currentQuantity+1
            }else if(changer === '-' && currentQuantity>1){
                currentQuantity = currentQuantity-1
            }
            let total = price * currentQuantity;
            quantityInput.value = currentQuantity;
            totalSpan.innerText = total;
            const formData = new FormData();
            formData.append('quantity', currentQuantity);
            formData.append('_token', _token);
            formData.append('cart_id', cartId);
            fetch('/changeQuantity', {
                method: 'post',
                body: formData
            }).then(response=>response.json())
                .then(result=>{
                    console.log(result);
                })
            calcTotal();
        }
        function calcTotal(){
            const cartItems = document.querySelectorAll('.cart-product');
            let total = 0;
            cartItems.forEach( item => {
                total += +item.querySelector('.total-price').innerText;
            })
            resultPrice.innerText = total+"руб."
        }
        function deleteCart(cartId){
            const formData = new FormData();
            formData.append('cart_id', cartId);
            formData.append('_token', _token);
            fetch('/deleteCart', {
                method: 'post',
                body: formData
            }).then(response=>response.json())
                .then(result=>{
                    if(result.result == "success")
                        location.reload();
                })
        }
        calcTotal()
    </script>
@endsection
