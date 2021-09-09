<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
</head>
<body>
<header class="navbar navbar-expand-md navbar-light">
    <div class="d-flex container">
        <a class="navbar-brand me-2 me-xl-4" href="/">UP project</a>
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
            </ul>
        </div>
        <a class="btn btn-warning" href="/comments">Comments</a>
    </div>
</header>
<div class="content">
    @yield('main_content')
</div>
</body>
</html>
