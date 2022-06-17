<?php

namespace App\Http\Livewire\Components;

use App\Models\Producto;
use App\Models\Venta;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\CupsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use PDF;

class PaymentSale extends Component
{
    public $paymentModal = false;
    public $cambioModal = false;
    public $subtotal = 0;
    public $total = 0;
    public $recibido;
    public $cambio = 0;
    public $costo = 0;
    public $ganancia = 0;
    public $producto;
    protected $rules = [
        'recibido' => 'required',
    ];

    public function updateTicket($value)
    {
        $this->ticket = $value;
    }

    public function paymentModal()
    {
        if ($this->paymentModal == false) {
            $this->paymentModal = true;
            $this->subtotal = Cart::subtotal();
        } elseif ($this->paymentModal == true) {
            $this->paymentModal = false;
            $this->subtotal = 0;
        }
    }

    public function cambioModal()
    {
        if ($this->cambioModal == false) {
            $this->cambioModal = true;
        } elseif ($this->cambioModal == true) {
            $this->cambioModal = false;
            $this->paymentModal = false;
            Cart::destroy();
            redirect()->route('pointsale.create');
        }
    }

    public function paymentSale()
    {
        $this->validate();

        foreach (Cart::content() as $item) {
            $this->costo += $item->options->cost * $item->qty;
            $this->ganancia += $item->options->gain * $item->qty;
            $this->total += $item->qty * $item->price;
        }

        $this->cambio = $this->recibido - $this->total;

        $venta = new Venta();

        $venta->costo = $this->costo;
        $venta->total = $this->total;
        $venta->ganancia = $this->ganancia;
        $venta->recibido = $this->recibido;
        $venta->cambio = $this->cambio;
        $venta->content = Cart::content();
        $venta->user_id = auth()->user()->id;

        $venta->save();

        $items = json_decode($venta->content);

        foreach ($items as $item) {
            if ($item->options->type == "product") {
                $this->producto = Producto::find($item->id);
                $this->producto->stock = $this->producto->stock - $item->qty;
                if ($this->producto->stock == 0) {
                    $this->producto->status = Producto::Inactivo;
                }
                $this->producto->save();
            }
        }

        $this->printTicket($venta);

        $this->cambioModal();
    }

    public function printTicket(Venta $venta)
    {
        $nombreImpresora = "MINIPRINT-2";
        $connector = new WindowsPrintConnector($nombreImpresora);
        $logo = EscposImage::load("img/logo-bn2.png");
        $impresora = new Printer($connector);
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->bitImageColumnFormat($logo);
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->setEmphasis(true);
        $impresora->text("Ticket de venta\n");
        $impresora->setEmphasis(false);
        $impresora->text("Av Luis Donaldo Colosio Murrieta No.70 entre calle jalisco y\n calle Ecuador, Barrio de Santa Ana, local No14 y 15 planta baja\n");
        $impresora->text("Celular: 981-111-1111\n");
        $impresora->text("-------------------------------\n");
        $impresora->setJustification(Printer::JUSTIFY_LEFT);
        $impresora->text("Cajero:" . auth()->user()->name . "\n");
        $impresora->text("Ticket: " . $venta->id . "\n");
        $impresora->text($venta->created_at . "\n");
        $impresora->text("-------------------------------\n");

        /**
        $productos = json_decode($venta->content);

        foreach ($productos as $producto) {
            $subtotal = $producto->qty * $producto->price;
            $impresora->setJustification(Printer::JUSTIFY_LEFT);
            $impresora->text(sprintf("%.2fx%s\n", $producto->qty, $producto->name));
            $impresora->setJustification(Printer::JUSTIFY_RIGHT);
            $impresora->text('$' . number_format($subtotal, 2) . "\n");
        }
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->text("-------------------------------\n");
        $impresora->setJustification(Printer::JUSTIFY_RIGHT);
        $impresora->setEmphasis(true);
        $impresora->text("Total: $" . number_format($venta->total, 2) . "\n");
        $impresora->text("Recibido: $" . number_format($venta->recibido, 2) . "\n");
        $impresora->text("Cambio: $" . number_format($venta->cambio, 2) . "\n");
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->setTextSize(1, 1);
         */
        $impresora->text("Gracias por su compra\n");
        $impresora->text("PETHOUSE");
        $impresora->feed(2);
        $impresora->close();
    }

    public function render()
    {
        return view('livewire.components.payment-sale');
    }
}
