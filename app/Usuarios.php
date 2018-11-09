<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $primaryKey = 'idu';  
    protected $fillable=['idu','nombre','apat','amat','calle','telefono','correo_usu','pass','tipo','archivo','activo'];
}
