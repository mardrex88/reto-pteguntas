<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear una Pregunta</title>
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

    <form action="{{ route('preguntas.store')}} " method="post">
    {{ csrf_field() }}
        <label for="">Por favor ingrese la pregunta</label>
        <br>
        <input type="text" placeholder="Pregunta" name="pregunta" id="pregunta">
        <br>
        <label for="">Ingrese la respuesta Correcta</label>
        <br>
        <input type="text" placeholder="respuesta Verdadera" name="resp_verdadera">
        <br>
        <label for="">Por favor ingrese la respuesta falsa 1</label>
        <br>
        <input type="text" placeholder="respuesta Falsa 1" name="resp_falsa[0]">
        <br>
        <label for="">Por favor ingrese la respuesta falsa 2</label>
        <br>
        <input type="text" placeholder="respuesta Falsa 2" name="resp_falsa[1]">
        <br>
        <label for="">Por favor ingrese la respuesta falsa 3</label>
        <br>
        <input type="text" placeholder="respuesta Falsa 3" name="resp_falsa[2]">
        <br>
        <label for="categoria">Selecciona una Categoria:</label>
            <select name="categoria" id="cars">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre}}</option>
            @endforeach
            </select>
        <Button type="submit">Enviar</Button>
    </form>
</body>
</html>