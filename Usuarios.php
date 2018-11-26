<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuarios extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'idu';
    protected $fillable = ['idu','nombre','apat','amat','calle','telefono','correo_usu','pass','tipo','archivo','activo'];
    protected $Date = ['delete_at'];
}
