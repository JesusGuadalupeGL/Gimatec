<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $primaryKey = 'idcli';  
    protected $fillable=['idcli','nombre','apat','amat','empresa','telefono','calle','no_int','no_ext','colonia','cp','idm','ide','idu','activo'];
 }

