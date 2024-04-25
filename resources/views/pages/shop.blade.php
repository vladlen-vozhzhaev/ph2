@extends('template')
@section('content')
    <!-- latest products -->
    <section>
        <div class="container">
            <div class="row gutter-1 align-items-end">
                <div class="col-md-6 my-5">
                    <h2>Каталог</h2>
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
                                                        <form>
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                                            <a onclick="addCart(this.parentElement); return false;" href="#">Добавить в корзину</a>
                                                        </form>
                                                  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function addCart(form){
            const addCartBtn = form.getElementsByTagName('a')[0];
            const formData = new FormData(form);
            fetch('/addCart', {
                method: 'POST',
                body: formData
            }).then(response=>response.json())
                .then(result=>{
                    console.log(result);
                    addCartBtn.innerText = "В корзине";
                });
        }
    </script>
@endsection
