<?php

namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BarcodeExport implements FromQuery, WithMapping, WithHeadings, WithColumnFormatting
{
    use Exportable;

    public function query()
    {
        return Producto::query()->whereRaw('LENGTH(barcode) < 9');
    }

    public function map($producto): array
    {
        return [
            $producto->barcode,
            $producto->name,
            $producto->price,
        ];
    }

    public function headings(): array
    {
        return [
            'Barcode', //A
            'Name', //B
            'Price', //C
        ];
    }
    public function columnFormats(): array
    {
        return [
            'A' => '0',
        ];
    }
}
