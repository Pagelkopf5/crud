<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model
{
    protected $fillable = ['rg', 'data_nascimento', 'empresa_id'];
    protected $guarded = ['id'];
    protected $table = 'pessoa_fisica';
    public $timestamps = false;

    public function empresa(){
        return $this->belongsTo('App\User', 'pessoa_id');
    }
}
