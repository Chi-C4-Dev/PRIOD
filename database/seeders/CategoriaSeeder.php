<?php

namespace Database\Seeders;

use App\Models\categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Desativa as verificações de chaves estrangeiras (PostgreSQL)
    DB::statement('ALTER TABLE cursos DISABLE TRIGGER ALL;');
 
    // Truncar a tabela
    DB::table('categorias')->truncate();

   
    // Reabilita as verificações de chaves estrangeiras (PostgreSQL)
    DB::statement('ALTER TABLE cursos ENABLE TRIGGER ALL;');

        //categoria::truncate();

        Categoria::create(['nome' => 'Formação e Consultoria', 'descricao' => 'Capacitação e consultoria para indústria e público.']);
        Categoria::create(['nome' => 'Desenvolvimento de Softwares', 'descricao' => 'Softwares para diversos objetivos sociais.']);
        Categoria::create(['nome' => 'Manutenção e Network', 'descricao' => 'Manutenção técnica e configuração de redes.']);
    
    }
}
