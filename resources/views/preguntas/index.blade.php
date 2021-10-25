<!DOCTYPE html>
<html lang="en">
<head>
  <title>Preguntas</title>
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
          <a class="dropdown-item" href="{{ route('historico')}}">Ver Historico</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Ayuda</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid">
    <div class="row">
    <a class="btn btn-info" href="{{ route('home') }}">Volver</a> 
  |
    <a class="btn btn-success" href="{{ route('preguntas.create') }}">Nueva Pregunta</a>
</div>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Pregunta</th>
        <th scope="col">Respuesta Verdadera</th>
        <th scope="col">Respuesta Falsa 1</th>
        <th scope="col">Respuesta Falsa 2</th>
        <th scope="col">Respuesta Falsa 3</th>
        <th scope="col">Categoria</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach($preguntas as $pregunta)
      <tr>
        
        <td>{{$pregunta->id}}</td>
        <td>{{$pregunta->pregunta}}</td>
        <td>   
    @php
    $pregunta->respuestaCorrecta;
        foreach ($pregunta->respuestas as $respuesta) {
            if($respuesta->es_correcta == 1){
            $pregunta->respuestaCorrecta = $respuesta->respuesta;
            unset($respuesta);
            break;
        }
    }
    @endphp
    {{ $pregunta->respuestaCorrecta }}
        </td>
        @foreach($pregunta->respuestas as $respuestaF) 
        @if($respuestaF->respuesta != $pregunta->respuestaCorrecta)
            <td>{{ $respuestaF->respuesta}}</td>
            @endif
        @endforeach
        <td>{{ $pregunta->categoria->nombre}}</td>
        <td> 
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Opciones
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('preguntas.edit', $pregunta->id ) }}">Editar</a>
          <a class="dropdown-item" href="{{ route('preguntas.edit', $pregunta->id ) }}">Eliminar</a>
        </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>


