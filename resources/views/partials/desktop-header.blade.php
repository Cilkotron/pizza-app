<header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap float-right">
                        <div class="header-button">
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="content float-right">
                                        <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <img class="img-thumbnail" src="{{ asset('images/user.png')}}" alt="Our Pizzeria | {{ Auth::user()->name }}" height="20" width="20" />
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">{{ Auth::user()->name }}
                                                </h5>
                                                <span class="email">{{ Auth::user()->email }}</span>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="{{ route('user.logout') }}">
                                                    <img class="img-thumbnail" src="{{ asset('images/logout.png') }}" alt="Our Pizzeria | LogoutIcon" height="40" width="40"> &nbsp; Logout
                                                </a>
                                            </div>
                                        </div>

                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
