    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('images/logo_image.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
<header>
    <!--? Header Start -->
    <div class="header-area header-transparent">
            <div class="main-header header-sticky">
                    <div class="container topMenu" style="font-size: 15px!important;">
                        <div class="row justify-content-between">
                            <div class="col-12 col-md d-flex">
                                <p class="mb-0 phone"><span> <a href="#">+381 18 554 556</a> </span><span> <a href="#">office@orderpizzaapp.com</a> </span></p>
                            </div>
                            <div class="col-12 col-md d-flex justify-content-md-end">
                                <p class="mb-0 phone">Mon-Sun 8:00-24:00</p>
                                <div class="social-media">
                                    <p class="ml-3 d-flex">
                                    <a href="https://twitter.com/"  style="font-size: 22px;"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/" style="padding-left: 2em; font-size: 22px;"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/" style="padding-left: 2em; font-size: 22px;"><i class="fab fa-instagram"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


               <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('shop.index') }}"><img src="{{ asset('images/logo_text.png') }}" alt="Logo"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li>
                                            <a href="{{ route('shop.index') }}">Home</a>
                                        </li>
                                        <li class="{{ empty($tabName) || $tabName == 'about' ? 'active' : '' }}">
                                            <a href="{{ route('shop.index') }}#about">About</a>
                                        </li>

                                        <li class="{{ empty($tabName) || $tabName == 'menu' ? 'active' : '' }}">
                                            <a href="{{ route('shop.index') }}#menu">Menu</a>
                                        </li>
                                        <li class="{{ empty($tabName) || $tabName == 'contact' ? 'active' : '' }}">
                                            <a href="{{ route('shop.index') }}#contact">Contact</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('product.shoppingCart') }}">Shopping Cart
                                                <span class="badge badge-pill badge-dark">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                            </a>
                                      </li>
                                       <li>
                                        @if(Auth::check())
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <span class="caret">{{ Auth::user()->email }}</span>
                                           </a>
                                        @else
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <span class="caret">Your Account</span>
                                       </a>
                                       @endif
                                           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            @if(Auth::check())
                                             <a  class="dropdown-item" href="{{ route('user.profile') }}">
                                                <i class="fas fa-user"></i>
                                                Your Orders
                                           </a>
                                           <div class="dropdown-divider"></div>
                                               <a class="dropdown-item" href="{{ route('user.logout') }}">
                                                   <i class="fas fa-sign-out-alt"></i>
                                                   Logout
                                               </a>
                                           </div>
                                           @else
                                           <a class="dropdown-item" href="{{ route('user.signup') }}">
                                               <i class="fas fa-user-plus"></i>
                                                Make Account
                                           </a>
                                           <a class="dropdown-item" href="{{ route('user.signin') }}">
                                               <i class="fas fa-sign-in-alt"></i>
                                                Login
                                           </a>
                                           @endif
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>


            </div>
    </div>
    <!-- Header End -->
</header>
