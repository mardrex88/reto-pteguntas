<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Categoria;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class PreguntaController extends Controller
{
    /**
     * Returnamos la vista que muestra lista de Preguntas del Juego
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cargamos 25 preguntas para ser listadas en una vista html 
        $preguntas = Pregunta::with('respuestas')->with('categoria')->orderBy('id', 'desc')->paginate(25);
        /* foreach ($preguntas as $pregunta) {
            
           for ($i=0; $i < count($pregunta->respuestas); $i++) { 
               if($pregunta->respuestas[$i]['es_correcta' == TRUE]){
                   $pregunta->respuestaCorrecta = $pregunta->respuestas[$i]['respuesta'];
                   unset($pregunta->respuestas[$i]);
               }
               break;
            }
            */
          /*  foreach ($pregunta->respuestas as $respuesta) {
                if($respuesta->es_correcta == 1){
                  //  $pregunta->respuestaCorrecta = $respuesta->respuesta;
                    unset($respuesta);
                    break;
                }
                
            }
        }*/
        //return $preguntas;
        return view('preguntas.index')->with('preguntas',$preguntas);
    }

    /**
     * Retornamos una vista con un formulario en Html para poder capturar la informacion de la pregunta
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Cargamos las categorias 
        $categorias = Categoria::all();
        //returnamos una vista y le pasamos las categorias
        return view('preguntas.crear')->with('categorias',$categorias);

    }

    /**
     * Recibimos la informacion de la vista Crear en un Objeto de tipo Request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //Validamos que se reciban todos los campos necesarios para crear un registro en la base de datos de una pregunta
        $request->validate([
            'pregunta' => 'required',
            'resp_verdadera' => 'required',
            'resp_falsa' => 'required',
          /*  'resp_falsa1' => 'required',
            'resp_falsa2' => 'required',
            'resp_falsa3' => 'required',
            'categoria' => 'required' */
        ]);
       // dd($request);
        $pregunta = Pregunta::create([
            'pregunta' => $request['pregunta'],
            'categoria_id' => $request['categoria'],
        ]);

        $respVerdadera = Respuesta::create([
            'pregunta_id' => $pregunta->id, 
            'respuesta'   => $request['resp_verdadera'],  
            'es_correcta' => true, 
        ]);

        for($i = 0; $i < 3; ++$i) {
            $respFalsa = Respuesta::create([
                'pregunta_id' => $pregunta->id, 
                'respuesta'   => $request['resp_falsa'][$i],  
                'es_correcta' => false, 
            ]);
        }

        return redirect()->route('preguntas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
  {
        $pregunta = Pregunta::where('id',$id)->with('respuestas')->get();
        
      //  return view('preguntas.editar')->with('pregunta',$pregunta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pregunta = Pregunta::where('id',$id)->with('respuestas')->first();
        $categorias = Categoria::all();
        return view('preguntas.editar')->with('pregunta',$pregunta)->with('categorias',$categorias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Busco la pregunta en la base de datos
        $pregunta = Pregunta::where('id',$id)->with('respuestas')->first();

        $i=0;
        //recorremos las preguntas en busqueda de la respuesta correcta
        foreach ($pregunta->respuestas as $respuesta) {
           
            //si estamos en el registro de la respuesta correcta la actualizamos con $request['resp_verdadera']
            if($respuesta->es_correcta == 1){
                //Actualizamos la Respuesta Correcta
               Respuesta::where('id',$respuesta->id)->update([
                    'respuesta' => $request['resp_verdadera'],
                ]);
            }else{
                Respuesta::find($respuesta->id)->update([
                    'respuesta' => $request['resp_falsa'][$i],
                ]);
                $i++;
            }
            
        }
        $pregunta->update(['categoria_id' => $request['categoria']]);
       return redirect()->route('preguntas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
