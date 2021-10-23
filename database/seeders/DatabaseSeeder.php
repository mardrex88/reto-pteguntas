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
        $categoria = new Categoria();
        $categoria->nombre = "Facil";
        $categoria->nivel = 1;
        $categoria->puntos = 10;
        $categoria->save();

        $categoria2 = new Categoria();
        $categoria2->nombre = "Normal";
        $categoria2->nivel = 2;
        $categoria2->puntos = 20;
        $categoria2->save();

        $categoria3 = new Categoria();
        $categoria3->nombre = "Dificil";
        $categoria3->nivel = 3;
        $categoria3->puntos = 30;
        $categoria3->save();

        $categoria = new Categoria();
        $categoria4->nombre = "Experto";
        $categoria4->nivel = 4;
        $categoria4->puntos = 40;
        $categoria4->save();

        $categoria5 = new Categoria();
        $categoria5->nombre = "Leyenda";
        $categoria5->nivel = 5;
        $categoria5->puntos = 50;
        $categoria5->save();
    }
}
