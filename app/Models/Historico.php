<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    /**
     * Asociamos el Modelo Historico con la tabla "historico" de la base de datos
     *
     * @var string
     */
    protected $table = 'historico';

    //asignamos como clave primaria el "id" de la tabla
    protected $primaryKey ="id";
  
       /**
     * Atributos del Modelo Historico.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_jugador',
        'puntaje',  
        'nivel_alcanzado', 
        'nivel_alcanzado',
        'juego_completado',
        'juego_abandonado',
        'created_at',
        'updated_at'
    ];


    /**
     * Relacion del Modelo "Historico" con una "Pregunta"
     */
    public function pregunta()
    {
    	return $this->belongsTo('App\Models\Pregunta');
    }
}
