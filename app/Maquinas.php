<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maquinas extends Model
{
    use SoftDeletes;
    protected $primarykey = 'idmac';
    protected $fillable=['idmac','nombre','descripcion','precio',
                        'stock','categoria','existencias'];
    protected $date = ['deleted_at'];


}
