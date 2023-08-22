<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboradorEvento extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function colaborador(){
        return $this->belongsTo('App/Models/Colaborador');
    }

    public function evento(){
        return $this->belongsTo('App/Models/Evento');
    }
}

