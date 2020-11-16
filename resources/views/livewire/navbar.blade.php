<div>
    <nav class="navbar fixed-top navbar-expand-md navbar-dark shadow">
        <div class="container bold">
            <a class="navbar-brand text-danger" href="{{ url('/') }}">
                Gamma<strong> Computer</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle
                            @foreach($brands as $brand) 
                                {{ Request::is('products/brand/'.$brand->id)||Request::is('products') ? 'active' : '' }}
                            @endforeach "

                            href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> List Laptop
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($brands as $brand)
                                <a class="dropdown-item" href="{{ route('products.brand', $brand->id) }}"> {{ $brand->nama }}</a>
                            @endforeach
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('products') }}">Semua Laptop</a>
                            <!-- pemanggilan route menggunakan penamaan dari web.php -->
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('history') ? 'active' : '' }}" href="{{ route('history') }}">History</a>
                    </li>

                    @guest
                    @else
                        <?php $isAdmin = auth()->user()->hasRole('admin'); ?>
                        @if( $isAdmin == 1)
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                        @endif
                    @endguest
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('cart') ? 'active' : '' }}" href="{{ route('cart') }}">
                            Cart <i class="fas fa-shopping-cart"></i>
                            @if($order_qty != 0)
                                <span class="badge badge-danger"> {{ $order_qty }} </span>
                            @endif
                        </a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
