@extends('template')

@section('title', 'Nova Empresa')

@section('content')
    <div>
        <form action="">
            {{ csrf_field() }}
            <label for="tipo_empresa">Pessoa: </label>
            <select name="tipo_empresa" id="">
                <option value="null">Selecione</option>
                <option value="fisica">Física</option>
                <option value="juridica">Jurídica</option>
            </select>
            <label for="">Nome</label>
            <input type="text" name="nome">
            <label for="municipio">Município</label>
            <input type="text" name="municipio">
        </form>
    </div>
    <a href="{{route("index")}}">voltar</a>
@endsection