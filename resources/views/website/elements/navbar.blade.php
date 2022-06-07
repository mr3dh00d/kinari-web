<nav class="navbar navbar-expand-lg navbar-dark ff-kaushan">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/img/logo.png" class="img-fluid logo-navbar" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item text-center px-2"> 
                <a class="nav-link active" aria-current="page" href="/carta">
                    <i class="fa-solid fa-bell-concierge me-2"></i>
                    Menú
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <img src="/img/local_blanco.png" class="img-fluid" alt="" width="40" class="d-inline-block align-text-top">
                    Local
                </a>
            </li> --}}
            @auth
              <li class="nav-item text-center dropdown">
                <a class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-user"></i>
                  {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <form method="POST" action="/logout" name="logOut"> 
                    @csrf
                    <li>
                      <button type="submit" class="btn btn-link" id="btn_logout">
                        <span class="nav_name">Cerrar Sesion</span>
                      </button>
                    </li>
                  </form>
                </ul>
              </li>
            @else
              <li class="nav-item text-center dropdown">
                  <a class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                      Ingresar
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/acceso">Iniciar Sesion</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="/registro">Registrarse</a></li>
                  </ul>
              </li>
            @endauth
        </ul>
      </div>
    </div>
  </nav>