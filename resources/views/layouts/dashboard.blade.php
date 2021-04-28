<!DOCTYPE html>
<html lang="en">



<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>{{ config('app.name', 'laravel') }}</title>

    <!-- start: CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">



<style>
   a{
    color: white;
    text-decoration: none;
    background-color: transparent;
}
body {
    background-color:#212529;
}

</style>





</head>

<body>

    {{-- NAVBAR --}}
  <div>
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Car Management System
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
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
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
        </div>
    </nav>




 

    {{-- NAVBAR END --}}
    {{-- sidebar --}}
    <div class="container-fluid">
      <div class="row">
          <div class="col-2 px-2 bg-dark position-fixed" id="sticky-sidebar">
              <div class="nav flex-column flex-nowrap vh-100 overflow-auto text-white p-5">
                  <a href="{{ route('cars.show') }}" class="nav-link">Dashboard</a>
                  @if (Auth::user()->role == 1)
                  <a href="{{ route('cars.addGorib') }}" class="nav-link">Add Car</a>
                  <a href="{{ route('cars.showBookedCar') }}" class="nav-link">Booked Car</a>
                  <a href="{{ route('showRequests') }}" class="nav-link">Show Customer Request</a>
                  @else
                  <a href="{{ route('cars.showBookedCar') }}" class="nav-link">Booked Car</a>
                  <a href="{{ route('showRequests') }}" class="nav-link">Show Request Status</a>
                  @endif
                  
              </div>
          </div>
          {{-- sidebar end --}}
          <div class="col-9 offset-2" id="main" style="margin-top: 60px;">
              @yield('content')
          </div>
      </div>
  </div>

   
</body>

</html>
