<?php

namespace App\Livewire;

use App\Models\categoria;
use Livewire\Component;

class TestCurso extends Component
{
     public $count = 1;
     public $categorias;
 

    public function render()
    {
        
          // Carrega os cursos ao iniciar
          $this->refreshCursos();
        return view('livewire.test-curso');
    }

    
public function increment()
{
    $this->count++;
}

public function decrement()
{
    $this->count--;
}

public function refreshCursos()
{
            
   // Recupera categorias com seus serviços associados
  $this-> categorias = categoria::all();

}
}
