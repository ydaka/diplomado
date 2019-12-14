<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    //
    protected $table = 'tb_comuna';
    protected $fillable = ['comu_nomb','muni_codi'];//rellenado masivo de update, permite autorizar campos para auto rellenado
    protected $primaryKey = 'comu_codi';

    
}
