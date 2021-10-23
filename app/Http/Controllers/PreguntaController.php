<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pregunta;
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
        $preguntas = Pregunta::paginate(25);
        return view('welcome',compact('preguntas'));
    }

    /**
     * Retornamos una vista con un formulario en Html para poder capturar la informacion de la pregunta
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Cargamos las categorias 
        $categorias = Categoria::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
