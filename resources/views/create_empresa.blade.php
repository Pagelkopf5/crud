@extends('template')

@section('title', 'Nova Empresa')

@section('content')
    <form method="post" action="{{ route('creating_empresa') }}">
        {{ csrf_field() }}
        <div class="wrap-input">
            <label for="tipo_empresa">Pessoa: </label>
            <select name="tipo_empresa" id="tipo_empresa">
                <option value="null">Selecione</option>
                <option value="fisica">Física</option>
                <option value="juridica">Jurídica</option>
            </select>
        </div>
        <div class="wrap-input">
            <label for="">Nome</label>
            <input type="text" name="nome">
        </div>
        <div class="wrap-input">
            <label for="municipio">Município</label>
            <input type="text" name="municipio">
        </div>
        <div class="wrap-pf no-display">
            <div class="wrap-input">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf">
            </div>
            <div class="wrap-input">
                <label for="rg">RG</label>
                <input type="text" name="rg">
            </div>
            <div class="wrap-input">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="text" name="data_nascimento">
            </div>
        </div>
        <div class="wrap-pj no-display">
            <div class="wrap-input">
                <label for="cnpj">CNPJ</label>
                <input type="text" name="cnpj">
            </div>
            <div class="wrap-input">
                <label for="nome_fantasia">Nome Fantasia</label>
                <input type="text" name="nome_fantasia">
            </div>
        </div>
        <div class="wrap-buttons">
            <a href="{{route("index")}}"><button>Voltar</button></a>
            <button>Confirmar</button>
        </div>
    </form>
    <script>
        $("#tipo_empresa").change(function(){
            let valor = $(this).val();
            if(valor == "fisica"){
                $(".wrap-pf").removeClass("no-display");
                $(".wrap-pj").addClass("no-display");
            }else if(valor == "juridica"){
                $(".wrap-pj").removeClass("no-display");
                $(".wrap-pf").addClass("no-display");
            }
        })
    </script>
@endsection