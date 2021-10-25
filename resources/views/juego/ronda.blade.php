@extends('layouts.app')

@section('contenido')
@include('layouts.nav')
<form class="form-signin" action="{{ route('responder') }}" method="post">
   
 
    <h3 class="h6 mb-3 font-weight-normal">Hola {{ $juego_actual->nombre_jugador }}, Actualmente te encuentras participando en la ronda #{{$ronda}} | Nivel {{ $juego_actual->nivel_alcanzado + 1  }} | Categoria {{ $pregunta ->categoria->nombre}}| Puntos en Juego {{ $pregunta ->categoria->puntos}} | Puntos Acumulados {{ $juego_actual->puntaje}}</h3>


{{ csrf_field() }}
<h1 class="h3 mb-3 font-weight-normal">¿{{ $pregunta->pregunta }}?</h1>

<div class="row">
    <div class="col-sm">
    @foreach($pregunta->respuestas->shuffle() as $respuesta)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="respuesta" id="radio{{ $respuesta->id }}" value="{{ $respuesta->id }}" >
            <label class="form-check-label" for="radio{{ $respuesta->id }}">
            {{ $respuesta->respuesta }}
            </label>
        </div>
        @endforeach
    </div>
  </div>
<button class="btn btn-lg btn-primary btn-block" type="submit">Responder</button>
<br>
<p><a href="{{ route('salir.juego') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" onclick="return confirmation()">Retirarme</a></p>
</form>




    </form>
    
    <script type="text/javascript">
     function confirmation() 
     {
        if(confirm("Esta seguro que desea retirarse?"))
	{
	   return true;
	}
	else
	{
	   return false;
	}
     }
    </script>
@endsection
