<?php

namespace App\Livewire;

use App\Models\categoria;
use Livewire\Component;

class TestCurso extends Component
{
     public $categorias;
 

    public function render()
    {
        
        return view('livewire.test-curso');
    }


}
