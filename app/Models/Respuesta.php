<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;
        /**
     * Asociamos la tabla "respuestas" al Modelo "Respuesta".
     *
     * @var string
     */
    protected $table = 'respuestas';

    //asignamos como clave primaria el "id" de la tabla
    protected $primaryKey ="id";
  
    /**
      * Atributos del Modelo Categoria.
      *
      * @var array
      */
     protected $fillable = [
         'pregunta_id',
         'respuesta',  
         'es_correcta', 
         'created_at',
         'updated_at'
     ];
}
