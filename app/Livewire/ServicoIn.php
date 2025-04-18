<?php

namespace App\Livewire;

use App\Models\categoria;
use Livewire\Component;

class ServicoIn extends Component
{ 
    public $categorias;

    
    public function render()
    { 
        $this->categorias = categoria::with('servicos')->get();

        return view('livewire.servico-in');  
    }
 
   /* public function getServicos()
    {
       // Recupera categorias com seus serviços associados
      // $this-> categorias = Categoria::with('servicos')->get(); 

        // Busca todas as categorias primeiro, sem carregar os serviços ainda
    $this->categorias = categoria::all();

    // Agora, carregamos os serviços apenas se as categorias existirem
    $this->categorias->load('servicos');
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
  