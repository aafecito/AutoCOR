<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    use HasFactory;

    // public function ventas()
    // {
    //     return $this->hasMany(Venta::class);
    // }

    public function venta()
    {
        return $this->hasMany(venta::class);
    }
}
