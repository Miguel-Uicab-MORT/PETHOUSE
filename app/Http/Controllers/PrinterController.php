<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use PDF;

class PrinterController extends Controller
{

    public function ticket($ventaid)
    {
        $cajero = auth()->user()->name;
        $venta = Venta::find($ventaid);
        $pdf = PDF::loadview('components.indexticket', compact('venta', 'cajero'));
        $pdf->setpaper(array(0, 0, 48, 841), 'portrait');
        return $pdf->stream();
    }
}
