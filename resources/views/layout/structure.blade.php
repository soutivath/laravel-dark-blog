<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta name="csrf-token" content={{csrf_token()}}>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    @yield('css')
    
  <link rel="stylesheet" href="{{asset('css/footer.css')}}" type="text/css" >
  <link rel="stylesheet" href="{{asset('css/normalize.css')}}" type="text/css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    

  <title>{{ config('app.name') }}</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <svg class="bi bi-star" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 00-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 00-.163-.505L1.71 6.745l4.052-.576a.525.525 0 00.393-.288l1.847-3.658 1.846 3.658a.525.525 0 00.393.288l4.052.575-2.906 2.77a.564.564 0 00-.163.506l.694 3.957-3.686-1.894a.503.503 0 00-.461 0z" clip-rule="evenodd"/>
        </svg></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
          <li class="nav-item {{ Request::is('/') ? 'active' : ''   }}">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            @auth
            <li class="nav-item {{ Request::is('contact') ? 'active' : ''   }}">
              <a class="nav-link" href={{url('contact')}}>Contact</a>
              @endauth
            </li>
            <li class="nav-item  {{ Request::is('about') ? 'active' : ''   }}" >
              <a class="nav-link" href={{url('/about')}}>About</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               @guest
               <svg class="bi bi-people-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z"/>
                <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z" clip-rule="evenodd"/>
              </svg> Account
               @else
               <svg class="bi bi-people-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z"/>
                <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z" clip-rule="evenodd"/>
              </svg> {{ Auth::user()->name }}
               @endguest
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  @if(Auth::guest())
                <a class="dropdown-item" href="{{route('login')}}">Login</a>
                <a class="dropdown-item" href="{{route('register')}}">Register</a>
                  @elseif(Auth::user()->isAdmin())
                <a class="dropdown-item" href="{{url('/account/show')}}">View Account</a>
                  <a class="dropdown-item" href="{{url('admin')}}">Admin Dashboard</a>
                <form method="post" action="{{route('logout')}}">
                  @csrf
                    <input type="submit" name="submit" value="    Logout" class="border-0 bg-white text-center mt-1 text-danger"/> 
                  </form>
               
                  @else
                  <a class="dropdown-item" href="{{url('/account/show')}}">View Account</a>
                  <form method="post" action="{{route('logout')}}">
                    @csrf
                    <input type="submit" name="submit" value="    Logout"  class="border-0 bg-white text-center mt-1 text-danger"/> 
                  </form>
                  @endif
                </div>
              </li>
          </ul>
        </div>
      </nav>

     
    <div class="container ">
        @yield('content')
    </div> <!-- container end -->
  


    <footer class="bg-dark ">
      <div class="container-fluid text-center text-white">
        <span class="text-center font-weight-bolder">Powered by laravel</span>
        <span>2020-2077</span>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   @yield('script')
  </body>
</html>