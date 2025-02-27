<?php

namespace App\Livewire;

use App\Models\categoria;
use Livewire\Component;

class ServicoIn extends Component
{
    public $categorias;

   
    public function render()
    { 
        $this->getServicos();
        return view('livewire.servico-in');  
    }
 
    public function getServicos()
    {
       // Recupera categorias com seus serviços associados
       $this-> categorias = Categoria::with('servicos')->get();
    }
     
/*
    public function getServicos()
{
    // Verifique se as categorias existem e possuem serviços
    $categorias = categoria::with('servicos')->get();

    if ($categorias->isEmpty()) {
        dd("Nenhuma categoria encontrada.");
    }

    foreach ($categorias as $categoria) {
        if ($categoria->servicos->isEmpty()) {
            dd("A categoria {$categoria->nome} não tem serviços.");
        }
    }

    $this->categorias = $categorias;
}  */

}
  