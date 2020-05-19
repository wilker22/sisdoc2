<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [

        'tipo', 'numero', 'origem', 'assunto','setor_id', 'data_encaminhamento',
        'providencia', 'data_providencia', 'municipio_id', 'natureza', 'imagem'

    ];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }


}
