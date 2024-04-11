@extends('template')
@section('content')
    <!-- breadcrumbs -->
    <section class="breadcrumbs bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- product -->
    <section class="hero bg-light pt-5">
        <div class="container">
            <div class="row gutter-2 gutter-md-4 justify-content-between">

                <div class="col-lg-7">
                    <div class="row gutter-1 justify-content-between">
                        <div class="col-lg-10 order-lg-2">
                            <div class="owl-carousel gallery" data-slider-id="1" data-thumbs="true" data-nav="true">
                                @foreach($productImages as $productImage)
                                    <figure class="equal">
                                        <a class="image" href="{{$productImage->img}}"
                                           style="background-image: url({{$productImage->img}});">
                                        </a>
                                    </figure>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-2 text-center text-lg-left order-lg-1">
                            <div class="owl-thumbs" data-slider-id="1">
                                @foreach($productImages as $productImage)
                                    <span class="owl-thumb-item"><img src="{{$productImage->img}}" alt=""></span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="item-title">{{$product->name}}</h1>
                            <span class="item-price">{{$product->cost}} руб.</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>
                                {{$product->description}}
                            </p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Color</label>
                                <div class="btn-group-toggle btn-group-square btn-group-colors" data-toggle="buttons">
                                    <label class="btn active text-red">
                                        <input type="radio" name="options" id="option1-2" checked>
                                    </label>
                                    <label class="btn text-blue">
                                        <input type="radio" name="options" id="option2-2">
                                    </label>
                                    <label class="btn text-yellow">
                                        <input type="radio" name="options" id="option3-2">
                                    </label>
                                    <label class="btn text-green">
                                        <input type="radio" name="options" id="option4-2">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <a href="#!" class="btn btn-block btn-lg btn-primary">Add to Cart</a>
                        </div>
                        <div class="col-12 mt-1">
                            <ul class="nav nav-actions">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Add to wishlist</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Share this product</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#">Facebook</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Twitter</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
