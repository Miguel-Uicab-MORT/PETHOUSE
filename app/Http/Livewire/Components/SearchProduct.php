<?php

namespace App\Http\Livewire\Components;

use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Servicio;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class SearchProduct extends Component
{
    public $search, $searchClient;
    public $alert = false;
    public $producto;
    public $qty = 1, $options = [];
    public $type_search = 1;
    public $selectSearch = 'barcode';
    protected $listeners = ['render' => 'render'];


    public function addProduct(Producto $producto)
    {
        $this->producto = $producto;

        if ($this->qty == null) {
            $this->qty = 1;
        } elseif ($this->producto->stock < $this->qty) {
            $this->qty = $this->producto->stock;
        }
        $this->options['cost'] = $this->producto->cost;
        $this->options['gain'] = $this->producto->price - $this->producto->cost;
        $this->options['type'] = "product";

        Cart::add([
            'id' => $this->producto->id,
            'name' => $this->producto->name,
            'qty' => $this->qty,
            'price' => $this->producto->price,
            'weight' => 550,
            'options' => $this->options
        ]);

        $this->qty = 1;
        $this->emit('render');
    }

    public function addService(Servicio $service)
    {
        $this->service = $service;

        if ($this->qty == null) {
            $this->qty = 1;
        }

        $this->options['cost'] = $this->service->cost;
        $this->options['gain'] = $this->service->price - $this->service->cost;
        $this->options['type'] = "service";

        Cart::add([
            'id' => $this->service->id,
            'name' => $this->service->description,
            'qty' => $this->qty,
            'price' => $this->service->price,
            'weight' => 550,
            'options' => $this->options
        ]);

        $this->qty = 1;
        $this->emit('render');
    }

    public function updatedTypeSearch($value)
    {
        if ($value == 1) {
            $this->selectSearch = "barcode";
            $this->search = "";
        } elseif ($value == 2) {
            $this->selectSearch = "description";
            $this->search = "";
        }
    }

    public function updatedSearch($value)
    {
        $this->alert = false;

        if ($this->type_search == 1) {
            $producto = Producto::where('barcode', $value)
                ->where('status', Producto::Activo)
                ->get();
            if ($producto == null) {
                $this->alert = 1;
            } else {
                foreach ($producto as $item) {
                    $this->addProduct($item);
                    $this->search = "";
                }
                $this->emit('render');
            }
        }
    }

    public function alert()
    {
        if ($this->alert == true) {
            $this->alert = false;
        }
    }

    public function render()
    {
        $productos = Producto::where($this->selectSearch, 'LIKE', '%' . $this->search . '%')
            ->where('status', Producto::Activo)
            ->orderBy($this->selectSearch, 'Desc')->get();

        $servicios = Servicio::where('description', 'LIKE', '%' . $this->search . '%')
            ->where('status', Servicio::Activo)
            ->orderBy('description', 'Desc')
            ->get();

        return view('livewire.components.search-product', compact('productos', 'servicios'));
    }
}
