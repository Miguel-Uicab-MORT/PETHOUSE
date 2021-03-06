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
    public $recibido, $r_Efectivo = 0, $r_Tarjeta = 0, $r_Total = 0;
    public $cambio = 0;
    public $costo = 0;
    public $ganancia = 0;
    public $producto, $ventaid;
    protected $rules = [
        'r_Efectivo' => 'required',
        'r_Tarjeta' => 'required',
    ];

    public function updatedRTarjeta()
    {
        if ($this->r_Tarjeta != null) {
            $this->r_Total = $this->r_Tarjeta + $this->r_Efectivo;
        }
    }

    public function updatedREfectivo()
    {
        if ($this->r_Efectivo != null) {
            $this->r_Total = $this->r_Tarjeta + $this->r_Efectivo;
        }
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

        $this->recibido = $this->r_Efectivo + $this->r_Tarjeta;

        $this->cambio = $this->recibido - $this->total;
        $pEfectivo = $this->total - $this->r_Tarjeta;

        $venta = new Venta();

        $venta->costo = $this->costo;
        $venta->total = $this->total;
        $venta->ganancia = $this->ganancia;
        $venta->recibido = $this->recibido;
        $venta->rEfectivo = $pEfectivo;
        $venta->rTarjeta = $this->r_Tarjeta;
        $venta->cambio = $this->cambio;
        $venta->content = Cart::content();
        $venta->user_id = auth()->user()->id;

        $venta->save();

        $this->ventaid = $venta;

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

        $this->cambioModal();
    }

    public function render()
    {
        return view('livewire.components.payment-sale');
    }
}
