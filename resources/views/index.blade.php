@extends('template')

@section('title', 'Index')

@section('content')
    <div class="wrap-itens">
        <h3>Empresas</h3>
        <div class="item titles">
            <div class="subitem">Nome</div>
            <div class="subitem">CPF / CNPJ</div>
            <div class="subitem">Municipio</div>
            <div class="subitem">Ações</div>
        </div>
        @foreach ($empresas as $empresa)
            <div class="item">
                <div class="subitem">{{$empresa->nome}}</div>
                <div class="subitem">{{$empresa->cpf_cnpj}}</div>
                <div class="subitem">{{$empresa->municipio}}</div>
                <div class="subitem"><a href="{{route("edit_empresa", $empresa->id)}}">Edit</a> / <a href="{{route("delete_empresa", $empresa->id)}}">Delet</a></div>
            </div>
            @if (count($empresa->contatos) != 0)
                
            <div class="container-contato">
                <h4>Contato</h4>
                @foreach ($empresa->contatos as $contato)
                    <div class="wrap-contatos">
                        <span>{{$contato->nome}}</span>
                        @foreach ($contato->telefones as $telefone)
                            <span>{{$telefone->numero}}</span>
                        @endforeach
                        <div><a href="{{route("edit_contato", $contato->id)}}">Edit</a> / <a href="{{route("delete_contato", $contato->id)}}">Delet</a></div>
                    </div>
                @endforeach
            </div>
            @endif
        @endforeach
    </div>
    <div class="wrap-buttons">
        <a href="{{route("create_contato")}}">Novo Contato</a>
        <a href="{{route("create_empresa")}}">Nova Empresa</a>
    </div>
@endsection