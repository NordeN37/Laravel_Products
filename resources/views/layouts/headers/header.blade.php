
<!-- Header Section Start -->
<div class="header-section section">

    <!-- Header Top Start -->
    <div class="header-top header-top-one bg-theme-two">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">

                <div class="col mt-10 mb-10 d-none d-md-flex">
                    <!-- Header Top Left Start -->
                    <div class="header-top-left">
                        <div class="">

                        </div>
                    </div><!-- Header Top Left End -->
                </div>

                <div class="col mt-10 mb-10">
                    <!-- Header Shop Links Start -->
                    <div class="header-top-right">

                        <p><a href="#">Аккаунт</a></p>
                        <p><a href="login-register.blade.php">Регистрация</a><a href="login-register.blade.php">Авторизация</a></p>

                    </div><!-- Header Shop Links End -->
                </div>

            </div>
        </div>
    </div><!-- Header Top End -->

    <!-- Header Bottom Start -->
    <div class="header-bottom header-bottom-one header-sticky@">
        <div class="container-fluid">
            <div class="row menu-center align-items-center justify-content-between">

                <div class="col mt-15 mb-15">
                    <!-- Logo Start -->
                    <div class="header-logo">
                        <a href="{{env('APP_URL')}}" title="{{ setting('site.title', 'site title') }}">
                            <img src="/storage/{{setting('site.logoWhite')}}" class="img-fluid logo logo-white" alt="{{ setting('site.title', 'site title') }}"/>
                        </a>
                    </div><!-- Logo End -->
                </div>

                <div class="col order-2 order-lg-3">
                    <!-- Header Advance Search Start -->
                    <div class="header-shop-links">

                        <div class="header-search">
                            <button class="search-toggle"><img src="{{asset('images/icons/search.png')}}" alt="Поиск"><img class="toggle-close" src="{{ asset('images/icons/close.png') }}" alt="Поиск"></button>
                            <div class="header-search-wrap">
                                <form action="#">
                                    <input type="text" placeholder="Введите и нажмите ввод">
                                    <button><img src="{{asset('images/icons/search.png')}}" alt="Поиск"></button>
                                </form>
                            </div>
                        </div>

                        <div class="header-mini-cart">
                            <a href="cart.blade.php"><img src="{{ asset('images/icons/cart.png') }}" alt="Корзина"> <span>02($250)</span></a>
                        </div>

                    </div><!-- Header Advance Search End -->
                </div>

                <div class="col order-3 order-lg-2">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{ route('index') }}">Главная</a>
                                </li>
                                <li><a href="shop.blade.php">Магазин</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-left-sidebar.blade.php">Shop Left Sidebar</a></li>
                                        <li><a href="single-product.blade.php">Single Product</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Категории</a>
                                    <ul class="sub-menu">
                                        @foreach($categories as $category)
                                          <li>
                                                <a class="nav-item nav-link active" href="{{ route('category', $category->slug )}}">{{ $category->name }}</a>
                                          </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="blog.blade.php">Блог</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.blade.php">Блог</a></li>
                                        <li><a href="single-blog.blade.php">Single Blog</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.blade.php">Контакты</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div class="mobile-menu order-12 d-block d-lg-none col"></div>

            </div>
        </div>
    </div><!-- Header BOttom End -->

</div><!-- Header Section End -->
