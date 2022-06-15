<?php

namespace App\Http\Livewire\Components;

use App\Models\Cita;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class DropdownAlert extends Component
{
    public function render()
    {
        $today = Carbon::now();
        $tomorrow = Carbon::now()->add('1', 'day');

        $citas = Cita::whereday('scheduled_at', $today)->get();

        $recordatorios = Cita::whereday('scheduled_at', $tomorrow)->get();

        return view('livewire.components.dropdown-alert', compact('citas', 'recordatorios'));
    }
}
