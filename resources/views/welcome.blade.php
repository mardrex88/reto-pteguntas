@extends('layouts.app')

@section('contenido')
@include('layouts.nav')
<form class="form-signin" action="{{ route('iniciar') }}" method="post">
@if($errors->any())
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>¡Revise los campos que esten correctos</strong>
           
        </div>
    @endif

{{ csrf_field() }}
<h1 class="h3 mb-3 font-weight-normal">Ingrese su Nombre</h1>
<label for="nombre" class="sr-only">Nombre Jugador</label>
<input type="text" class="form-control" name="nombre" id="nombre">
<br>
<button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Juego</button>
<p><a href="{{ url('/preguntas') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Ajustes</a></p>
</form>
@endsection

