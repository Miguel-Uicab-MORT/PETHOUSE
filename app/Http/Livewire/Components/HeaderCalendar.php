<?php

namespace App\Http\Livewire\Components;

use App\Models\Cliente;
use App\Models\Servicio;
use Livewire\Component;

class HeaderCalendar extends Component
{

    public function render()
    {
        $clientes = Cliente::all();

        return view('livewire.components.header-calendar', compact('clientes'));
    }
}
