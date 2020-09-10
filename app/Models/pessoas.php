<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pessoas extends Model
{
    protected $table='pessoas';
    protected $fillable=['a_name','n_cpf','email','sexo','data_de_nascimento','Telefone'];
    public function carros()
    {
        return $this->hasMany(carros::class, 'proprietario');
    }

    public function getCpfAttribute()
    {
        $cpf = $this->attributes['n_cpf'];
        return(substr($cpf,0,3). '.' .substr($cpf,3,3). '.'. substr($cpf,7,3).'-'.substr($cpf, -1));
    }
}
