<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Preguntas</title>
</head>
<body>
<section class="section">
        <div class="section-header">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{ route('home') }}"><<---Volver</a>
                            <a class="btn btn-warning" href="{{ route('preguntas.create') }}">Nueva Pregunta</a>
                            
                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef;">
                                    <th style=" color:#fff">id</th>
                                    <th style=" color:#fff;">Pregunta</th>
                                    <th style=" color:#fff;">Respuesta Verdadera</th>
                                    <th style=" color:#fff;">Respuesta Falsa 1</th>
                                    <th style=" color:#fff;">Respuesta Falsa 2</th>
                                    <th style=" color:#fff;">Respuesta Falsa 3</th>
                                    <th  style=" color:#fff;">Categoria</th>
                                    <th  style=" color:#fff;">Acciones</th>

                                </thead>
                                <tbody>
                                      @foreach($preguntas as $pregunta)

                                    <tr>
                                        <td>{{$pregunta->id}}</td>
                                        <td>{{$pregunta->pregunta}}</td>
                                        <td>   
                               @php
                               $pregunta->respuestaCorrecta;
                                    foreach ($pregunta->respuestas as $respuesta) {
                                        if($respuesta->es_correcta == 1){
                                        $pregunta->respuestaCorrecta = $respuesta->respuesta;
                                        unset($respuesta);
                                        break;
                                    }
                                }
                               @endphp
                               {{ $pregunta->respuestaCorrecta }}
                                    </td>
                                    @foreach($pregunta->respuestas as $respuestaF) 
                                    @if($respuestaF->respuesta != $pregunta->respuestaCorrecta)
                                        <td>{{ $respuestaF->respuesta}}</td>
                                     @endif
                                    @endforeach
                                    <td>{{ $pregunta->categoria->nombre}}</td>
                                    <td><a class="btn btn-info" href="{{ route('preguntas.edit', $pregunta->id ) }}">Editar</a> | Eliminar</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {!! $preguntas->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>