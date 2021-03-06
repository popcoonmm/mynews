<!DOCTYPE html>
{{--言語宣言日本語app.phpmの設定から--}}
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta chearset="utf-8">
        {{--windows edge に対応するための呪文--}}
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{--スマホ画面調整--}}
        <meta name="viewport" content="width=device-width,initial-scale=1">
        {{--トークン--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{--継承--}}
        <title>@yield('title')</title>
        {{--「/js/app.js」javascript読み込み--}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        {{--フォント--}}
        <link rel="dns-prefetch" href="https://fonts.gstaic.com">
        
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        {{--Laravel css読み込み--}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        
        <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
        　　{{--ナビゲーションバー--}}　
            <nav class="navbar navbar-expant-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                      
                       {{ config('app.name', 'Laravel') }}
                      
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                         <ul class="navbar-nav mr-auto">
                          
                        </ul>
                        
                        <ul class="navbar-nav ml-auto">

                        {{--ログインしていない場合ログイン画面のリンクへ--}}
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                     @endguest

                        </ul>
                    </div>
                 </div>
            </nav>　　　{{--ここまでナビゲーションバー--}}

            <main class="py-4">
                @yield('content')
            </main>
        </div>  
    </body>
</html>