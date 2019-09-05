<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Model
{
    protected $fillable = ['nome_fantasia', 'empresa_id'];
    protected $guarded = ['id'];
    protected $table = 'pessoa_juridica';
    public $timestamps = false;
}