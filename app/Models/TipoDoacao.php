<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDoacao extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo_doacao',
        'quantidade'
    ];

    public function docaos(){
        return $this->hasMany('App/Models/Doacao');
    }
}
