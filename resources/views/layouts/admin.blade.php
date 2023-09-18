<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    {{-- SCRIPT CHART JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div id="app">
        <!-- header -->
        <header class="position_header">

            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <div class="logo_laravel">
                            <img style="width: 55px" src="{{ asset('storage/logo.jpg') }}" alt="Logo Aziendale">
                            <span><strong>BDoctor</strong></span>
                        </div>
                        {{-- config('app.name', 'Laravel') --}}
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('admin') }}">{{ __('Dashboard') }}</a>
                                        <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

        </header>

        <main>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 px-0">
                        <div class="sidebar">
                            <!-- Sidebar -->
                            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
                                <div class="list-group list-group-flush">
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="list-group-item list-group-item-action py-2 ripple sidebar-button {{ Route::currentRouteName() === 'admin.dashboard' ? 'list-group-item-action list-group-item-danger' : '' }}"
                                        aria-current="true">
                                        <i class="fas fa-tachometer-alt fa-fw fa-lg me-3"></i><span>Dashboard</span>
                                    </a>
                                    <a href="{{ route('admin.doctors.index') }}"
                                        class="list-group-item py-2 ripple sidebar-button {{ Route::currentRouteName() === 'admin.doctors.index' ? 'list-group-item-action list-group-item-danger' : '' }}">
                                        <i class="fa-solid fa-address-card fa-lg me-3"></i><span>Gestione Profilo</span>
                                    </a>
                                    <a href="{{ route('admin.messages.index') }}"
                                        class="list-group-item py-2 ripple sidebar-button {{ Route::currentRouteName() === 'admin.messages.index' ? 'list-group-item-action list-group-item-danger' : '' }}">
                                        <i class="fa-solid fa-message fa-lg me-3"></i></i><span>I miei messaggi</span>
                                    </a>
                                    <a href="{{ route('admin.reviews.index') }}"
                                        class="list-group-item py-2 ripple sidebar-button {{ Route::currentRouteName() === 'admin.reviews.index' ? 'list-group-item-action list-group-item-danger' : '' }}">
                                        <i class="fa-regular fa-comment-dots fa-lg me-3"></i><span>Reviews
                                            pazienti</span>
                                    </a>
                                    <a href="{{ route('admin.statistics.index') }}"
                                        class="list-group-item py-2 ripple sidebar-button {{ Route::currentRouteName() === 'admin.statistics.index' ? 'list-group-item-action list-group-item-danger' : '' }}">
                                        <i class="fa-solid fa-chart-column fa-lg me-3"></i><span>Statistiche
                                            Profilo</span>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="padding_main">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>

</html>
