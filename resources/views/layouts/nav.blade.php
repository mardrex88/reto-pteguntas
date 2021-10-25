<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
  <a class="navbar-brand" href=" {{ route('home') }}">CUANTO SABES?</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ajustes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('/preguntas') }}">Configurar Preguntas</a>
          <a class="dropdown-item" href="{{ route('historico') }}">Ver Historico</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Ayuda</a>
        </div>
      </li>
    </ul>
  </div>
</nav>