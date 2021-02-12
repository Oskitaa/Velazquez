<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public function Curso(){
        return $this->belongsTo('App\Curso','curso');
    }
}
