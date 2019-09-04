<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = ['contato_id','numero'];
    protected $guarded = ['id'];
    protected $table = 'telefone';
    public $timestamps = false;

    public function contato()
    {
        return $this->belongsTo('App\Contato');
    }
}
