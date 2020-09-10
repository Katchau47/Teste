<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class revisaos extends Model
{
    protected $table='revisaos';
    protected $fillable=['carro', 'pneus', 'motor', 'freios', 'suspensao', 'iluminacao', 'pintura', 'estofamento','preco'];
}
