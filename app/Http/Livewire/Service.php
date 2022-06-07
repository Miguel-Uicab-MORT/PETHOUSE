<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Servicio;
use Livewire\Component;
use Livewire\WithPagination;

class Service extends Component
{
    use WithPagination;

    public $search;
    public $servicio, $categorias, $statusList, $barcode;
    public $edit = false;
    public $type_search = 1;
    public $selectSearch = 'id';

    protected $listeners = ['render' => 'render'];

    protected $rules = [
        'servicio.name' => 'required',
        'servicio.description' => 'required',
        'servicio.slug' => 'required',
        'servicio.cost' => 'required',
        'servicio.comissionforsale' => 'required',
        'servicio.comissionfordoing' => 'required',
        'servicio.price' => 'required',
        'servicio.status' => 'required',
        'servicio.categoria_id' => 'required'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedTypeSearch($value)
    {
        if ($value == 1) {
            $this->selectSearch = "id";
            $this->search = "";
        }elseif ($value == 2) {
            $this->selectSearch = "name";
            $this->search = "";
        }elseif ($value == 3) {
            $this->selectSearch = "description";
            $this->search = "";
        }
    }

    public function edit(Servicio $servicio)
    {
        $this->servicio = $servicio;
        $this->barcode = $this->servicio->barcode;
        $this->validate();

        if ($this->edit == false) {
            $this->edit = true;
        } elseif ($this->edit == true) {
            $this->edit = false;
            $this->reset(['servicio']);
        }
    }

    public function update()
    {
        $this->validate();

        $this->servicio->save();

        $this->edit = false;

        $this->emit('render');
    }

    public function delete(Servicio $servicio)
    {
        $this->servicio = $servicio;
        $this->servicio->delete();
        $this->render();
    }

    public function mount()
    {
        $this->categorias = Categoria::pluck('name', 'id');
        $this->statusList = ['1' => 'Activo', '2' => 'Inactivo'];
    }


    public function render()
    {
        $servicios = Servicio::where($this->selectSearch, 'LIKE', '%' . $this->search . '%')
            ->orderBy($this->selectSearch, 'Desc')
            ->paginate('15');

        return view('livewire.service', compact('servicios'));
    }
}
