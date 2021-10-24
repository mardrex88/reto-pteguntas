<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
<a href="{{ url('/preguntas') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Preguntas</a>

@if($errors->any())
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>¡Revise los campos</strong>
                @foreach($errors->all() as $error)
                    <span class="badge badge-danger">{{$error}}</span>
                @endforeach
        </div>
    @endif
<form action="{{ route('iniciar') }}" method="post">
{{ csrf_field() }}
<h3>Ingrese su Nombre</h6>
<input type="text" name="nombre" id="nombre">
<br>
<button type="submit">Iniciar Juego</button>

</form>
</body>
</html>
