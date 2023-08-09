<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado_civil extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function familias(){
        return $this->hasMany('App/Models/Familia', 'estadoCivil_id');
    }
}
