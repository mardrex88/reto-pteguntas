<!DOCTYPE html>
<html lang="en">
<head>
  <title>Historico de Juegos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
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
          <a class="dropdown-item" href="#">Ver Historico</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Ayuda</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid">
    <div class="row">
<p><h1>Historico de Juegos</h1></p>
</div>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre Jugador</th>
        <th scope="col">Puntaje </th>
        <th scope="col">Nivel Alcanzado</th>
        <th scope="col">Juego Completado</th>
        <th scope="col">Abandono el Juego</th>
      </tr>
    </thead>
    <tbody>
        @foreach($historicos as $historico)
      <tr>
      <td>{{ $historico->id}}</td>
      <td>{{ $historico->nombre_jugador}}</td>
      <td>{{ $historico->puntaje}}</td>
      <td>{{ $historico->nivel_alcanzado}}</td>
      <td>
         @if($historico->juego_completado == 1) 
            SI
        @else
            NO
        @endif
      </td>
      <td>@if($historico->juego_abandonado == 1) 
            SI
        @else
            NO
        @endif</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
</div>

</body>
</html>


