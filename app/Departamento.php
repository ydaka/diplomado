<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'tb_departamento';
    protected $fillable = ['depa_nomb','pais_codi'];
    protected $primaryKey = 'depa_codi';
}
