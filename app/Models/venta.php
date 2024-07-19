<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    use HasFactory;

    public function vehiculo()
    {
        return $this->belongsTo(vehiculo::class);
    }

    public function despacho()
    {
        return $this->hasMany(despacho::class);
    }
}
