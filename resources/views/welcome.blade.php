@extends('layouts.app')
@section('titulo')
Bienvenido a Cuanto sabes?
@endsection
@section('contenido')
@include('layouts.nav')
<form class="form-signin" action="{{ route('iniciar') }}" method="post">
@if($errors->any())
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>¡Revise los campos que esten correctos</strong>
           
        </div>
    @endif

{{ csrf_field() }}
<h1 class="h2 mb-3 font-weight-normal">BIENVENIDO A CUANTO SABES?</h1>
<br>
<h1 class="h3 mb-3 font-weight-normal">Ingrese su Nombre</h1>
<label for="nombre" class="sr-only">Nombre Jugador</label>
<input type="text" class="form-control" name="nombre" id="nombre">
<br>
<button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Juego</button>

</form>
@endsection

