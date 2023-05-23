<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario_evento extends Model
{
    use HasFactory;
    protected $fillable = ['evento_id', 'user_id'];

    public function evento(){
        return $this->belongsTo('App/Models/Evento'); 
    }
    public function user(){
        return $this->belongsTo('App/Models/User');
    }
}
