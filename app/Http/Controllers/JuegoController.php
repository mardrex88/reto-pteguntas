<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Historico;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Categoria;

class JuegoController extends Controller
{

    private $mensaje;
      /**
     * Vista principal del Juego
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //Verificamos si hay un juego en curso
        if(empty($request->session()->get('juego_actual'))){
            return view('welcome');
        }else{
            //Obtenemos la informacion del juego actual
            $juego_actual = $request->session()->get('juego_actual');
                  
            //obtenemos la ronda actual del Juego en curso
            $rondaActual = $juego_actual->nivel_alcanzado + 1;
            //Returna la vista con la ronda correspondiente
            return redirect()->route('crear.ronda',$rondaActual);
        }
        
    }

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
        $this->mensaje="Comencemos";
        $rondaActual = 0;
          //Creamos un registro nuevo de Historico
            $juego = Historico::create([
                'nombre_jugador' => $request['nombre'],
                'puntaje' => 0,  
                'nivel_alcanzado' => 0 , 
                'juego_completado' => false,
                'juego_abandonado' => false
            ]);
            //Guardamos el Objeto Historico del juego actual en Variables de Session
            $juego_actual = $request->session()->put('juego_actual', $juego);
            $rondaActual = 1;
        
        //Returna la visca con la ronda correspondiente
        return redirect()->route('crear.ronda',$rondaActual);
        
    }
    /**
    *
     * @return \Illuminate\Http\Response
     */
    //Se crea la ronda para ser mostrava al usuario
    public function crearRonda(Request $request,$id)
    {
        $juego_actual;
        if(!empty($request->session()->get('juego_actual'))){
            $juego_actual = $request->session()->get('juego_actual');
           
        }
        //Obtenemos una pregunta aleatoria correspondiente al nivel de la ronda
        $pregunta = $this->getPreguntaAleatoria($id);
        //enviamos la pregunta a la vista 
        return view('juego.ronda')->with('pregunta',$pregunta)->with('ronda',$id)->with('juego_actual',$juego_actual);
    }  

    public function responder(Request $request)
    {

        $this->mensaje="";
        //Valida que el usuario si selecciones una respuesta
        $request->validate([
            'respuesta'=>'required'
        ]);
        
        //obtenemos el Objeto de la respuesta seleccionada
        $respuesta = Respuesta::where('id',$request->respuesta)->first();

        //Obtenemos la Informacio del Juego en Curso
        $juego_actual = $request->session()->get('juego_actual');
        
        //validamos que la respuesta seleccionada sea Correcta
        if($respuesta->es_correcta == 1){
            //Si la respuesta es correcta
            //obtenemos la categoria correspondiente a la pregunta 
            $categoria = Categoria::where('id',$juego_actual->nivel_alcanzado +1)->first();
            //Obtenemos el Objeto Historico del Juego actual
            $nuevo_juego = Historico::where('id',$juego_actual->id)->first();
            //Actualizamos el nivel alcanzado y sumamos el puntaje al Juego en Curso
            $nuevo_juego->update([
                'nivel_alcanzado' => $juego_actual->nivel_alcanzado +1,
                'puntaje' => $categoria->puntos + $juego_actual->puntaje
            ]);

            $request->session()->put('juego_actual', $nuevo_juego);
         
            //Validamos si aun hay rondas por jugar
          if($nuevo_juego->nivel_alcanzado+1 < 6){
            //returna la siguiente Ronda
            $this->mensaje = "La respuesta es Correcta"; 
            return redirect()->route('crear.ronda',$nuevo_juego->nivel_alcanzado+1);
          } else{
           //Finalizamos el Juego Con el Ultimo nivel completado
           $nuevo_juego->update([
                'juego_completado' => 1,
            ]);
            //Eliminamos el Juego en Curso
            
            $request->session()->forget('juego_actual');
            $this->mensaje = "Felicidades Terminaste con el Puntaje perfecto"; 
            return view('juego.final')->with('juego_actual',$nuevo_juego);
          }
            
        }else{
             //como la respuesta no es correcta
            //Obtenemos el Objeto Historico del Juego actual
            $nuevo_juego = Historico::where('id',$juego_actual->id)->first();
            //Dejamos un registro de que el Jugador Completo El Juego
            $nuevo_juego->update([
                'juego_completado' => 1,
            ]);
            $request->session()->forget('juego_actual');
            $this->mensaje = "Lo sentimos, la respuesta es incorrecta vuelve a intentar";  
        }

        return view('juego.final')->with('mensaje',$this->mensaje);
    }

    public function salirJuego(Request $request)
    {
        //Obtenemos la Informacio del Juego en Curso
        $juego_actual = $request->session()->get('juego_actual');
        //Cargamos el registroo historico para actualizarlo
        $nuevo_juego = Historico::where('id',$juego_actual->id)->first();
        //Actualizamos el regstro historico indicando que se a retirado del juego
        $nuevo_juego->update([
            'juego_abandonado' => 1,
        ]);
        //Eliminamos el Juego en Curso
        $request->session()->forget('juego_actual');
        return redirect()->route('home');
    }  


    //recibe un nivel 
    public function getPreguntaAleatoria($id)
    {
        //Carga todas las preguntas pertenecientes a la categoria o Nivel actual del juego
        $preguntas = Pregunta::where('categoria_id',$id)->with('respuestas')->with('categoria')->get();
        //Retorna una Pregunta Aleatoriamente
        return $preguntas[array_rand($preguntas->toArray())];
    }

    //retorna una vista con los registros de historico 
    public function historico()
    {
        //Carga todas las preguntas pertenecientes a la categoria o Nivel actual del juego
        $historicos = Historico::orderBy('puntaje', 'desc')->get();
        //Retorna una Pregunta Aleatoriamente
        return view('juego.historico')->with('historicos',$historicos);
    }

}
