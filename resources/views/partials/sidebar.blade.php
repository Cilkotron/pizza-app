   <!-- MENU SIDEBAR-->
   <aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/logo_text.png') }}" alt="Our Pizzeria" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            @include('partials.sidebar-menu')
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
