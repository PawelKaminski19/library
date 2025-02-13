<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> System obsługi @yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">

  </head>
  <body>

    <nav class="navbar navbar-toggleable-md navbar-light bg-faded mb-5">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

	       <ul class="nav navbar-nav navbar-right">
           <!-- Authentication Links -->
          @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Zarejestruj') }}</a>
              </li>
          @endif
          @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Wyloguj') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Język</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ URL::to('language/pl') }}">Polski</a>
              <a class="dropdown-item" href="{{ URL::to('language/en') }}">Angielski</a>
            </div>
        </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ URL::to('books') }}">Książki</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ URL::to('books/cheapest') }}">Top 3 najtańszych</a>
              <a class="dropdown-item" href="{{ URL::to('books/longest') }}">Top 3 najdłuższych</a>
              <a class="dropdown-item" href="{{ URL::to('books') }}">Wszystkie</a>
              <a class="dropdown-item" href="{{ URL::to('books/create') }}">Dodaj nową</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ URL::to('loans') }}">Wypożyczenia</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ URL::to('loans') }}">Wszystkie</a>
              <a class="dropdown-item" href="{{ URL::to('loans/create') }}">Dodaj nową</a>
              </div>
          </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ URL::to('authors') }}">Autorzy</a>
           <div class="dropdown-menu">
             <a class="dropdown-item" href="{{ URL::to('authors') }}">Wszyscy</a>
             <a class="dropdown-item" href="{{ URL::to('authors/create') }}">Dodaj nowego</a>
             </div>
         </li>


          @endguest
        </ul>
   </div>
</nav>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@yield('content')


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/ tether.min.js"> </script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="{{ URL::asset('js/code.js') }} "></script>

  </body>
</html>
