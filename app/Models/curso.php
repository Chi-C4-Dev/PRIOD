<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    /** @use HasFactory<\Database\Factories\CursoFactory> */
    use HasFactory;

    protected $fillable =[
        'nome',
        'preco',
        'descricao',
        'coneudo',
        'duracao',
        'modalidade',
        'turma'
    ];
}
