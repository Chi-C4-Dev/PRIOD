<?php

namespace App\Livewire;

use App\Models\categoria;
use App\Models\servico;
use Livewire\Component;

class AdminServicos extends Component
{
    public $servicos, $categorias;
    public $nome, $descricao, $categoria_id, $servicoId;
    public $isEditMode = false;
    public $searchTerm = '';

    public function mount()
    {
        $this->categorias = categoria::all();
        $this->refreshServicos();
    }

    public function updatedSearchTerm()
    {
        $this->refreshServicos();
    }

    public function refreshServicos()
    {
        $this->servicos = servico::with('categoria')
            ->when($this->searchTerm, function ($query) {
                $query->where('nome', 'like', '%' . $this->searchTerm . '%')
                      ->orWhereHas('categoria', function ($subQuery) {
                          $subQuery->where('nome', 'like', '%' . $this->searchTerm . '%');
                      });
            })
            ->get();
    }

    public function resetForm()
    {
        $this->nome = '';
        $this->descricao = '';
        $this->categoria_id = '';
        $this->servicoId = null;
        $this->isEditMode = false;
    }

    public function createServico()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

        Servico::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'categoria_id' => $this->categoria_id,
        ]);

        session()->flash('message', 'Serviço criado com sucesso!');
        $this->resetForm();
        $this->refreshServicos();
        redirect(route('admin-servicos'));

    }

    public function editServico($id)
    {
        $servico = Servico::findOrFail($id);
        $this->servicoId = $servico->id;
        $this->nome = $servico->nome;
        $this->descricao = $servico->descricao;
        $this->categoria_id = $servico->categoria_id;
        $this->isEditMode = true;
    }

    public function updateServico()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

        $servico = Servico::findOrFail($this->servicoId);
        $servico->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'categoria_id' => $this->categoria_id,
        ]);

        session()->flash('message', 'Serviço atualizado com sucesso!');
        $this->resetForm();
        $this->refreshServicos();
        redirect(route('admin-servicos'));
    }

    public function deleteServico($id)
    {
        $servico = servico::findOrFail($id);
        $servico->delete();

        session()->flash('message', 'Serviço deletado com sucesso!');
        $this->refreshServicos();
    }

    public function render()
    {
        return view('livewire.admin-servicos');
    }
}
