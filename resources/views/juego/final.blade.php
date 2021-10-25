@extends('layouts.app')
@section('titulo')
Fin del Juego
@endsection
@section('contenido')
@include('layouts.nav')
<div class="form-signin">
        <p>
        <h3 class="h6 mb-3 font-weight-normal">
        Felicidades {{ $juego_actual->nombre_jugador }}, Completaste el Juego hasta el ultimo Nivel  
        
        Nivel {{ $juego_actual->nivel_alcanzado  }} Puntos Logrados {{ $juego_actual->puntaje}}</h3>    

        </p>
        <a href="{{ route('home') }}" class="btn btn-primary">Volver a Jugar</a>
    </div>

@endsection