@extends('template')

@section('title', 'Novo Contato')

@section('content')
    <form method="post" action="{{ route('creating_contato') }}">
        {{ csrf_field() }}
        <div class="wrap-input">
            <label for="empresa">Empresa: </label>
            <select name="empresa">
                @if (count($empresas) != 0)
                    <option value="null">Selecione</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
                    @endforeach
                @else
                    <option value="null">-- Vazio --</option>
                @endif
            </select>
        </div>
        <div class="wrap-input">
            <label for="">Nome</label>
            <input type="text" name="nome">
        </div>
        <div class="wrap-input">
            <div id="wrap-fones">
                <div>
                    <label>Telefone 1</label>
                    <input type="text" name="telefone[0][numero]">
                </div>
            </div>
            <span class="more-fone" onClick="novoTelefone()">+</span>
        </div>
        <div class="wrap-buttons">
            <a href="{{route("index")}}"><button type="button">Voltar</button></a>
            <button type="submit">Confirmar</button>
        </div>
    </form>
    <script>
        let counter = 1;
        const divFone = document.getElementById("wrap-fones") 
        function novoTelefone(){
            let newFone = document.createElement("div");
            divFone.appendChild(newFone);
            newFone.innerHTML = `<label>Telefone ${counter + 1}</label><input type="text" name="telefone[${counter}][numero]">`;
            counter ++;
        }
    </script>
@endsection