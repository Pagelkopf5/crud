<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = ['empresa_id','nome','data_alteracao'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'contato';
}
