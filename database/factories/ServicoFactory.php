<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\servico>
 */
class ServicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->words(2, true), // Nome do serviço
            'descricao' => $this->faker->paragraph(), // Descrição do serviço
            'categoria_id' => \App\Models\Categoria::factory(), // Relacionamento com Categoria
        ];
    }
}
