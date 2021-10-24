<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Categoria;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categoria = Categoria::create([
        "nombre" => "Facil",
        "nivel"=> 1,
        "puntos" => 10  
        ]);

        $categoria = Categoria::create([
        "nombre" => "Normal",
        "nivel"=> 2,
        "puntos" => 20  
            ]);

        $categoria = Categoria::create([
             "nombre" => "Dificil",
            "nivel"=> 3,
             "puntos" => 30  
             ]);

       $categoria = Categoria::create([
          "nombre" => "Experto",
          "nivel"=> 4,
          "puntos" => 40  
           ]);

        $categoria = Categoria::create([
             "nombre" => "Leyenda",
             "nivel"=> 5,
             "puntos" => 50  
              ]);

    }
}
