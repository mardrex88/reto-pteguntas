<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    /**
     * Asociamos la tabla "categorias" con el Modelo Categoria.
     *
     * @var string
     */
    protected $table = 'categorias';

    //asignamos como clave primaria el "id" de la tabla
    protected $primaryKey ="id";
  
    /**
      * Atributos del Modelo Categoria.
      *
      * @var array
      */
     protected $fillable = [
         'nombre',
         'nivel',  
         'puntos', 
         'created_at',
         'updated_at'
     ];
}
