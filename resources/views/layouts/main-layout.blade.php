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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

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
<h1 class="mt-5 mb-4 text-center">@yield('title')</h1>
<div class="container d-md-flex">
    <div>
        @yield('content')
    </div>
    <nav id="sidebar">
        <div class="p-4 pt-5">
            <h5>Categories</h5>
            <ul class="list-unstyled components mb-5">
                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle collapsed">Mens Shoes</a>
                    <ul class="list-unstyled collapse" id="pageSubmenu1" style="">
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Casual</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Football</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Jordan</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Lifestyle</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Running</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Soccer</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Sports</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Mens
                        Shoes</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Casual</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Football</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Jordan</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Lifestyle</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Running</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Soccer</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Sports</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Accessories</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu3">
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Nicklace</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Ring</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Bag</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Sacks</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Lipstick</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle">Clothes</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu4">
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Jeans</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> T-shirt</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Jacket</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Shoes</a></li>
                        <li><a href="#"><span class="fa fa-chevron-right mr-2"></span> Sweater</a></li>
                    </ul>
                </li>
            </ul>
            <div class="mb-5">
                <h5>Tag Cloud</h5>
                <div class="tagcloud">
                    <a href="#" class="tag-cloud-link">dish</a>
                    <a href="#" class="tag-cloud-link">menu</a>
                    <a href="#" class="tag-cloud-link">food</a>
                    <a href="#" class="tag-cloud-link">sweet</a>
                    <a href="#" class="tag-cloud-link">tasty</a>
                    <a href="#" class="tag-cloud-link">delicious</a>
                    <a href="#" class="tag-cloud-link">desserts</a>
                    <a href="#" class="tag-cloud-link">drinks</a>
                </div>
            </div>
        </div>
    </nav>
</div>
@guest
@else
    @if(in_array('admin', Auth::user()->roles->pluck('name', 'name')->all()))
        <a class="btn btn-primary fixed-bottom m-3" style="left: auto; width: 10%" href="{{route('dashboard')}}"
           role="button">Admin Panel</a>
    @endif
@endguest
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
