<!--Navbar -->  
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow p-3">
    <div class="container">
      <a class="navbar-brand h2" href="/"><i class="bi bi-house-fill"></i> INFOVILLA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav ms-auto">
            @auth
            @if (auth()->user()->isAdmin==1)
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hai, {{ auth()->user()->username }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/profile/{{ Str::slug(auth()->user()->username) }}">Profil Saya</a></li>
                <li><a class="dropdown-item" href="/dashboard/villa">Menu Admin</a></li>
                <li><hr class="dropdown-divider"></li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </ul>
            </li>
            @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hai, {{ auth()->user()->username }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/profile/{{ Str::slug(auth()->user()->username) }}">Profil Saya</a></li>
                <li><a class="dropdown-item" href="#">Villa Favorit</a></li>
                <li><hr class="dropdown-divider"></li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </ul>
            </li>
            @endif
            @else
            <li class="nav-item"> 
              <a class="nav-link ms-auto" href="/login">Login</a>
            </li>
            @endauth  
        </ul>
      </div>
    </div>
  </nav>