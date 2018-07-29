<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sintegra extends Model
{

    protected $table = "sintegra";

    protected $fillable = [
        'cnpj',
        'json'
    ];

    public function usuarios(){
        return $this->belongsTo('App\User');
    }

    public function getEmpresasAttribute(){
        $empresas = $this->usuarios()->where('id_usuario', Auth::user()->id )->all();
        return $empresas;
    }
}
