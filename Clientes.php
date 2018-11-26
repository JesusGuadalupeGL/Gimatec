<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Clientes extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'idcli';  
    protected $fillable=['idcli','nombre','apat','amat','empresa','telefono','calle','no_int','no_ext','colonia','cp','idm','ide','idu','activo'];
    protected $date =['delete_at'];
}

