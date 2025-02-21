<?php

namespace App\Livewire;

use Livewire\Component;

class ServiceInRelease extends Component
{
    public $categorias;

    public function render()
    {
        $this ->categorias = categoria::with('servicos')->get();
        return view('livewire.service-in-release', compact('categorias'));
    }
}
