<?php

use Illuminate\Http\Request;
use App\Contato;
use App\Telefone;
use App\Empresa;
use App\PessoaFisica;
use App\PessoaJuridica;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $empresas = Empresa::all();
    return view('index', compact('empresas'));
})->name('index');

Route::get('/create_contato', function  () {
    $empresas = Empresa::all();
    return view('create_contato', compact('empresas'));
})->name('create_contato');

Route::get('/create_empresa', function () {
    return view('create_empresa');
})->name('create_empresa');

Route::get('/edit_empresa/{id}', function ($id) {
    $empresa = Empresa::find($id);
    return view('edit_empresa', compact('empresa'));
})->name('edit_empresa');

Route::post('/created_contato', function (Request $request) {
    $contato = New Contato;
    $contato->empresa_id = $request->empresa;
    $contato->nome = $request->nome;
    $contato->save();

    foreach($request->telefone as $telefone){
        $fone = New Telefone;
        $fone->numero = $telefone["numero"];
        $fone->contato_id = $contato->id;
        $fone->save();
    }
    return Redirect::route('index');
})->name('creating_contato');

Route::post('/created_empresa', function (Request $request) {
    $empresa = New Empresa;
    $empresa->nome = $request->nome;
    $empresa->municipio = $request->municipio;
    $empresa->tipo_empresa = $request->tipo_empresa;
    $empresa->cpf_cnpj = $request->cpf_cnpj;
    $empresa->nome = $request->nome;

    if($request->tipo_empresa == "fisica"){
        $pessoa = new PessoaFisica;
        $pessoa->rg = $request->rg;
        $pessoa->data_nascimento = $request->data_nascimento;
        $pessoa->empresa_id = $empresa->Lastid();
        $pessoa->save();
    } else if($request->tipo_empresa == "juridica"){
        $pessoa = new PessoaJuridica;
        $pessoa->nome_fantasia = $request->nome_fantasia;
        $pessoa->empresa_id = $empresa->Lastid();
        $pessoa->save();
    }

    $empresa->pessoa_id = $pessoa->id;
    $empresa->save();

    return Redirect::route('index');
})->name('creating_empresa');

Route::post('/edit_empresa', function (Request $request) {
    $empresa = Empresa::find($request->empresa_id);
    $empresa->cpf_cnpj = $request->cpf_cnpj;
    $empresa->nome = $request->nome;
    $empresa->municipio = $request->municipio;

    if($empresa->tipo_empresa != $request->tipo_empresa){
        if($request->tipo_empresa == "juridica"){
            $empresa->pessoa_fisica->delete();
            $pessoa = new PessoaJuridica;
            $pessoa->nome_fantasia = $request->nome_fantasia;
            $pessoa->empresa_id = $request->empresa_id;
            $pessoa->save();
        } else if($request->tipo_empresa == "fisica"){
            $empresa->pessoa_juridica->delete();
            $pessoa = new PessoaFisica;
            $pessoa->rg = $request->rg;
            $pessoa->data_nascimento = $request->data_nascimento;
            $pessoa->empresa_id = $request->empresa_id;
            $pessoa->save();
        }
        $empresa->pessoa_id = $pessoa->id;
    } else{
        if($request->tipo_empresa == "juridica"){
            $pessoa = PessoaJuridica::find($empresa->pessoa_juridica->id);
            $pessoa->nome_fantasia = $request->nome_fantasia;
            $pessoa->empresa_id = $request->empresa_id;
            $pessoa->save();
        } else if($request->tipo_empresa == "fisica"){
            $pessoa = PessoaFisica::find($request->pessoa_fisica->id);
            $pessoa->rg = $request->rg;
            $pessoa->data_nascimento = $request->data_nascimento;
            $pessoa->empresa_id = $request->empresa_id;
            $pessoa->save();
        }
    }
    
    $empresa->tipo_empresa = $request->tipo_empresa;
    $empresa->save();
    return Redirect::route('index');
})->name('editing_empresa');


Route::get('/delete_empresa/{id}', function ($id) {
    $empresa = Empresa::find($id);

    if($empresa->contatos != null){
        foreach($empresa->contatos as $contato){
            foreach($contato->telefones as $telefone){
                $telefone->delete();
            }
            $contato->delete();
        }
    }

    if($empresa->pessoa_fisica != null){
        $empresa->pessoa_fisica->delete();
    }

    if($empresa->pessoa_juridica != null){
        $empresa->pessoa_juridica->delete();
    }

    $empresa->delete();
    return Redirect::route('index');

})->name('delete_empresa');