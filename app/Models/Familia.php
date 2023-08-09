<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function docaos(){
        return $this->hasMany('App/Models/Doacao', 'familia_id');
    }
    public function filhos(){
        return $this->belongsTo('App/Models/Filho');
    }
    public function estado_civils(){
        return $this->belongsTo('App/Models/EstadoCivil');
    }
    public function escolaridades(){
        return $this->belongsTo('App/Models/Escolaridade');
    }
}
