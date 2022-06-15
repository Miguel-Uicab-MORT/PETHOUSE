<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    const Confirmada = 1;
    const Pendiente = 2;
    const Cancelada = 3;

    protected $guarded = [
        'id',
        'creat_at',
        'update_at',
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
