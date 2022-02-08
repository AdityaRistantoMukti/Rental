<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.nav')
        <main class="">
            <div class="jumbotron" style=" background-image: linear-gradient(to right, #360033,#0b8793); color: #efefef;">
                <div class="container">
                    <div class="mr-5">
                        <h1 class="display-4">Hello,   </h1>
                        <h4>Selamat Datang kembali dan selamat mengerjakan pekerjaan anda</h4>
                        <div class="row justify-content-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-pc-display-horizontal" viewBox="0 0 16 16" style="margin-top: -70px">
                                <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v7A1.5 1.5 0 0 0 1.5 10H6v1H1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5v-1h4.5A1.5 1.5 0 0 0 16 8.5v-7A1.5 1.5 0 0 0 14.5 0h-13Zm0 1h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5ZM12 12.5a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0Zm2 0a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0ZM1.5 12h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1ZM1 14.25a.25.25 0 0 1 .25-.25h5.5a.25.25 0 1 1 0 .5h-5.5a.25.25 0 0 1-.25-.25Z"/>
                              </svg>
                        </div>     
                    </div>
                </div>
                
                    <nav class="navbar navbar-expand-md navbar-light navbar-light mt-3 border-top ">
                        <div class="container">
                                <!-- Left Side Of Navbar -->
                                <ul class="d-flex justify-content-center" style=" margin-top: 30px; text-transform: uppercase; ">
                                    <li class="nav-link mr-5 hover">
                                        <a href="{{route('dashboard.index')}}" class="nav-link text-white">Dashboard</a>
                                    </li>
                                    <li class="nav-link mr-5 hover">
                                        <a href="{{route('daftarbarang.index')}}" class="nav-link text-white">Daftar Barang</a>
                                    </li>
                                    <li class="nav-link mr-5 hover">
                                        <a href="{{route('transaksi.index')}}" class="nav-link text-white">Transaksi</a>
                                    </li>
                                    <li class="nav-link mr-5 hover">
                                        <a href="{{route('pengembalian.index')}}" class="nav-link text-white">Pengembalian</a>
                                    </li>
                                    <li class="nav-link mr-5 hover">
                                        <a href="" class="nav-link text-white">Laporan</a>
                                    </li>
                                </ul>  
                        </div>
                    </nav>
                </div>
               
            @yield('content')
        </main>
    </div>
</body>
</html>
