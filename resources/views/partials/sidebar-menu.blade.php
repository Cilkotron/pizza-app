<ul class="list-unstyled navbar__list">
    <li class="active has-sub">
        <a class="js-arrow" href="{{ route('admin.dashboard') }}">
        <img class="icon-img" src="{{ asset('images/dashboard.png') }}" alt="Our Pizzeria | DashboardIcon">Dashboard
        </a>
    </li>
    @if(Auth::user()->roles == 'full')
    <li class="has-sub">
        <a class="js-arrow" href="{{ route('admin.index')}}">
            <img class="icon-img" src="{{ asset('images/admin.png') }}" alt="Our Pizzeria | AdminIcon">Admins
        </a>
    </li>
    @endif
    <li class="has-sub">
        <a class="js-arrow" href="{{ route('user.index')}}">
            <img class="icon-img" src="{{ asset('images/users.png') }}" alt="Our Pizzeria | UserIcon">Users
        </a>
    </li>
    <li class="has-sub">
        <a class="js-arrow" href="{{ route('category.index')}}">
            <img class="icon-img" src="{{ asset('images/categories.png') }}" alt="Our Pizzeria | CategoryIcon">Categories
        </a>
    </li>
     <li class="has-sub">
        <a class="js-arrow" href="{{ route('product.index')}}">
            <img class="icon-img" src="{{ asset('images/pizza.png') }}" alt="Our Pizzeria | PizzaIcon">Products
        </a>
    </li>
    <li class="has-sub">
        <a class="js-arrow"  href="{{ route('order.index') }}">
            <img class="icon-img" src="{{ asset('images/cart.png') }}" alt="Our Pizzeria | OrderIcon">Orders
        </a>
    </li>
    <li class="has-sub">
        <a class="js-arrow" href="{{ route('contact.index') }}">
            <img class="icon-img" src="{{ asset('images/messages.png') }}" alt="Our Pizzeria | MessageIcon">Messages
        </a>
    </li>



</ul>
