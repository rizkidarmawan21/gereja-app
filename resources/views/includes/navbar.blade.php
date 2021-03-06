  <!-- Navbar -->
  <div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
      <a href="/" class="navbar-brand">
        <img src="{{ url('frondend/images/logo.png') }}" alt="Logo Nomads" />
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"> </span>
      </button>
      <div class="collapse navbar-collapse" id="navb">
        <ul class="navbar-nav ml-auto mr-3">
          <li class="nav-item mx-md-2">
            <a href="{{ url('/') }}" class="nav-link active">Home</a>
          </li>
          <li class="nav-item mx-md-2">
            <a href="{{ url('/#event') }}" class="nav-link">Event</a>
          </li>
          <li class="nav-item mx-md-2">
            <a href="{{ url('/#pastor') }}" class="nav-link">Pastor</a>
          </li>
          
          @auth

          <li class="nav-item mx-md-2 dropdown">
            <a href="" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu">
              <a href="{{ route('profile') }}" class="dropdown-item">Profil</a>
              <a href="{{ route('my-event') }}" class="dropdown-item">Event Saya</a>
            </div>
          </li>
            
          @endauth

        </ul>
        @guest  
        <!-- Mobile Button -->
        <form class="form-inline d-sm-block d-md-none">
          <button class="btn btn-login my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ route('login') }}';">Masuk</button>
        </form>
        <!-- Desktop Button -->
        <form class="form-inline my-2 my-lg-0 d-none d-md-block">
          <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ route('login') }}';">
            Masuk
          </button>
        </form>
        @endguest

        @auth 
        <!-- Mobile Button -->
        <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
          @csrf
          <button class="btn btn-login my-2 my-sm-0 px-4" type="submit">Keluar</button>
        </form>
        <!-- Desktop Button -->
        <form class="form-inline my-2 my-lg-0 d-none d-md-block"  action="{{ url('logout') }}" method="POST">
          @csrf
          <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
            Keluar
          </button>
        </form>
        @endauth
        
      </div>
    </nav>


  </div>