<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/logo/logo_java_agro.png">
    <title>Java Agro Globalindo</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body>
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
                    <li class="nav-item">
                        <strong>
                            <a class="nav-link text-white" href="{{ url('/') }}">Beranda</a>
                        </strong>
                    </li>
                    <li class="nav-item">
                        <strong>
                            <a class="nav-link text-white" href="{{ url('/produk') }}">Produk</a>
                        </strong>
                    </li>
                    <li class="nav-item">
                        <strong>
                            <a class="nav-link text-white" href="{{ url('/tentang') }}">Tentang Kami</a>
                        </strong>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <strong>
                                    <a class="nav-link text-white" href="{{ url('/login') }}">Shopping</a>
                                </strong>
                            </li>
                        @else
                            <li class="nav-item">
                                <strong>
                                    <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                                </strong>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <strong>
                                        <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                                    </strong>
                                </li>
                            @endif
                        @endauth
                    @endif



                </ul>
            </div>
        </div>
    </nav>
    {{-- sliders --}}
    <div class="">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php $i = 1; @endphp
                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $i == '1' ? 'active' : '' }}">
                        @php $i++; @endphp
                        <img src="/imageSlider/{{ $slider->gambar }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container">

        @yield('isi')

        <section class="pt-5">
            <div class="row mt-5 mb-5">
                <div class="col-md-7 text-center ">
                    <h2 class="fw-bold mb-4">PT. JAVA AGRO GLOBALINDO</h2>
                    <p class="fs-6 mb-5">Kami juga terus mengupdate informasi mengenai perusahaan melalui media sosial,
                        untuk
                        informasi
                        terbaru anda dapat mengikuti media sosial kami.</p>
                    <a href="#" class="mt-1 btn btn-success rounded-pill fw-bold"><i class="bi bi-whatsapp"></i>
                        WhatsApp</a>
                    <a href="#" class="mt-1 text-white btn rounded-pill fw-bold"
                        style="background-color: #FF69B4"><i class="bi bi-instagram"></i> Instagram</a>
                    <a href="#" class="mt-1 btn btn-primary rounded-pill fw-bold"><i class="bi bi-facebook"></i>
                        Facebook</a>
                    <a href="#" class="mt-1 btn btn-danger rounded-pill fw-bold"><i class="bi bi-youtube"></i>
                        Youtube</a>
                    <a href="#" class="mt-1 btn btn-dark rounded-pill fw-bold"><i class="bi bi-tiktok"></i>
                        Tiktok</a>
                </div>
                <div class="col-md-5 d-flex justify-content-center">
                    <table class="ms-md-5 mt-3 fs-5">
                        <tr>
                            <td>Kantor</td>
                            <td class="ps-3 pe-3">:</td>
                            <td> Pasuruan - Jawa Timur</td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td class="ps-3 pe-3">:</td>
                            <td> +62 812-1661-0559</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td class="ps-3 pe-3">:</td>
                            <td> ptjavaagroglobalindo@gmail.com</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>


    </div>


    <footer class="mt-5" style="height:140px; background-color: #111827">
        <div style="height:20px; background-color: #111827"></div>
        <h3 class="text-white text-center">PT. Java Agro Globalindo</h3>
        <p class="text-white text-center mt-5">
            Copyright ©{{ Date('Y') }} Java Agro Globalindo
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
