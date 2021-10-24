<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ronda # $ronda</title>
</head>
<body>
    <a href="{{ route('salir.juego') }}">Salir del Juego</a>
    @if($errors->any())
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>¡Revise los campos</strong>
                @foreach($errors->all() as $error)
                    <span class="badge badge-danger">{{$error}}</span>
                @endforeach
        </div>
    @endif
    <h5>¿{{ $pregunta->pregunta }}?</h5>

    <form action="{{ route('responder') }}" method="post">
    {{ csrf_field() }}
    <ul>
        @foreach($pregunta->respuestas->shuffle() as $respuesta)
        <li><input type="radio" name="respuesta" value="{{ $respuesta->id }}">{{ $respuesta->respuesta }}</li>
        @endforeach

    </ul>

<button type="submit">Enviar Respuesta</button>
    </form>
</body>
</html>