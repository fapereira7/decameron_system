<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';

    protected $fillable = ['nombre', 'direccion', 'ciudad', 'nit', 'numero_habitaciones', 'estado'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
