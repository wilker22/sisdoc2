<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'setores';

    protected $filled = ['nome','sigla','descricao'];

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }
}
