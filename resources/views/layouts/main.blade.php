<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/css.css')}}">

        <script src="{{asset('js/bootstrap.min.js')}}" type=""></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <title>
            Wschool.uz
        </title>
    </head>
<body>
<div class="container-fluid">
    <header>
        <div class="menu1">
            <ul class="nav">
                @foreach($languages as $language)
                    <li class="nav-item">
                        <a class="nav-link menu1hover" href="{{route('lessons', [$language->id,1])}}"><b>{{$language->name}}</b></a>
                    </li>
                @endforeach
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item menu1hover">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item menu1hover">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown menu1hover">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle menu1hover" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item menu1hover" href="{{(Auth::user()->is_admin == 1)?route('content.index'):'1#'}}" >
                                {{ Auth::user()->name }}
                            </a>
                            <a class="dropdown-item menu1hover" href="{{ route('logout') }}"
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
    </header>
    @yield('content')
</div>
</body>
<footer class="footer">
    <p>O'zbekistan Toshkent 25.04.2020</p>
</footer>
</html>
