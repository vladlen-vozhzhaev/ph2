@extends('template')
@section('content')
    <!-- hero -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="image image-overlay image-zoom" style="background-image:url(assets/images/background-1.jpg)"></div>
                <div class="container">
                    <div class="row align-items-center vh-100">
                        <div class="col-lg-8 text-white" data-swiper-parallax-x="-100%">
                            <h1 class="display-1 mt-1 mb-3 font-weight-light">Fashion Week <b class="d-block">Lookbook '19</b></h1>
                            <a href="listing-full.html" class="btn btn-sm btn-white btn-action">Shop Now <span class="icon-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="image image-overlay image-zoom" style="background-image:url(assets/images/background-2.jpg)"></div>
                <div class="container">
                    <div class="row align-items-end align-items-center vh-100">
                        <div class="col-lg-8 text-white" data-swiper-parallax-x="-100%">
                            <h1 class="display-1 mb-2 font-weight-light">Brand New <b>Sunglasses</b></h1>
                            <a href="listing-full.html" class="btn btn-sm btn-white btn-action">Shop Now <span class="icon-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-footer">
            <div class="container">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6">
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="col-lg-6 text-right">
                        <div class="swiper-navigation">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- latest products -->
    <section>
        <div class="container">
            <div class="row gutter-1 align-items-end">
                <div class="col-md-6">
                    <h2>Featured Products</h2>
                </div>
                <div class="col-md-6 text-md-right">
                    <ul class="nav nav-tabs lavalamp" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Best Sellers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New Arrivals</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <div class="row gutter-2 gutter-md-3">

                                <div class="col-6 col-lg-4">
                                    <div class="product">
                                        <figure class="product-image">
                                            <a href="product-classic.html">
                                                <img src="assets/images/demo/product-15.jpg" alt="Image">
                                                <img src="assets/images/demo/product-15-2.jpg" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-classic.html">Original Wool Herringbone Overshirt</a></h3>
                                            <div class="product-price">
                                                <span>$183</span>
                                                <span class="product-action">
                            <a href="#!">Add to cart</a>
                          </span>
                                            </div>
                                            <a href="#!" class="product-like"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <div class="product">
                                        <figure class="product-image">
                                            <span class="product-promo bg-red">sale</span>
                                            <a href="product-classic.html">
                                                <img src="assets/images/demo/product-16.jpg" alt="Image">
                                                <img src="assets/images/demo/product-16-2.jpg" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-classic.html">Black Chadwick Sandals</a></h3>
                                            <div class="product-price">
                                                <span>$176</span>
                                                <span class="product-action">
                            <a href="#!">Add to cart</a>
                          </span>
                                            </div>
                                            <a href="#!" class="product-like"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <div class="product">
                                        <figure class="product-image">
                                            <a href="product-classic.html">
                                                <img src="assets/images/demo/product-17.jpg" alt="Image">
                                                <img src="assets/images/demo/product-17-2.jpg" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-classic.html">Navy Lind Wax Sweatshirt</a></h3>
                                            <div class="product-price">
                                                <span>$101</span>
                                                <span class="product-action">
                            <a href="#!">Add to cart</a>
                          </span>
                                            </div>
                                            <a href="#!" class="product-like"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <div class="product">
                                        <figure class="product-image">
                                            <a href="product-classic.html">
                                                <img src="assets/images/demo/product-18.jpg" alt="Image">
                                                <img src="assets/images/demo/product-18-2.jpg" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-classic.html">Black Karlo Backpack</a></h3>
                                            <div class="product-price">
                                                <span>$88</span>
                                                <span class="product-action">
                            <a href="#!">Add to cart</a>
                          </span>
                                            </div>
                                            <a href="#!" class="product-like"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="product">
                                        <figure class="product-image">
                                            <a href="product-classic.html">
                                                <img src="assets/images/demo/product-19.jpg" alt="Image">
                                                <img src="assets/images/demo/product-19-2.jpg" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-classic.html">Light Marl Grey Davis Polo</a></h3>
                                            <div class="product-price">
                                                <span>$107</span>
                                                <span class="product-action">
                            <a href="#!">Add to cart</a>
                          </span>
                                            </div>
                                            <a href="#!" class="product-like"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="product">
                                        <figure class="product-image">
                                            <a href="product-classic.html">
                                                <img src="assets/images/demo/product-20.jpg" alt="Image">
                                                <img src="assets/images/demo/product-20-2.jpg" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-classic.html">Green Organic Cotton Hoodie</a></h3>
                                            <div class="product-price">
                                                <span>$95</span>
                                                <span class="product-action">
                            <a href="#!">Add to cart</a>
                          </span>
                                            </div>
                                            <a href="#!" class="product-like"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="product">
                                        <figure class="product-image">
                                            <span class="product-promo">-25%</span>
                                            <a href="product-scroll.html">
                                                <img src="assets/images/demo/product-21.jpg" alt="Image">
                                                <img src="assets/images/demo/product-21-2.jpg" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-scroll.html">Peach Low Curve Iceman Trimix Sneakers</a></h3>
                                            <div class="product-price">
                                                <span>$271</span>
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
                        <div class="tab-pane fade" id="profile" role="tabpanel">
                            <div class="row gutter-2 gutter-md-3">

                                <div class="col-6 col-lg-4">
                                    <div class="product">
                                        <figure class="product-image">
                                            <a href="product-scroll.html">
                                                <img src="assets/images/demo/product-6.jpg" alt="Image">
                                                <img src="assets/images/demo/product-6-2.jpg" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-scroll.html">Grey Pendant Bell Lamp</a></h3>
                                            <div class="product-price">
                                                <span>$258</span>
                                                <span class="product-action">
                            <a href="#!">Add to cart</a>
                          </span>
                                            </div>
                                            <a href="#!" class="product-like"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4">
                                    <div class="product">
                                        <figure class="product-image">
                                            <a href="product-masonry.html">
                                                <img src="assets/images/demo/product-3.jpg" alt="Image">
                                                <img src="assets/images/demo/product-3-2.jpg" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-masonry.html">Black IC Pendant Light</a></h3>
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

                                <div class="col-6 col-lg-4">
                                    <div class="product">
                                        <figure class="product-image">
                                            <span class="product-promo">-25%</span>
                                            <a href="product-modern.html">
                                                <img src="assets/images/demo/product-4.jpg" alt="Image">
                                                <img src="assets/images/demo/product-4-2.jpg" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-modern.html">Red Analog Magazine Rack</a></h3>
                                            <div class="product-price">
                                                <span>$120</span>
                                                <span class="product-action">
                            <a href="#!">Add to cart</a>
                          </span>
                                            </div>
                                            <a href="#!" class="product-like"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <div class="product">
                                        <figure class="product-image">
                                            <div class="owl-carousel" data-nav="true" data-loop="true">
                                                <a href="product-scroll.html">
                                                    <img src="assets/images/demo/product-2.jpg" alt="Image">
                                                </a>
                                                <a href="product-scroll.html">
                                                    <img src="assets/images/demo/product-2-2.jpg" alt="Image">
                                                </a>
                                                <a href="product-scroll.html">
                                                    <img src="assets/images/demo/product-2-3.jpg" alt="Image">
                                                </a>
                                            </div>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-scroll.html">Dark Stained NY11 Dining Chair</a></h3>
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

                                <div class="col-6 col-lg-3">
                                    <div class="product">
                                        <figure class="product-image">
                                            <a href="product-promo.html">
                                                <img src="assets/images/demo/product-5.jpg" alt="Image">
                                                <img src="assets/images/demo/product-5-2.jpg" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-promo.html">Black Piani Table Lamp</a></h3>
                                            <div class="product-price">
                                                <span>$290</span>
                                                <span class="product-action">
                            <a href="#!">Add to cart</a>
                          </span>
                                            </div>
                                            <a href="#!" class="product-like"></a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-6 col-lg-3">
                                    <div class="product">
                                        <figure class="product-image">
                                            <a href="product-scroll.html">
                                                <img src="assets/images/demo/product-1.jpg" alt="Image">
                                                <img src="assets/images/demo/product-1-2.jpg" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-scroll.html">Fawn Wool / Natural Mammoth Chair </a></h3>
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

                                <div class="col-6 col-lg-3">
                                    <div class="product">
                                        <figure class="product-image">
                                            <a href="product-classic.html">
                                                <img src="assets/images/demo/product-7.jpg" alt="Image">
                                                <img src="assets/images/demo/product-7-2.jpg" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="product-meta">
                                            <h3 class="product-title"><a href="product-classic.html">Garnet Must Sofa</a></h3>
                                            <div class="product-price">
                                                <span>$4,668</span>
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
            <div class="row">
                <div class="col text-center">
                    <a href="#!" class="btn btn-outline-secondary">Load More</a>
                </div>
            </div>
        </div>
    </section>
@endsection
