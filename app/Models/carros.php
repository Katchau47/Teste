<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class carros extends Model
{
    protected $table='carros';
    protected $fillable=['proprietario', 'placa', 'modelo', 'ano', 'n_fabricante', 'Renavan'];
}
