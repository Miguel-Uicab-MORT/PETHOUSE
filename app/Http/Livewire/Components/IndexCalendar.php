<?php

namespace App\Http\Livewire\Components;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Servicio;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class IndexCalendar extends LivewireCalendar
{
    public $create = false;
    public $edit = false;
    public $selectedCita, $cita, $servicios = [], $clientes = [];
    public $status = [
        '1' => 'Confirmada',
        '2' => 'Pendiente',
        '3' => 'Cancelada',
    ];
    protected $rulesCreate = [];
    protected $rules = [
        'selectedCita.scheduled_at' => 'required',
        'selectedCita.time' => 'required',
        'selectedCita.status' => 'required',
        'selectedCita.servicio_id' => 'required',
        'selectedCita.cliente_id' => 'required',
    ];


    public function events(): Collection
    {
        return Cita::query()
            ->whereDate('scheduled_at', '>=', $this->gridStartsAt)
            ->whereDate('scheduled_at', '<=', $this->gridEndsAt)
            ->get()
            ->map(function (Cita $cita) {
                return [
                    'id' => $cita->id,
                    'title' => $cita->servicio->name,
                    'description' => $cita->cliente->name . "\n" . $cita->time,
                    'date' => $cita->scheduled_at,
                    'status' => $cita->status
                ];
            });
    }

    public function onDayClick($year, $month, $day)
    {
        $this->clientes = Cliente::pluck('name', 'id');
        $this->servicios = Servicio::pluck('name', 'id');
        $this->create = true;
        $this->reset(['cita']);

        $this->cita['scheduled_at'] = Carbon::today()
            ->setDate($year, $month, $day)
            ->format('Y-m-d');
    }

    public function create()
    {
        if ($this->create == true) {
            $this->reset(['create', 'cita']);
        } else {
            $this->clientes = Cliente::pluck('name', 'id');
            $this->servicios = Servicio::pluck('name', 'id');
            $this->create = true;
        }
    }

    public function edit()
    {
        if ($this->edit == true) {
            $this->edit = false;
        }
    }

    public function store()
    {

        $this->rulesCreate = [
            'cita.scheduled_at' => 'required',
            'cita.time' => 'required',
            'cita.status' => 'required',
            'cita.servicio_id' => 'required',
            'cita.cliente_id' => 'required',
        ];

        $this->validate($this->rulesCreate);
        Cita::create($this->cita);
        $this->reset(['cita', 'create']);
    }

    public function onEventClick(Cita $cita)
    {
        $this->selectedCita = $cita;
        $this->validate($this->rules);
        $this->clientes = Cliente::pluck('name', 'id');
        $this->servicios = Servicio::pluck('name', 'id');
        $this->edit = true;
    }

    public function update()
    {
        $this->validate($this->rules);
        $this->selectedCita->save();

        $this->reset(['selectedCita', 'edit']);
    }

    //Metodo para movilidad de fecha dinamica
    public function onEventDropped($eventId, $year, $month, $day)
    {
        $appointment = Cita::find($eventId);
        $appointment->scheduled_at = Carbon::today()->setDate($year, $month, $day);
        $appointment->save();
    }
}
