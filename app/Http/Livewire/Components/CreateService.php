<?php

namespace App\Http\Livewire\Components;

use App\Models\Categoria;
use App\Models\Servicio;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateService extends Component
{
    public $create = false;
    public $servicio, $categorias, $statusList;
    public $categoria_id, $name, $slug, $description, $cost, $comissionforsale, $comissionfordoing, $price, $status, $barcode;

    protected $rules = [
        'categoria_id' => 'required',
        'name' => 'required',
        'slug' => 'required|unique:productos,slug',
        'description' => 'required',
        'cost' => 'required',
        'comissionforsale' => 'required',
        'comissionfordoing' => 'required',
        'price' => 'required',
        'status' => 'required'
    ];

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function create()
    {
        if ($this->create == false) {
            $this->create = true;
        } else {
            $this->create = false;
            $this->reset(['categoria_id', 'name', 'slug', 'description', 'cost', 'price', 'comissionforsale', 'comissionfordoing', 'status', 'create']);
        }
    }

    public function store()
    {

        $this->validate();

        $servicio = new Servicio();

        $servicio->categoria_id = $this->categoria_id;
        $servicio->name = $this->name;
        $servicio->slug = $this->slug;
        $servicio->description = $this->description;
        $servicio->cost = $this->cost;
        $servicio->comissionforsale = $this->comissionforsale;
        $servicio->comissionfordoing = $this->comissionfordoing;
        $servicio->price = $this->price;
        $servicio->status = $this->status;

        $servicio ->save();
        $this->reset(['categoria_id', 'name', 'slug', 'description', 'cost', 'price', 'comissionforsale', 'comissionfordoing', 'status', 'create']);

        $this->emit('render');
    }

    public function mount()
    {
        $this->categorias = Categoria::pluck('name', 'id');
        $this->statusList = ['1' => 'Activo', '2' => 'Inactivo'];
    }

    public function render()
    {
        return view('livewire.components.create-service');
    }
}
