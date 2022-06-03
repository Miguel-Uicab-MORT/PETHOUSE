<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    const Activo = 1;
    const Inactivo = 2;

    protected $guarded = [
        'id',
        'creat_at',
        'update_at',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
