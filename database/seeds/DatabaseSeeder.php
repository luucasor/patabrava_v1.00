<?php

use Illuminate\Database\Seeder;
use patabrava\Categoria;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CategoriaTableSeeder::class);
    }
}

class CategoriaTableSeeder extends Seeder {
    public function run()
    {
        Categoria::create(['nome' => 'ANÉL']);
        Categoria::create(['nome' => 'BRINCO']);
        Categoria::create(['nome' => 'COLAR']);
        Categoria::create(['nome' => 'PULSEIRA']);
    }
}
