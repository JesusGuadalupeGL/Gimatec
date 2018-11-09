<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class servicios extends Model
{
    use SoftDeletes;
    protected $primarykey = 'idserv';
    protected $fillable=['idserv','fecha','total','tiposer',
                        'idu','idcli'];
    protected $date = ['deleted_at'];
}
