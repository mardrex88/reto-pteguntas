@extends('layouts.app')
@section('titulo')
Nueva Pregunta
@endsection
@section('contenido')
@include('layouts.nav')
    @if($errors->any())
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <strong>¡Revise los campos que esten correctos</strong>
        </div>
    @endif
    
    <form class="form-signin" action="{{ route('preguntas.store')}} " method="post">
    <h1 class="h3 mb-3 font-weight-normal">Nueva Pregunta</h1>
    {{ csrf_field() }}
        <label for="">Por favor ingrese la pregunta</label>
        <br>
        <input type="text"  name="pregunta" id="pregunta">
        <br>
        <label for="">Ingrese la respuesta Correcta</label>
        <br>
        <input type="text"  name="resp_verdadera" class="bg-success">
        <br>
        <label for="">Por favor ingrese la respuesta falsa 1</label>
        <br>
        <input type="text" name="resp_falsa[0]">
        <br>
        <label for="">Por favor ingrese la respuesta falsa 2</label>
        <br>
        <input type="text" name="resp_falsa[1]">
        <br>
        <label for="">Por favor ingrese la respuesta falsa 3</label>
        <br>
        <input type="text" name="resp_falsa[2]">
        <br>
        <br>
        <label for="categoria">Selecciona una Categoria:</label>
            <select name="categoria" id="cars">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre}}</option>
            @endforeach
            </select>
        <Button type="submit" class="btn btn-success">Crear</Button>
    </form>
@endsection