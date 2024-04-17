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
                        <div class="cart-item">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-6">
                                    <div class="media media-product">
                                        <a href="#!"><img src="assets/images/demo/product-4.jpg" alt="Image"></a>
                                        <div class="media-body">
                                            <h5 class="media-title">{{$product->name}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-2 text-center">
                                    <span class="cart-item-price">{{$product->cost}}руб.</span>
                                </div>
                                <div class="col-4 col-lg-2 text-center">
                                    <div class="counter">
                                        <span class="counter-minus icon-minus" field='qty-1'></span>
                                        <input type='text' name='qty-1' class="counter-value" value="2" min="1" max="10">
                                        <span class="counter-plus icon-plus" field='qty-1'></span>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-2 text-center">
                                    <span class="cart-item-price">{{$product->cost}}руб.</span>
                                </div>
                                <a href="#!" class="cart-item-close"><i class="icon-x"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-4">
                    <div class="card card-data bg-light">
                        <div class="card-header py-2 px-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="fs-18 mb-0">Order Summary</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-minimal">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Subtotal
                                    <span>$418</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Shipping
                                    <span>Free</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="" class="text-primary action underline">Add coupon code</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer py-2">
                            <ul class="list-group list-group-minimal">
                                <li class="list-group-item d-flex justify-content-between align-items-center text-dark fs-18">
                                    Total
                                    <span>$418</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="checkout.html" class="btn btn-lg btn-primary btn-block mt-1">Checkout</a>
                </div>

            </div>
        </div>
    </section>
@endsection
