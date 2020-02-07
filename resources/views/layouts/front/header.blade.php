<header class="header_area">
    <div class="main_menu">
        @guest
        @else
            @if(auth()->user()->role_id == 4)
            @else
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="p-2">
                            <li class="ml-2"><a href="{{ route('dashboard.index') }}"><i class="ti-dashboard mr-2"></i> Dashboard</a></li>
                        </ul>
                    </div>
                </nav>
            @endif
        @endguest

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('home') }}"><img src="{{ asset('img/logo.png')}}" alt="emcode.ir"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item {{ Request::routeIs(['categories', 'single.category']) ? 'active' : '' }}"><a class="nav-link" href="{{ route('categories') }}">Category</a>
                        {{-- <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li> --}}
                        <li class="nav-item {{ Request::routeIs('contact') ? 'active' : '' }}"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-social mr-2">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li><a href="https://instagram.com/coding.style.mm"><i class="ti-instagram"></i></a></li>
                        <li><a href="https://t.me/oct29_1991"><i class="mdi mdi-telegram"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-auth" dir="rtl" style="width:25%">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="ti-lock"></i></a>
                            </li>
                            <li class="nav-item" style="margin: 0 1em">
                                <a class="nav-link">/</i></a>
                                {{-- <i class="ti-Italic"></i> --}}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><i class="ti-user"></i></a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
</header>
