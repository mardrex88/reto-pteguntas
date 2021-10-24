<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pregunta</title>
</head>
<body>
    @if($errors->any())
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>¡Revise los campos</strong>
                @foreach($errors->all() as $error)
                    <span class="badge badge-danger">{{$error}}</span>
                @endforeach
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"></button>
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif

    <form action="{{ route('preguntas.update',$pregunta->id)}}" method="post">
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
        <input type="text" placeholder="respuesta Verdadera" name="resp_verdadera" value="{{ $pregunta->respuestaCorrecta }}">
       
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
        <Button type="submit">Actualizar</Button>
    </form>
</body>
</html>