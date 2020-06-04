<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UseMorphy') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    @yield('javascript')
    @yield('css')
</head>

<body>
    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand text-center" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                        @guest
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('perfil') }}">Meu
                                        Cadastro</a>
                                    <a class="dropdown-item" href="{{route('pedidos')}}">Meus Pedidos</a>
                                    @if(Auth::user()->isAdmin())
                                        <a href="{{ route('config') }}"
                                            class="dropdown-item">Configurações do Sistema</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('carrinho')}}" class="nav-link carrinho">
                                    <i class="material-icons">shopping_bag</i>
                                    {{-- @if (Auth::user()->carrinho->produtos()->count())
                                    <span>{{ Auth::user()->carrinho->produtos()->count() }}</span>
                                    @endif --}}
                                    
                                </a>
                                
                            </li>
                        @endguest
                        
                    </ul>
                    
                </div>
            </div>
        </nav>
        <main class="container-fluid">
            <header class="blog-header py-3">
                
                <nav class="nav d-flex justify-content-md-center">
                    <div id="wrap">
                        <form action="{{ route('search-produto') }}" autocomplete="on">
                        <input id="search" name="s" type="text" placeholder="O que você procura?"><input id="search_submit" type="submit"><span class="material-icons">
                            search
                            </span>
                        </form>
                      </div>
                    @foreach(\App\Categoria::all() as $categoria)
                    <a class="p-2 text-muted mb-1" href="{{ route('search-categoria', $categoria->id) }}">{{$categoria->nome}}</a>
                    @endforeach
                    @foreach(\App\Tag::all() as $tag)
                    <a class="p-2 text-muted mb-1" href="{{ route('search-tag', $tag->id) }}">{{$tag->nome}}</a>
                    @endforeach
                    
                </nav>
                @if(session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif
            </header>
            @yield('content')
            
        </main>
    </div>
</body>

</html>
