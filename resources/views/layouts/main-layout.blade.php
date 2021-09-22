<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header class="navbar navbar-expand-md navbar-light">
    <div class="d-flex container">
        <a class="navbar-brand me-2 me-xl-4" href="{{route('index')}}">UP project</a>
        <div class="collapse navbar-collapse order-md-2 flex-row-reverse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/typography">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/typography">Resources</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/typography">Components</a>
                </li>

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <img class="nav-user-photo align-middle float-left mr-1 rounded-circle"
                             src="{{Auth::user()->image_path}}" alt="" style="max-width: 40px">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
        <a class="btn btn-warning w-25" href="{{route('contact-us.create')}}">Contact Us</a>
        <div class="pl-3 w-50">The current date is <b>{{ date('Y-m-d') }}.</b></div>
    </div>
</header>
<div class="container">
    <h1 class="mt-5 mb-4 text-center">@yield('title')</h1>
    @yield('content')

    @guest
    @else
        @if(in_array('admin', Auth::user()->roles->pluck('name', 'name')->all()))
            <a class="btn btn-primary fixed-bottom m-3" style="left: auto; width: 10%" href="{{route('dashboard')}}"
               role="button">Admin Panel</a>
        @endif
    @endguest
</div>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
