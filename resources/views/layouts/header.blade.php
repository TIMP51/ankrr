<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

</head>

<body>
<header class=" fixed-top p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                @guest
                    <li><a href="{{route('anime')}}" class="nav-link px-2 text-white">Главная</a></li>
                    <li><a href="{{route('serials')}}" class="nav-link px-2 text-white">Сериалы</a></li>
                    <li><a href="{{route('full')}}" class="nav-link px-2 text-white">Полнометражные</a></li>
                    <li><a href="{{route('short')}}" class="nav-link px-2 text-white">Короткометражные</a></li>
                    <li><a href="{{route('help')}}" class="nav-link px-2 text-white">Помощь</a></li>
                @else
                    <li><a href="{{route('anime')}}" class="nav-link px-2 text-white">Главная</a></li>
                    @if(auth()->user()->role!='admin')
                        <li><a href="{{route('serials')}}" class="nav-link px-2 text-white">Сериалы</a></li>
                        <li><a href="{{route('full')}}" class="nav-link px-2 text-white">Полнометражные</a></li>
                        <li><a href="{{route('short')}}" class="nav-link px-2 text-white">Короткометражные</a></li>
                        <li><a href="{{route('help')}}" class="nav-link px-2 text-white">Помощь</a></li>
                    @elseif(auth()->user()->role=='admin')
                        <li><a href="{{route('countries-view')}}" class="nav-link px-2 text-white">Страны</a></li>
                        <li><a href="{{route(('studios-view'))}}" class="nav-link px-2 text-white">Студии</a></li>
                        <li><a href="{{route(('genres-view'))}}" class="nav-link px-2 text-white">Жанры</a></li>
                        <li><a href="{{route(('heroes-index'))}}" class="nav-link px-2 text-white">Персонажи</a></li>
                        <li><a href="{{route(('actors-index'))}}" class="nav-link px-2 text-white">Актеры</a></li>
                        <li><a href="{{route(('episodes-index'))}}" class="nav-link px-2 text-white">Эпизоды</a></li>
                        <li><a href="{{route(('download'))}}" class="nav-link px-2 text-white">Экспорт</a></li>
                    @endif
                @endguest
                <form action="{{route('search')}}" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" name="search" method="get">
                    <div class="input-group ">
                        <input type="text" id="search" name="search" class="form-control"
                               placeholder="Поиск по названию..." >
                        <button class="btn btn-light btn-outline-dark btn-block" type="submit">{{__('Поиск')}}</button>
                    </div>
                </form>
            </ul>
            @guest
            @else
                @if(auth()->user()->role=='admin')
                    <div class="navbar-nav">
                        @if((Route::current()->getName())=='countries-view')
                            <a href="{{route('countries-create')}}"
                               class="btn btn-outline-success ms-3 mx-2">{{__('Добавить')}}</a>
                        @elseif((Route::current()->getName())=='studios-view')
                            <a href="{{route('studios-create')}}"
                               class="btn btn-outline-success ms-3 mx-2">{{__('Добавить')}}</a>
                        @elseif((Route::current()->getName())=='genres-view')
                            <a href="{{route('genres')}}"
                               class="btn btn-outline-success ms-3 mx-2">{{__('Добавить')}}</a>
                        @elseif((Route::current()->getName())=='anime')
                            <form action="{{ route('animation-create')}}" method="get">
                                <button type="submit" class="btn btn-outline-success ms-3 mx-2">
                                    {{__('Добавить')}}</button>
                            </form>
                        @elseif((Route::current()->getName())=='heroes-index')
                            <a href="{{route('heroes-create')}}"
                               class="btn btn-outline-success ms-3 mx-2">{{__('Добавить')}}</a>
                        @elseif((Route::current()->getName())=='actors-index')
                            <a href="{{route('actors-create')}}"
                               class="btn btn-outline-success ms-3 mx-2">{{__('Добавить')}}</a>
                        @elseif((Route::current()->getName())=='episodes-index')
                            <a href="{{route('episodes-create')}}"
                               class="btn btn-outline-success ms-3 mx-2">{{__('Добавить')}}</a>
                        @elseif((Route::current()->getName())=='search')
                        <form action="{{ route('animation-create')}}" method="get">
                                <button type="submit" class="btn btn-outline-success ms-3 mx-2">
                                    {{__('Добавить')}}</button>
                            </form>
                        @endif
                    </div>
                @endif
            @endguest
            <ul class="navbar-nav">
                {{--                <!-- Authentication Links -->--}}
                @guest
                    <div class="">
                        @if (Route::has('login'))
                            <a type="button" class="btn btn-warning" href="{{ route('login') }}">{{ __('Войти') }}</a>
                        @endif
                        @if (Route::has('register'))
                            <a type="button" class="btn btn-outline-light "
                               href="{{ route('register') }}">{{ __('Зарегистрировать') }}</a>
                        @endif
                    </div>
                @else
                    <li class="nav-item dropdown">
                        <button id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </button>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выход') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ route('user-show', Auth::user()->id) }}" >
                                {{ __('Профиль') }}
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</header>
<main class="pt-5 mt-4">
    @yield('content')
    @extends('layouts.footer')
</main>
</body>
</html>

