<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = ['empresa_id','nome'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'contato';

    public function empresa()
    {
        return $this->belongsTo('App\Post', 'id');
    }

    public function telefones(){
        return $this->hasMany('App\Telefone', 'contato_id', 'id');
    }
}
