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
        // Desativa restrições de chave estrangeira
        DB::statement('SET CONSTRAINTS ALL DEFERRED;');

        // Limpa a tabela
        DB::table('categorias')->truncate();

        // Reativa as restrições de chave estrangeira
        DB::statement('SET CONSTRAINTS ALL IMMEDIATE;');

        // Insere os dados
        Categoria::create(['nome' => 'Formação e Consultoria', 'descricao' => 'Capacitação e consultoria para indústria e público.']);
        Categoria::create(['nome' => 'Desenvolvimento de Softwares', 'descricao' => 'Softwares para diversos objetivos sociais.']);
        Categoria::create(['nome' => 'Manutenção e Network', 'descricao' => 'Manutenção técnica e configuração de redes.']);
    }
}
