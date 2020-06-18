@extends('layouts.app', ['class' => 'bg-default', 'og' => 'prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#"'])
@if(Request::url() === route('category', $index->slug))
    @section('title',  $index->name.' - '. setting('site.site_seo_end_title'))
@else
    @section('title',  $index->title.' - '. setting('site.site_seo_end_title'))
@endif
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('meta')
    <link rel="canonical" href="{{config('app.url')}}">
    <meta name="description" content="{{$index->meta_description}}">
    <meta name="keywords" content="{{$index->meta_keywords}}">
    <meta property="og:title" content="@if(Request::url() === route('category', $index->slug)){{$index->name}}@else{{$index->title}}@endif" >
    <meta property="og:description" content="{{$index->meta_description}}">
    <meta property="og:site_name" content="{{ setting('site.title', config('app.name') ) }}" >
    <meta property="og:type" content="website" >
    <meta property="og:url" content="{{config('app.url')}}" >
    <meta property="og:image" content="{{config('app.url')}}/storage/{{$index->image}}" >
    @if( setting('site.twitter_card') )
    <meta name="twitter:card" content="{{ setting('site.twitter_card') }}">
    <meta name="twitter:domain" content="{{config('app.url')}}">
    @if( setting('site.twitter_site') )
    <meta name="twitter:site" content="{{'@' . setting('site.twitter_site') }}">
    <meta name="twitter:creator" content="{{'@' .setting('site.twitter_site')}}">
    @endif
    <meta name="twitter:title" content="@if(Request::url() === route('category', $index->slug)){{$index->name}}@else{{$index->title}}@endif">
    <meta name="twitter:description" content="{{$index->meta_description}}">
    <meta name="twitter:url" content="{{config('app.url')}}">
    @endif
@endsection
@section('header')
    @include('layouts.headers.header')
@endsection
@section('topmenu')
    @include('layouts.navbars.topmenu')
@endsection
@section('nav')
    @include('layouts.navbars.navbar')
@endsection
@section('content')
    <div class="main-wrapper">

        <!-- Banner Section Start -->
        <div class="banner-section section mt-40 mt-xs-20 mb-60 mb-lg-40 mb-md-40 mb-sm-40 mb-xs-20">
            <div class="container-fluid">
                <div class="row row-10">

                    <div class="col-lg-4 col-md-6 col-12 mb-20">
                        <div class="banner banner-1 content-left content-middle">

                            <a href="#" class="image"><img src="{{asset('/images/banner/banner-1.jpg')}}" alt="Banner Image"></a>

                            <div class="content">
                                <h3>Новая рубашка <br> для мальчика <br>GET 30% OFF</h3>
                                <a href="#" data-hover="ПОСМОТРЕТЬ">ПОСМОТРЕТЬ</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-20">
                        <div class="banner banner-1 content-left content-middle">

                            <a href="#" class="image"><img src="{{asset('/images/banner/banner-1.jpg')}}" alt="Banner Image"></a>

                            <div class="content">
                                <h3>Новая рубашка <br> для мальчика <br>GET 30% OFF</h3>
                                <a href="#" data-hover="ПОСМОТРЕТЬ">ПОСМОТРЕТЬ</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-20">
                        <div class="banner banner-1 content-left content-middle">

                            <a href="#" class="image"><img src="{{asset('/images/banner/banner-1.jpg')}}" alt="Banner Image"></a>

                            <div class="content">
                                <h3>Новая рубашка <br> для мальчика <br>GET 30% OFF</h3>
                                <a href="#" data-hover="ПОСМОТРЕТЬ">ПОСМОТРЕТЬ</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Banner Section End -->

        <!-- Product Section Start -->
        <div class="product-section section mb-40 mb-lg-20 mb-md-20 mb-sm-20 mb-xs-0">
            <div class="container">

                <div class="row">
                    <div class="section-title text-center col mb-30">
                        <h1>Популярные продукты</h1>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">

                        <div class="product-item">
                            <div class="product-inner">

                                <div class="image">
                                    <img src="{{asset('images/product/product-1.jpg')}}" alt="">

                                    <div class="image-overlay">
                                        <div class="action-buttons">
                                            <button>add to cart</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="content">

                                    <div class="content-left">

                                        <h4 class="title"><a href="single-product.blade.php">Tmart Baby Dress</a></h4>

                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>

                                        <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>

                                    </div>

                                    <div class="content-right">
                                        <span class="price">$25</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">

                        <div class="product-item">
                            <div class="product-inner">

                                <div class="image">
                                    <img src="../../../public/images/product/product-2.jpg" alt="">

                                    <div class="image-overlay">
                                        <div class="action-buttons">
                                            <button>add to cart</button>
                                            <button>add to wishlist</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="content">

                                    <div class="content-left">

                                        <h4 class="title"><a href="single-product.blade.php">Jumpsuit Outfits</a></h4>

                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

                                        <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                        <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                    </div>

                                    <div class="content-right">
                                        <span class="price">$09</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">

                        <div class="product-item">
                            <div class="product-inner">

                                <div class="image">
                                    <img src="../../../public/images/product/product-3.jpg" alt="">

                                    <div class="image-overlay">
                                        <div class="action-buttons">
                                            <button>add to cart</button>
                                            <button>add to wishlist</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="content">

                                    <div class="content-left">

                                        <h4 class="title"><a href="single-product.blade.php">Smart Shirt</a></h4>

                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>

                                        <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                        <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                    </div>

                                    <div class="content-right">
                                        <span class="price">$18</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">

                        <div class="product-item">
                            <div class="product-inner">

                                <div class="image">
                                    <img src="../../../public/images/product/product-4.jpg" alt="">

                                    <div class="image-overlay">
                                        <div class="action-buttons">
                                            <button>add to cart</button>
                                            <button>add to wishlist</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="content">

                                    <div class="content-left">

                                        <h4 class="title"><a href="single-product.blade.php">Kids Shoe</a></h4>

                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>

                                        <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                        <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                    </div>

                                    <div class="content-right">
                                        <span class="price">$15</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">

                        <div class="product-item">
                            <div class="product-inner">

                                <div class="image">
                                    <img src="../../../public/images/product/product-5.jpg" alt="">

                                    <div class="image-overlay">
                                        <div class="action-buttons">
                                            <button>add to cart</button>
                                            <button>add to wishlist</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="content">

                                    <div class="content-left">

                                        <h4 class="title"><a href="single-product.blade.php"> Bowknot Bodysuit</a></h4>

                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>

                                        <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                        <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                    </div>

                                    <div class="content-right">
                                        <span class="price">$12</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">

                        <div class="product-item">
                            <div class="product-inner">

                                <div class="image">
                                    <img src="../../../public/images/product/product-6.jpg" alt="">

                                    <div class="image-overlay">
                                        <div class="action-buttons">
                                            <button>add to cart</button>
                                            <button>add to wishlist</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="content">

                                    <div class="content-left">

                                        <h4 class="title"><a href="single-product.blade.php">Striped T-Shirt</a></h4>

                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>

                                        <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                        <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                    </div>

                                    <div class="content-right">
                                        <span class="price">$12</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">

                        <div class="product-item">
                            <div class="product-inner">

                                <div class="image">
                                    <img src="../../../public/images/product/product-7.jpg" alt="">

                                    <div class="image-overlay">
                                        <div class="action-buttons">
                                            <button>add to cart</button>
                                            <button>add to wishlist</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="content">

                                    <div class="content-left">

                                        <h4 class="title"><a href="single-product.blade.php">Kislen Jak Tops</a></h4>

                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

                                        <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                        <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                    </div>

                                    <div class="content-right">
                                        <span class="price">$29</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">

                        <div class="product-item">
                            <div class="product-inner">

                                <div class="image">
                                    <img src="../../../public/images/product/product-8.jpg" alt="">

                                    <div class="image-overlay">
                                        <div class="action-buttons">
                                            <button>add to cart</button>
                                            <button>add to wishlist</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="content">

                                    <div class="content-left">

                                        <h4 class="title"><a href="single-product.blade.php">Lattic Shirt</a></h4>

                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>

                                        <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
                                        <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

                                    </div>

                                    <div class="content-right">
                                        <span class="price">$08</span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div><!-- Product Section End -->

        <!-- Banner Section Start -->
        <div class="banner-section section fix mb-70 mb-lg-50 mb-md-50 mb-sm-50 mb-xs-30">
            <div class="row row-5">

                <div class="col-lg-4 col-md-6 col-12 mb-10">
                    <div class="banner banner-3">

                        <a href="#" class="image"><img src="{{asset('images/banner/banner-4.jpg')}}" alt="Banner Image"></a>

                        <div class="content" style="background-image: url(../images/banner/banner-3-shape.png)">
                            <p class="p-one mt-0 mb-0">New Arrivals</p>
                            <p class="p-two mt-0 mb-0">Up to 35% off</p>
                            <p class="p-three mt-0 mb-0">2 - 5 Years</p>
                        </div>

                        <a href="#" class="shop-link" data-hover="ПРОСМОТРЕТЬ">ПРОСМОТРЕТЬ</a>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-10">
                    <div class="banner banner-4">

                        <a href="#" class="image"><img src="{{asset('images/banner/banner-5.jpg')}}" alt="Banner Image"></a>

                        <div class="content">
                            <div class="content-inner">
                                <p class="p-one mt-0 mb-0">Online Shopping</p>
                                <p class="p-two mt-0 mb-0">Flat 25% off <br>New Trend for 2018</p>
                                <a href="#" data-hover="ПРОСМОТРЕТЬ">ПРОСМОТРЕТЬ</a>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-10">
                    <div class="banner banner-5">

                        <a href="#" class="image"><img src="{{asset('images/banner/banner-6.jpg')}}" alt="Banner Image"></a>

                        <div class="content" style="background-image: url(../images/banner/banner-5-shape.png)">
                            <p class="p-one mt-0 mb-0">New Arrivals</p>
                            <p class="p-two mt-0 mb-2">Up to 35% off</p>
                            <p class="p-two mt-0 mb-0">2 - 5 Years</p>
                        </div>

                        <a href="#" class="shop-link" data-hover="SHOP NOW">SHOP NOW</a>

                    </div>
                </div>

            </div>
        </div><!-- Banner Section End -->

        <!-- Product Section Start -->
        <div class="product-section section mb-40 mb-lg-20 mb-md-20 mb-sm-20 mb-xs-0">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 col-12 mb-40">

                        <div class="row">
                            <div class="section-title text-left col mb-30">
                                <h1>Best Deal</h1>
                                <p>Exclusive deals for you</p>
                            </div>
                        </div>

                        <div class="best-deal-slider row">

                            <div class="slide-item col">
                                <div class="best-deal-product">

                                    <div class="image"><img src="../../../public/images/product/best-deal-1.jpg" alt=""></div>

                                    <div class="content-top">

                                        <div class="content-top-left">
                                            <h4 class="title"><a href="#">2 Piece Shirt Set</a></h4>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>

                                        <div class="content-top-right">
                                            <span class="price">$13 <span class="old">$28</span></span>
                                        </div>

                                    </div>

                                    <div class="content-bottom">
                                        <div class="countdown" data-countdown="2019/06/20"></div>
                                        <a href="#" data-hover="SHOP NOW">SHOP NOW</a>
                                    </div>

                                </div>
                            </div>

                            <div class="slide-item col">
                                <div class="best-deal-product">

                                    <div class="image"><img src="../../../public/images/product/best-deal-2.jpg" alt=""></div>

                                    <div class="content-top">

                                        <div class="content-top-left">
                                            <h4 class="title"><a href="#">Kelly Shirt Set</a></h4>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>

                                        <div class="content-top-right">
                                            <span class="price">$09 <span class="old">$25</span></span>
                                        </div>

                                    </div>

                                    <div class="content-bottom">
                                        <div class="countdown" data-countdown="2019/06/20"></div>
                                        <a href="#" data-hover="SHOP NOW">SHOP NOW</a>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 col-md-6 col-12 pl-50 pl-sm-15 pl-xs-15">

                        <div class="row">
                            <div class="section-title text-left col mb-30">
                                <h1>On Sale Products</h1>
                                <p>All featured product find here</p>
                            </div>
                        </div>

                        <div class="small-product-slider row row-7">

                            <div class="col mb-40">

                                <div class="on-sale-product">
                                    <a href="single-product.blade.php" class="image"><img src="../../../public/images/product/on-sale-1.jpg" alt=""></a>
                                    <div class="content text-center">
                                        <h4 class="title"><a href="single-product.blade.php">Skily Girld Dress</a></h4>
                                        <span class="price">$19 <span class="old">$35</span></span>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col mb-40">

                                <div class="on-sale-product">
                                    <a href="single-product.blade.php" class="image"><img src="../../../public/images/product/on-sale-2.jpg" alt=""></a>
                                    <div class="content text-center">
                                        <h4 class="title"><a href="single-product.blade.php">Kelly Shirt Set</a></h4>
                                        <span class="price">$08 <span class="old">$25</span></span>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col mb-40">

                                <div class="on-sale-product">
                                    <a href="single-product.blade.php" class="image"><img src="../../../public/images/product/on-sale-3.jpg" alt=""></a>
                                    <div class="content text-center">
                                        <h4 class="title"><a href="single-product.blade.php">Sleeveless Tops</a></h4>
                                        <span class="price">$05 <span class="old">$12</span></span>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col mb-40">

                                <div class="on-sale-product">
                                    <a href="single-product.blade.php" class="image"><img src="../../../public/images/product/on-sale-4.jpg" alt=""></a>
                                    <div class="content text-center">
                                        <h4 class="title"><a href="single-product.blade.php">Babysuit Bundle</a></h4>
                                        <span class="price">$25 <span class="old">$45</span></span>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col mb-40">

                                <div class="on-sale-product">
                                    <a href="single-product.blade.php" class="image"><img src="../../../public/images/product/on-sale-5.jpg" alt=""></a>
                                    <div class="content text-center">
                                        <h4 class="title"><a href="single-product.blade.php">Xshuai Baby Frock</a></h4>
                                        <span class="price">$13 <span class="old">$28</span></span>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col mb-40">

                                <div class="on-sale-product">
                                    <a href="single-product.blade.php" class="image"><img src="../../../public/images/product/on-sale-6.jpg" alt=""></a>
                                    <div class="content text-center">
                                        <h4 class="title"><a href="single-product.blade.php">Stylish Hat</a></h4>
                                        <span class="price">$03 <span class="old">$10</span></span>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col mb-40">

                                <div class="on-sale-product">
                                    <a href="single-product.blade.php" class="image"><img src="../../../public/images/product/on-sale-7.jpg" alt=""></a>
                                    <div class="content text-center">
                                        <h4 class="title"><a href="single-product.blade.php">Aolvo Kids Munch</a></h4>
                                        <span class="price">$25 <span class="old">$35</span></span>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col mb-40">

                                <div class="on-sale-product">
                                    <a href="single-product.blade.php" class="image"><img src="../../../public/images/product/on-sale-8.jpg" alt=""></a>
                                    <div class="content text-center">
                                        <h4 class="title"><a href="single-product.blade.php">Tmart Baby Dress</a></h4>
                                        <span class="price">$48 <span class="old">$65</span></span>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div><!-- Product Section End -->

        <!-- Feature Section Start -->
        <div class="feature-section section bg-theme-two pt-65 pt-lg-55 pt-md-45 pt-sm-45 pt-xs-25 pb-65 pb-lg-55 pb-md-45 pb-sm-45 pb-xs-25 fix" style="background-image: url(../../../public/images/pattern/pattern-dot.png);">
            <div class="container">
                <div class="feature-wrap row justify-content-between">

                    <div class="col-md-4 col-12 mt-15 mb-15">
                        <div class="feature-item text-center">

                            <div class="icon"><img src="../../../public/images/feature/feature-1.png" alt=""></div>
                            <div class="content">
                                <h3>Free Shipping</h3>
                                <p>Start from $100</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4 col-12 mt-15 mb-15">
                        <div class="feature-item text-center">

                            <div class="icon"><img src="../../../public/images/feature/feature-2.png" alt=""></div>
                            <div class="content">
                                <h3>Money Back Guarantee</h3>
                                <p>Back within 25 days</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4 col-12 mt-15 mb-15">
                        <div class="feature-item text-center">

                            <div class="icon"><img src="../../../public/images/feature/feature-3.png" alt=""></div>
                            <div class="content">
                                <h3>Secure Payment</h3>
                                <p>Payment Security</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div><!-- Feature Section End -->

        <!-- Blog Section Start -->
        <div class="blog-section section mt-80 mt-lg-60 mt-md-60 mt-sm-60 mt-xs-40 mb-40 mb-lg-20 mb-md-20 mb-sm-20 mb-xs-0">
            <div class="container">
                <div class="row">

                    <div class="col-xl-6 col-lg-5 col-12">

                        <div class="row">
                            <div class="section-title text-left col mb-30">
                                <h1>CLIENTS REVIEW</h1>
                                <p>Clients says abot us</p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12 mb-40">
                                <div class="testimonial-item">
                                    <p>Jadusona is one of the most exclusive Baby shop in the wold, where you can find all product for your baby that your want to buy for your baby. I recomanded this shop all of you</p>
                                    <div class="testimonial-author">
                                        <img src="../../../public/images/testimonial/testimonial-1.png" alt="">
                                        <div class="content">
                                            <h4>Zacquline Smith</h4>
                                            <p>CEO, Momens Group</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-40">
                                <div class="testimonial-item">
                                    <p>Jadusona is one of the most exclusive Baby shop in the wold, where you can find all product for your baby that your want to buy for your baby. I recomanded this shop all of you</p>
                                    <div class="testimonial-author">
                                        <img src="../../../public/images/testimonial/testimonial-2.png" alt="">
                                        <div class="content">
                                            <h4>Nusaha Williams</h4>
                                            <p>CEO, Momens Group</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-xl-6 col-lg-7 col-12">

                        <div class="row">
                            <div class="section-title text-left col mb-30">
                                <h1>FROM THE BLOG</h1>
                                <p>Find all latest update here</p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12 mb-40">
                                <div class="blog-item">
                                    <div class="image-wrap">
                                        <h4 class="date">May <span>25</span></h4>
                                        <a class="image" href="single-blog.blade.php"><img src="../../../public/images/blog/blog-1.jpg" alt=""></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="single-blog.blade.php">Lates and new Trens for baby fashion</a></h4>
                                        <div class="desc">
                                            <p>Jadusona is one of the most of a exclusive Baby shop in the</p>
                                        </div>
                                        <ul class="meta">
                                            <li><a href="#"><img src="../../../public/images/blog/blog-author-1.jpg" alt="Blog Author">Muhin</a></li>
                                            <li><a href="#">25 Likes</a></li>
                                            <li><a href="#">05 Views</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-40">
                                <div class="blog-item">
                                    <div class="image-wrap">
                                        <h4 class="date">May <span>20</span></h4>
                                        <a class="image" href="single-blog.blade.php"><img src="../../../public/images/blog/blog-2.jpg" alt=""></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="single-blog.blade.php">New Collection New Trend all New Style</a></h4>
                                        <div class="desc">
                                            <p>Jadusona is one of the most of a exclusive Baby shop in the</p>
                                        </div>
                                        <ul class="meta">
                                            <li><a href="#"><img src="../../../public/images/blog/blog-author-2.jpg" alt="Blog Author">Takiya</a></li>
                                            <li><a href="#">25 Likes</a></li>
                                            <li><a href="#">05 Views</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div><!-- Blog Section End -->

        <!-- Brand Section Start -->
        <div class="brand-section section mb-80 mb-lg-60 mb-md-60 mb-sm-60 mb-xs-40">
            <div class="container-fluid">
                <div class="row">
                    <div class="brand-slider">

                        <div class="brand-item col">
                            <img src="../../../public/images/brands/brand-1.png" alt="">
                        </div>

                        <div class="brand-item col">
                            <img src="../../../public/images/brands/brand-2.png" alt="">
                        </div>

                        <div class="brand-item col">
                            <img src="../../../public/images/brands/brand-3.png" alt="">
                        </div>

                        <div class="brand-item col">
                            <img src="../../../public/images/brands/brand-4.png" alt="">
                        </div>

                        <div class="brand-item col">
                            <img src="../../../public/images/brands/brand-5.png" alt="">
                        </div>

                        <div class="brand-item col">
                            <img src="../../../public/images/brands/brand-6.png" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- Brand Section End -->

        <!-- Footer Top Section Start -->
        <div class="footer-top-section section bg-theme-two-light pt-80 pt-lg-60 pt-md-60 pt-sm-60 pt-xs-40 pb-40 pb-lg-20 pb-md-20 pb-sm-20 pb-xs-0">
            <div class="container">
                <div class="row">

                    <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                        <h4 class="title">CONTACT US</h4>
                        <p>You address will be here<br/> Lorem Ipsum text</p>
                        <p><a href="tel:01234567890">01234 567 890</a><a href="tel:01234567891">01234 567 891</a></p>
                        <p><a href="mailto:info@example.com">info@example.com</a><a href="#">www.example.com</a></p>
                    </div>

                    <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                        <h4 class="title">PRODUCTS</h4>
                        <ul>
                            <li><a href="#">New Arrivals</a></li>
                            <li><a href="#">Best Seller</a></li>
                            <li><a href="#">Trendy Items</a></li>
                            <li><a href="#">Best Deals</a></li>
                            <li><a href="#">On Sale Products</a></li>
                            <li><a href="#">Featured Products</a></li>
                        </ul>
                    </div>

                    <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                        <h4 class="title">INFORMATION</h4>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Payment Method</a></li>
                            <li><a href="#">Product Warranty</a></li>
                            <li><a href="#">Return Process</a></li>
                            <li><a href="#">Payment Security</a></li>
                        </ul>
                    </div>

                    <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                        <h4 class="title">NEWSLETTER</h4>
                        <p>Subscribe our newsletter and get all update of our product</p>

                        <form id="mc-form" class="mc-form footer-subscribe-form" novalidate="true">
                            <input id="mc-email" autocomplete="off" placeholder="Enter your email here" name="EMAIL" type="email">
                            <button id="mc-submit"><i class="fa fa-paper-plane-o"></i></button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->

                        <h5>FOLLOW US</h5>
                        <p class="footer-social"><a href="#">Facebook</a> - <a href="#">Twitter</a> - <a href="#">Google+</a></p>

                    </div>

                </div>
            </div>
        </div><!-- Footer Top Section End -->

        <!-- Footer Bottom Section Start -->
        <div class="footer-bottom-section section bg-theme-two pt-15 pb-15">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <p class="footer-copyright">Copyright &copy; All rights reserved</p>
                    </div>
                </div>
            </div>
        </div><!-- Footer Bottom Section End -->

    </div>
@endsection

@section('js')
{{--    <script src="{{ asset('js/main.js') }}" ></script>--}}
@endsection

@section('footer')
    @include('layouts.footers.nav', ['analytics' => true])
@endsection
