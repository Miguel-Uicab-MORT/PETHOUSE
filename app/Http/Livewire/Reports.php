<?php

namespace App\Http\Livewire;

use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class Reports extends Component
{
    use WithPagination;

    public $search;
    public $venta;
    public $type_search = 1, $selectSearch = "id";

    public function show(Venta $venta)
    {
        return redirect()->route('reports.show', $venta);
    }

    public function delete(Venta $venta)
    {
        $venta->delete();
        $this->render();
    }

    public function updatedTypeSearch($value)
    {
        if ($value == 1) {
            $this->selectSearch = "id";
            $this->search = "";
        } elseif ($value == 2) {
            $this->selectSearch = "created_at";
            $this->search = "";
        }
    }

    public function render()
    {
        $ventas = Venta::where($this->selectSearch, 'LIKE', '%' . $this->search . '%')
        ->orderBy($this->selectSearch, 'Desc')->paginate();

        return view('livewire.reports', compact('ventas'));
    }
}
