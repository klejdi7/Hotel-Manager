<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hotel Manager | 2020</title>
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


    {{-- DateTime Calculate Night --}}
    <!-- Scripts -->
    <script src="/node_modules/angular/angular.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('js/materialize.js') }}" defer --}}
   
    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/materialize.css') }}" rel="stylesheet"> --}}
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}" aria-readonly="true" style="color: Red; font-size: 30px;font-weight:1000;">
                    HOTEL MANAGER
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                              
                            @endif
                        @else
                
                        <li class="nav-item" style=" font-size: 20px;">
                        <a id="navbarDropdown" class="nav-link" href="{{ route('home') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                            Home  <span class="caret"></span>
                        </a>
                        </li>
                        <li class="nav-item" style=" font-size: 20px;">
                          <a id="navbarDropdown" class="nav-link"  href="{{ route('reservations') }}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                            Reservations <span class="caret"></span>
                        </a>
                        </li>
                         <li class="nav-item" style=" font-size: 20px;">
                            <a id="navbarDropdown" class="nav-link"  href="{{ route('new-res') }}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                              New Reservations<span class="caret"></span>
                          </a>
                          </li> <li class="nav-item" style=" font-size: 20px;">
                          <a id="navbarDropdown" class="nav-link" href="{{ route('plans') }}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                            Plans <span class="caret"></span>
                        </a>
                        </li> 
                        <li class="nav-item" style=" font-size: 20px;">
                            <a id="navbarDropdown" class="nav-link" href="{{ route('rooms') }}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                              Rooms <span class="caret"></span>
                          </a>
                          </li>
                          @if(Auth::user()->role === "Admin")
                        <li class="nav-item" style=" font-size: 20px;">
                          <a id="navbarDropdown" class="nav-link" href="{{ route('users') }}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                            Users <span class="caret"></span>
                        </a>
                        </li>
                        @endif
                            <li class="nav-item dropdown" style=" font-size: 20px;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        </nav>
        <div class="reserv-table">
            @yield('reservations')
            </div>
      
        <div class="room">
            @yield('add-room')
        </div>
           
        <div class="new-res" style="margin: 20px;">
            @yield('new_res')
        </div>

        <div class="check-res" style="margin: 20px;">
            @yield('check_room')
        </div>

        <div class="plans">
            @yield('plans')
        </div>
        <div class="room">
            @yield('rooms')
        </div>
        <div class="status">
            @yield('status')
        </div>
        <div class="users">
            @yield('users')
        </div>
        
        <div class="search">
            @yield('res_search')
        </div>
        <div class="new_plan">
            @yield('new-plan')
        </div>
        <div class="finished">
            @yield('finished')
        </div>
        <div class="info" style="margin: 20px;">
            @yield('info')
        </div>

          <main class="py-4">
            @yield('content')
        </main>

    </div>

</html>
