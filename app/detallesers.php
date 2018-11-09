<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detallesers extends Model
{
    use SoftDeletes;
    protected $primarykey = 'iddser';
    protected $fillable=['iddser','descripcion','cantidad','subtotal',
                        'idserv','idmant'];
    protected $date = ['deleted_at'];
}
