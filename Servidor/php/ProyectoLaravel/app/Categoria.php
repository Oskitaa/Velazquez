<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function Curso(){
        return $this->hasMany('App\Curso','categoria');
    }
}
