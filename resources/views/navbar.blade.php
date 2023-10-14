<!-- Navbar Start -->
<div class="container-fluid p-0 nav-bar">
    <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3 bg-dark">
        <a href="" class="navbar-brand px-lg-4 m-0 ">
            <h1 class="m-0 display-4 text-uppercase text-white">KOPPEE</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between " id="navbarCollapse">
            <div class="navbar-nav ml-auto p-4">
                <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('service') }}" class="nav-item nav-link">Service</a>
                <a href="{{ route('menu') }}" class="nav-item nav-link">Menu</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                <a href="{{ route('cart.show') }}" class="nav-item nav-link">Cart[{{ count(session('cart', [])) }}]</a>
                <li class="dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                        @if(Auth::check())
                        <span><i class="fa-regular fa-user"></i></span>{{ Auth::user()->name }}<i class="m-l-5"></i></a>
                        @endif
                    <ul class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('mail') }}"><i class="fa fa-user"></i>Mail</a>
                        <li class="dropdown-divider"></li>
                        <a class="dropdown-item" href="{{ route('user-register') }}"><i class="fa fa-user"></i>SignUp</a>
                        <li class="dropdown-divider"></li>
                        <a class="dropdown-item" href="{{ route('user-login') }}"><i class="fa fa-user"></i>SignIn</a>
                        <li class="dropdown-divider"></li>
                        <a class="dropdown-item" href="{{ route('user-logout') }}"><i class="fa fa-power-off"></i>Logout</a>
                    </ul>
                    
                </li>
           </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->