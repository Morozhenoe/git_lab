<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(Route::is('home') || Route::is('holidays.*') || Route::is('moderator.*') || Route::is('admin.*'))
                                        <a class="dropdown-item" href="{{ route('profile.index', Auth::user()->id)}}">
                                            {{ __('Профиль') }}
                                        </a>
                                    @endif

                                    @if(Route::is('home'))
                                        <a class="dropdown-item" href="{{ route('holidays.create')}}">
                                            {{ __('Праздники') }}
                                        </a>
                                    @endif

                                    @if(Route::is('profile.*') || Route::is('admin.*') || Route::is('moderator.*'))
                                        <a class="dropdown-item" href="{{ route('holidays.create')}}">
                                            {{ __('Праздники') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('home')}}">
                                            {{ __('Главная') }}
                                        </a>
                                    @endif

                                    @if(Route::is('holidays.*'))
                                        <a class="dropdown-item" href="{{ route('home')}}">
                                            {{ __('Главная') }}
                                        </a>
                                    @endif

                                    @can('view',auth()->user())
                                        <a class="dropdown-item" href="{{ route('moderator.index')}}">
                                            {{ __('Модерировать') }}
                                        </a>
                                    @endcan

                                    @if(Auth::user()->role_id === 2)
                                        <a class="dropdown-item" href="{{ route('moderator.index')}}">
                                            {{ __('Модерировать') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.index')}}">
                                            {{ __('Администрировать') }}
                                        </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
