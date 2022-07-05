<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/logo/logo_java_agro.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Java Agro Globalindo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #111827">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="/logo/logo_java_agro.png" style="width: 5rem">
                </a>
                <button class="navbar-toggler bg-white" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <strong>
                                    <a class="nav-link text-white" href="/login">Login</a>
                                </strong>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <strong>
                                        <a class="nav-link text-white" href="/register">Register</a>
                                    </strong>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <strong>
                                    @php
                                        $pesanan_utama = \App\Pesanan::where('user_id', Auth::user()->id)
                                            ->where('status', 0)
                                            ->first();
                                        if (!empty($pesanan_utama)) {
                                            $notif = \App\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                                        }
                                    @endphp
                                    <a class="nav-link text-white" href="/check-out">
                                        <button type="button" class="btn btn-light position-relative">
                                            <i class="bi bi-cart-check-fill"></i>
                                            @if (!empty($notif))
                                                <span
                                                    class="fs-6 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                    {{ $notif }}
                                                </span>
                                            @endif
                                        </button>
                                    </a>
                                </strong>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="/history">
                                        Riwayat Pemesanan
                                    </a>
                                    <a class="dropdown-item" href="/logout"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>



    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
