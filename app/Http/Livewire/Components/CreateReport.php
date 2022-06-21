<?php

namespace App\Http\Livewire\Components;

use App\Models\Report;
use App\Models\Venta;
use Carbon\Carbon;
use Livewire\Component;

class CreateReport extends Component
{
    public $create = false;
    public $tEfectivo = 0, $c_Efectivo = 0, $dEfectivo = 0;
    public $tTarjeta = 0, $c_Tarjeta = 0, $dTarjeta = 0;
    public $tTotal, $c_Total = 0, $dTotal;
    public $r_Efectivo = 0, $r_Tarjeta = 0, $rTotal = 0, $caja = 0;
    public $latestCaja = 0;


    public function create()
    {
        if ($this->create == false) {
            $this->create = true;
        } else {
            $this->create = false;
        }
    }

    public function updatedCEfectivo()
    {
        if ($this->c_Efectivo != null) {
            $this->dEfectivo = $this->c_Efectivo - $this->tEfectivo;
            $this->c_Total = $this->c_Tarjeta + $this->c_Efectivo;

            $this->r_Efectivo = $this->c_Efectivo;
            $this->rTotal = $this->r_Efectivo + $this->r_Tarjeta;
            $this->caja = $this->c_Total - $this->rTotal + $this->latestCaja;
        }
    }

    public function updatedCTarjeta()
    {
        if ($this->c_Tarjeta != null) {
            $this->dTarjeta = $this->c_Tarjeta - $this->tTarjeta;
            $this->c_Total = $this->c_Tarjeta + $this->c_Efectivo;

            $this->r_Tarjeta = $this->c_Tarjeta;
            $this->rTotal = $this->r_Efectivo + $this->r_Tarjeta;
            $this->caja = $this->c_Total - $this->rTotal + $this->latestCaja;
        }
    }

    public function updatedREfectivo()
    {
        if ($this->r_Efectivo != null) {
            $this->rTotal = $this->r_Efectivo + $this->r_Tarjeta;
            $this->caja = $this->c_Total - $this->rTotal + $this->latestCaja;
        }
    }

    public function updatedRTarjeta()
    {
        if ($this->r_Tarjeta != null) {
            $this->rTotal = $this->r_Efectivo + $this->r_Tarjeta;
            $this->caja = $this->c_Total - $this->rTotal + $this->latestCaja;
        }
    }

    public function store()
    {
        $corte = new Report();

        $corte->efectivo = $this->c_Efectivo;
        $corte->tarjeta = $this->c_Tarjeta;
        $corte->total = $this->c_Total;

        $corte->rEfectivo = $this->r_Efectivo;
        $corte->rTarjeta = $this->r_Tarjeta;
        $corte->rTotal = $this->rTotal;

        $corte->dEfectivo = $this->dEfectivo;
        $corte->dTarjeta = $this->dTarjeta;
        $corte->dTotal = $this->dTotal;

        $corte->caja = $this->caja;

        $corte->user_id = auth()->user()->id;

        $corte->save();
        $this->create = false;
    }

    public function render()
    {

        $today = Carbon::now()->format('Y-m-d');

        $cajero = auth()->user()->id;

        $report = Report::latest('created_at')->first();

        if ($report != null) {
            $this->latestCaja = $report->caja;
        }


        $this->tEfectivo = Venta::whereDate('created_at', $today)
            ->where('user_id', $cajero)
            ->sum('rEfectivo');
        $this->tTarjeta = Venta::whereDate('created_at', $today)
            ->where('user_id', $cajero)
            ->sum('rTarjeta');


        $this->tTotal = $this->tTarjeta + $this->tEfectivo;
        $this->dTotal = $this->dTarjeta + $this->dEfectivo;



        return view('livewire.components.create-report', compact('cajero', 'report'));
    }
}
