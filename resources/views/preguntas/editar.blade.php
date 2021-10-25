@extends('layouts.app')

@section('contenido')
@include('layouts.nav')

    @if($errors->any())
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <strong>¡Revise los campos que esten correctos</strong>
               
        </div>
    @endif

    <form action="{{ route('preguntas.update',$pregunta->id)}}" method="post" class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Editar Pregunta</h1>
    <input name="_method" type="hidden" value="PUT">
    {{ csrf_field() }}
        <label for="">Por favor ingrese la pregunta</label>
        <br>
        <input type="text" placeholder="Pregunta" name="pregunta" id="pregunta" value="{{ $pregunta->pregunta }}">
        <br>
       
        <label for="">Ingrese la respuesta Correcta</label>
        <br>
        @php
        $i=0;
        $pregunta->respuestaCorrecta;
            foreach ($pregunta->respuestas as $respuesta) {
                if($respuesta->es_correcta == 1){
                $pregunta->respuestaCorrecta = $respuesta->respuesta;
                unset($respuesta);
                break;
            }
        }
        @endphp
        
        <input type="text" class="bg-success" placeholder="respuesta Verdadera" name="resp_verdadera" value="{{ $pregunta->respuestaCorrecta }}">

        @foreach($pregunta->respuestas as $respuestaF) 
            @if($respuestaF->respuesta != $pregunta->respuestaCorrecta)
            <br>
                <label for="">Por favor ingrese la respuesta falsa 1</label>
                <br>
                <input type="text" placeholder="respuesta Falsa {{$i}}" name="resp_falsa[{{$i}}]" value =" {{ $respuestaF->respuesta}}">
                @php
                $i++;
                @endphp
            @endif
        @endforeach
        
        <br>
        <br>
        <label for="categoria">Selecciona una Categoria:</label>
            <select name="categoria" id="cars">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" 
                @if($categoria->id == $pregunta->categoria_id)    
                selected
                @endif
                >{{ $categoria->nombre}}</option>
            @endforeach
            </select>
        <Button type="submit" class="btn btn-primary">Actualizar</Button>
    </form>

    @endsection