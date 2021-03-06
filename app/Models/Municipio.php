<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = ['nome', 'descricao'];

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }
}
