<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{

    use SoftDeletes;  //Cria o campo 'deleted_at' que permite 'finalizar' o registro sem apagar do banco
    protected $fillable = ['name'];
}
