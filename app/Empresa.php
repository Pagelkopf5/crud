<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['cpf_cnpj', 'nome','municipio', 'tipo_empresa', 'pessoa_id'];
    protected $guarded = ['id'];
    protected $table = 'empresa';

    public function Lastid(){
        $item = $this->latest()->first();
        if($item == null){
            return 1;
        }
        return ($item->id + 1);
    }
    
    public function pessoa_fisica(){
        return $this->hasOne('App\PessoaFisica', 'id', 'pessoa_id');
    }

    public function pessoa_juridica(){
        return $this->hasOne('App\PessoaJuridica', 'id', 'pessoa_id');
    }

    public function contatos()
    {
        return $this->hasMany('App\Contato', 'empresa_id', 'id');
    }
}
