<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    /**
     * Asociamos la tabla "preguntas" al Modelo "Pregunta".
     *
     * @var string
     */
    protected $table = 'preguntas';

    //asignamos como clave primaria el "id" de la tabla
    protected $primaryKey ="id";
  
    /**
      * Atributos del Modelo Pregunta.
      *
      * @var array
      */
     protected $fillable = [
         'nombre',
         'nivel',  
         'puntos',
         'categoria_id', 
         'created_at',
         'updated_at'
     ];


    /**
     * Relacion uno a muchos entre el Modelo "Pregunta" y muchas "Respuesta"
     */
    public function respuestas()
    {
        return $this->hasMany('App\Models\Respuesta');
    }
}
