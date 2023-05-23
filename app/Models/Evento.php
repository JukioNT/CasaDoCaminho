<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo', 
        'descricao',
    ];
    public function usuario_evento(){
        return $this->hasMany('App/Models/usuario_evento', 'evento_id');
    }
}
