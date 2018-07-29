<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/bootstrap-grid.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/paginacao.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://unpkg.com/ionicons@4.2.4/dist/css/ionicons.min.css" rel="stylesheet">

        <script src="{{ url('assets/js/jquery.min.js') }}"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <header role="banner">
            <nav class="navbar navbar-light" style="background-color: firebrick;">
                <div class="container">
                    <a class="navbar-brand text-white" href="#">SINTEGRA</a>

                    @if (Auth::check())
                        <ul class="nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link btn btn-outline-light" href="{{url('login/logout')}}">
                                    <i class="icon ion-md-power"></i>
                                    Sair
                                </a>
                            </li>
                        </ul>
                    @endif
                </div>
            </nav>


        </header>

        <main role="main">
            <div class="container">
                @yield('content')
            </div>
        </main>



        <!-- Scripts -->


        <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>