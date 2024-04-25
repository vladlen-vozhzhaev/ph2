@extends('template')
@section('content')
    <!-- hero -->
    <section class="hero hero-small bg-purple text-white">
        <div class="container">
            <div class="row gutter-2 gutter-md-4 align-items-end">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="mb-0">{{$user->name}} {{$user->lastname}}</h1>
                </div>
            </div>
        </div>
    </section>



    <!-- listing -->
    <section class="pt-5">
        <div class="container">
            <div class="row gutter-4 justify-content-between">


                <!-- sidebar -->
                <aside class="col-lg-3">
                    <div class="nav nav-pills flex-column lavalamp" id="sidebar-1" role="tablist">
                        <a class="nav-link active" data-toggle="tab" href="#sidebar-1-1" role="tab"  aria-controls="sidebar-1" aria-selected="true">Профиль</a>
                        <a class="nav-link" data-toggle="tab" href="#sidebar-1-2" role="tab" aria-controls="sidebar-1-2" aria-selected="false">Заказы в корзине</a>
                        <a class="nav-link" data-toggle="tab" href="#sidebar-1-3" role="tab" aria-controls="sidebar-1-3" aria-selected="false">Оплаченые</a>
                        <a class="nav-link" data-toggle="tab" href="#sidebar-1-4" role="tab" aria-controls="sidebar-1-4" aria-selected="false">Завершеные</a>
                        <a class="nav-link" data-toggle="tab" href="#sidebar-1-5" role="tab" aria-controls="sidebar-1-5" aria-selected="false">Пользователи</a>
                    </div>
                </aside>
                <!-- / sidebar -->

                <!-- content -->
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col">
                            <div class="tab-content" id="myTabContent">

                                <!-- profile -->
                                <div class="tab-pane fade show active" id="sidebar-1-1" role="tabpanel" aria-labelledby="sidebar-1-1">
                                    <form action="/profile" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <h3>Personal Data</h3>
                                            </div>
                                        </div>
                                        <div class="row gutter-1">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInput1">Имя</label>
                                                    <input name="name" id="exampleInput1" type="text" class="form-control" placeholder="First name" value="{{$user->name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInput2">Фамилия</label>
                                                    <input name="lastname" id="exampleInput2" type="text" class="form-control" placeholder="Last name" value="{{$user->lastname}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInput6">Телефон</label>
                                                    <input name="phone" id="exampleInput6" type="text" class="form-control" placeholder="Telephone" value="{{$user->phone}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInput7">Email</label>
                                                    <input name="email" id="exampleInput7" type="text" class="form-control" placeholder="Email" value="{{$user->email}}">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-2 mt-6">
                                            <div class="col-12">
                                                <h3>Password</h3>
                                            </div>
                                        </div>
                                        <div class="row gutter-1">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="exampleInput8">Old Password</label>
                                                    <input name="password" id="exampleInput8" type="password" class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInput9">New Password</label>
                                                    <input name="new_password" id="exampleInput9" type="password" class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInput10">Retype New Password</label>
                                                    <input name="confirm_new_password" id="exampleInput10" type="password" class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- orders -->
                                <div class="tab-pane fade" id="sidebar-1-2" role="tabpanel" aria-labelledby="sidebar-1-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="mb-0">Заказы в корзине</h3>
                                            <span class="eyebrow">{{count($products)}} товаров</span>
                                        </div>
                                    </div>
                                    <div class="row gutter-2">
                                        @foreach($products as $product)
                                            <div class="col-12">
                                                <div class="order">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-4">
                                                            <h3 class="order-number">{{$product->name}}</h3>
                                                            <a href="/shop/{{$product->id}}" class="action eyebrow underline">Просмотр товара</a>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <span class="order-status sent">{{$product->user->name}}</span><br>
                                                            <span class="order-status sent">{{$product->user->email}}</span><br>
                                                            <span class="order-status sent">{{$product->user->phone}}</span>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <ul class="order-preview justify-content-end">
                                                                <li><a href="/shop/{{$product->id}}" title="Fawn Wool / Natural Mammoth Chair" data-toggle="tooltip" data-placement="top"><img src="{{$product->image}}" alt="Fawn Wool / Natural Mammoth Chair"></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    <div class="row">
                                        <div class="col">
                                            <ul class="pagination">
                                                <li class="page-item active"><a class="page-link" href="#!">1 <span class="sr-only">(current)</span></a></li>
                                                <li class="page-item" aria-current="page"><a class="page-link" href="#!">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#!">4</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- addresses -->
                                <div class="tab-pane fade" id="sidebar-1-3" role="tabpanel" aria-labelledby="sidebar-1-3">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-0">Addresses</h3>
                                            <span class="eyebrow">2 Entry</span>
                                        </div>
                                    </div>
                                    <div class="row gutter-2">
                                        <div class="col-md-6">
                                            <div class="card card-data">
                                                <div class="card-header card-header-options">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="card-title">Address 1</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <div class="dropdown">
                                                                <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button" class="btn btn-lg btn-secondary btn-ico"><i class="icon-more-vertical"></i></button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body w-75">
                                                    <h5 class="eyebrow text-muted">Where</h5>
                                                    <p class="card-text">1620 East Ayre Str
                                                        Suite M3115662
                                                        Wilmington, DE 19804
                                                        United States</p>
                                                    <h5 class="eyebrow text-muted">To</h5>
                                                    <p class="card-text">Michael Doe</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card card-data">
                                                <div class="card-header card-header-options">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="card-title">Address 2</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <div class="dropdown">
                                                                <button id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button" class="btn btn-lg btn-secondary btn-ico"><i class="icon-more-vertical"></i></button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body w-75">
                                                    <h5 class="eyebrow text-muted">Where</h5>
                                                    <p class="card-text">1620 East Ayre Str
                                                        Suite M3115662
                                                        Wilmington, DE 19804
                                                        United States</p>
                                                    <h5 class="eyebrow text-muted">To</h5>
                                                    <p class="card-text">Michael Doe</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <h3>New Address</h3>
                                        </div>
                                    </div>
                                    <div class="row gutter-1">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input id="city" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cardNumber">Address</label>
                                                <input id="cardNumber" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <div class="form-group">
                                                <label for="cardNumber2">Nr</label>
                                                <input id="cardNumber2" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <div class="form-group">
                                                <label for="cardNumber3">Ap</label>
                                                <input id="cardNumber3" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <a href="#!" class="btn btn-primary">Add</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- payments -->
                                <div class="tab-pane fade" id="sidebar-1-4" role="tabpanel" aria-labelledby="sidebar-1-4">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-0">Payments</h3>
                                            <span class="eyebrow">1 Entry</span>
                                        </div>
                                    </div>
                                    <div class="row gutter-2 mb-6">
                                        <div class="col-md-6">
                                            <div class="card card-data">
                                                <div class="card-header card-header-options">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="card-title">Visa</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <div class="dropdown">
                                                                <button id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button" class="btn btn-lg btn-secondary btn-ico"><i class="icon-more-vertical"></i></button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body w-75">
                                                    <h5 class="eyebrow text-muted">Paymeny Method</h5>
                                                    <p class="card-text"><b>Visa</b> ends in 1537 Exp: 8/2022</p>
                                                    <h5 class="eyebrow text-muted">Last Payment</h5>
                                                    <p class="card-text"><b>$7.00</b> successful on 04/14/2019</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card card-data">
                                                <div class="card-header card-header-options">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="card-title">Paypal</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <div class="dropdown">
                                                                <button id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button" class="btn btn-lg btn-secondary btn-ico"><i class="icon-more-vertical"></i></button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#!">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#!">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body w-75">
                                                    <h5 class="eyebrow text-muted">Mail</h5>
                                                    <p class="card-text">payment@webuildthemes.com</p>
                                                    <h5 class="eyebrow text-muted">Last Payment</h5>
                                                    <p class="card-text"><b>$19.00</b> successful on 05/15/2019</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-0">New Payment Method</h3>
                                        </div>
                                    </div>
                                    <div class="row gutter-1">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="cardNumber">Card Number</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cardNumber">Name on Card</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <div class="form-group">
                                                <label for="cardNumber">Month</label>
                                                <select class="custom-select">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <div class="form-group">
                                                <label for="cardNumber">Year</label>
                                                <select class="custom-select">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <a href="#!" class="btn btn-primary">Add</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- wishlist -->
                                <div class="tab-pane fade" id="sidebar-1-5" role="tabpanel" aria-labelledby="sidebar-1-5">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-0">Wishlist</h3>
                                            <span class="eyebrow">3 Product</span>
                                        </div>
                                    </div>
                                    <div class="row gutter-2">
                                        <div class="col-md-6 col-lg-4">
                                            <div class="product">
                                                <div class="product-options">
                                                    <select id="inputState" class="custom-select">
                                                        <option selected>Color</option>
                                                        <option>Black</option>
                                                        <option>Blue</option>
                                                    </select>
                                                    <select id="inputState2" class="custom-select">
                                                        <option selected>Size</option>
                                                        <option>Large</option>
                                                        <option>Small</option>
                                                    </select>
                                                </div>
                                                <figure class="product-image">
                                                    <a href="#!" class="btn btn-ico btn-rounded btn-white"><i class="icon-x"></i></a>
                                                    <a href="#!">
                                                        <img src="assets/images/demo/product-1.jpg" alt="Image">
                                                        <img src="assets/images/demo/product-1-2.jpg" alt="Image">
                                                    </a>
                                                </figure>
                                                <div class="product-meta">
                                                    <h3 class="product-title"><a href="#!">Fawn Wool / Natural Mammoth Chair </a></h3>
                                                    <div class="product-price">
                                                        <span>$2,268</span>
                                                        <span class="product-action">
                                <a href="#!">Add to cart</a>
                              </span>
                                                    </div>
                                                    <a href="#!" class="product-like"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="product">
                                                <div class="product-options">
                                                    <select id="inputState3" class="custom-select">
                                                        <option selected>Color</option>
                                                        <option>Black</option>
                                                        <option>Blue</option>
                                                    </select>
                                                    <select id="inputState4" class="custom-select">
                                                        <option selected>Size</option>
                                                        <option>Large</option>
                                                        <option>Small</option>
                                                    </select>
                                                </div>
                                                <figure class="product-image">
                                                    <a href="#!" class="btn btn-ico btn-rounded btn-white"><i class="icon-x"></i></a>
                                                    <div class="owl-carousel" data-nav="true" data-loop="true">
                                                        <a href="#!">
                                                            <img src="assets/images/demo/product-2.jpg" alt="Image">
                                                        </a>
                                                        <a href="#!">
                                                            <img src="assets/images/demo/product-2-2.jpg" alt="Image">
                                                        </a>
                                                        <a href="#!">
                                                            <img src="assets/images/demo/product-2-3.jpg" alt="Image">
                                                        </a>
                                                    </div>
                                                </figure>
                                                <div class="product-meta">
                                                    <h3 class="product-title"><a href="#!">Dark Stained NY11 Dining Chair</a></h3>
                                                    <div class="product-price">
                                                        <span>$504</span>
                                                        <span class="product-action">
                                <a href="#!">Add to cart</a>
                              </span>
                                                    </div>
                                                    <a href="#!" class="product-like"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="product">
                                                <div class="product-options">
                                                    <select id="inputState5" class="custom-select">
                                                        <option selected>Color</option>
                                                        <option>Black</option>
                                                        <option>Blue</option>
                                                    </select>
                                                    <select id="inputState6" class="custom-select">
                                                        <option selected>Size</option>
                                                        <option>Large</option>
                                                        <option>Small</option>
                                                    </select>
                                                </div>
                                                <figure class="product-image">
                                                    <a href="#!" class="btn btn-ico btn-rounded btn-white"><i class="icon-x"></i></a>
                                                    <a href="#!">
                                                        <img src="assets/images/demo/product-3.jpg" alt="Image">
                                                        <img src="assets/images/demo/product-3-2.jpg" alt="Image">
                                                    </a>
                                                </figure>
                                                <div class="product-meta">
                                                    <h3 class="product-title"><a href="#!">Black IC Pendant Light</a></h3>
                                                    <div class="product-price">
                                                        <span>$410</span>
                                                        <span class="product-action">
                                <a href="#!">Add to cart</a>
                              </span>
                                                    </div>
                                                    <a href="#!" class="product-like"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / content -->

            </div>
        </div>
    </section>
    <!-- listing -->
@endsection
