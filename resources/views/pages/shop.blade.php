@extends('template')
@section('content')
    <!-- latest products -->
    <section>
        <div class="container">
            <div class="row gutter-1 align-items-end">
                <div class="col-md-6">
                    <h2>Featured Products</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <div class="row gutter-2 gutter-md-3">
                                @foreach($products as $product)
                                    <div class="col-6 col-lg-3">
                                        <div class="product">
                                            <figure class="product-image">
                                                <a href="/shop/{{$product->id}}">
                                                    <img src="{{$product->images[0]->img}}" alt="Image">
                                                    <img src="{{$product->images[1]->img}}" alt="Image">
                                                </a>
                                            </figure>
                                            <div class="product-meta">
                                                <h3 class="product-title"><a href="/shop/{{$product->id}}">{{$product->name}}</a></h3>
                                                <div class="product-price">
                                                    <span>{{$product->cost}}₽</span>
                                                    <span class="product-action">
                                                    <a href="#!">Add to cart</a>
                                                  </span>
                                                </div>
                                                <a href="#!" class="product-like"></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <a href="#!" class="btn btn-outline-secondary">Load More</a>
                </div>
            </div>
        </div>
    </section>
@endsection
