<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Historico;

class JuegoController extends Controller
{

     /**
     * Recibimos el nombre del Jugador para iniciar el Juego
     *
     * @return \Illuminate\Http\Response
     */
    public function iniciarJuego(Request $request)
    {
        //Verificamos que el usuario Ingrese un nombre valido
        $request->validate([
            'nombre'=>'required'
        ]);

     

        
      if(empty($request->session()->get('juego_actual'))){
            $juego = Historico::create([
                'nombre_jugador' => $request['nombre'],
                'puntaje' => 0,  
                'nivel_alcanzado' => 0 , 
                'juego_completado' => false,
                'juego_abandonado' => false
            ]);
            $request->session()->put('juego_actual', $juego);
            return  "Nuevo Historico";
        }else{
          
            return  $request->session()->get('juego_actual');
           
        }

        
        
    }

}
