<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    
    public function Categoria(){
        return $this->belongsTo('App\Categoria','id');
    }

    public function Alumno(){
        return $this->hasMany('App\Alumno','curso');
    }

}
