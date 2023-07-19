<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('user/dashboard') }}">Quiz SoftPyramid</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

            @if(!Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('auth/login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('auth/register') }}">Register</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('user/dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" aria-current="page" href="{{ url('auth/logout') }}">Logout</a>
                </li>
            @endif
        </ul>
      </div>
    </div>
  </nav>
