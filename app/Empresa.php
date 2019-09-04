<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['nome','municipio', 'tipo_empresa', 'pessoa_id'];
    protected $guarded = ['id'];
    protected $table = 'empresa';
    public $timestamps = false;
}
