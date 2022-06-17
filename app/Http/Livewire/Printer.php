<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Mike42\Escpos\PrintConnectors\CupsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer as EscposPrinter;

class Printer extends Component
{
    public function printTicket()
    {
        $nombreImpresora = "MINIPRINT";
        $connector = new CupsPrintConnector($nombreImpresora);
        $impresora = new EscposPrinter($connector);
        $impresora->setJustification(EscposPrinter::JUSTIFY_CENTER);
        $impresora->setEmphasis(true);
        $impresora->text("Ticket de venta\n");
        $impresora->setEmphasis(false);
        $impresora->text("Col. 20 de noviembre, C. Francisco Imadero Entre Pino Suárez, CP: 24085\n");
        $impresora->text("ruizgarciajoseignacio7@gmail.com\n");
        $impresora->text("9811385479\n");
        $impresora->text("-------------------------------\n");
        $impresora->text("-------------------------------\n");
        $impresora->feed(2);
        $impresora->close();
    }

    public function render()
    {
        return view('livewire.printer');
    }
}
