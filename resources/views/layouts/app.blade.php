<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>

    <!-- Custom Theme files -->
    <link href="{{ asset('css/bootstrap.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    @yield('styles')

    <!-- JS -->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>

    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- header -->
        <div class="header">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header navbar-left wthree">
                        <h1>
                            <a href="{{ url('/') }}">{{ config('app.name') }}<span>Check your Result</span></a>
                        </h1>
                    </div>
                    <!-- navigation -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="header-right wthree">
                        <div class="top-nav-text">
                            <p>Call Us: <span>+123 456 7890</span></p>
                            <div id="sb-search" class="sb-search">
                                <form action="search_thesis" method="post">
                                    {{ csrf_field() }}

                                    <input type="search" class="sb-search-input" name="search" placeholder="Search by topic of thesis.." id="search" required="">
                                    <input class="sb-search-submit" type="submit" value="">
                                    <span class="sb-icon-search"> </span>
                                </form>
                                <div class="clearfix"> </div>
                                <!-- search-scripts -->
                                <script src="{{ asset('js/classie.js') }}"></script>
                                <script src="{{ asset('js/uisearch.js') }}"></script>
                                <script>
                                    new UISearch(document.getElementById('sb-search'));

                                </script>
                                <!-- //search-scripts -->
                            </div>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-left cl-effect-14">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ route('supervisors.index') }}">Supervisors</a></li>

                                @auth
                                    <li><a href="{{ route('students.index') }}">Students</a></li>
                                    <li><a href="{{ route('specialities.index') }}">Specialities</a></li>
                                    <li><a href="{{ route('theses.index') }}">Results</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endauth
                            </ul>
                            <div class="clearfix"> </div>
                        </div>
                        <!-- //navigation -->
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </nav>
        </div>
        <!-- //header -->

        <!-- banner -->
        <div class="banner-1"></div>
        <!-- //banner -->

        <div class="typo">
            @yield('content')
        </div>

        <!-- footer -->
        <div class="footer-w3copy w3-agileits">
            <p>© 2018 <a href="{{ url('/') }}">{{ config('app.name') }}</a>. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
        </div>
        <!-- //footer -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @yield('scripts')
</body>
</html>
