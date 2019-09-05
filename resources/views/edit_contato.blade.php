@extends('template')

@section('title', 'Edit Contato')

@section('content')
    <form method="post" action="{{ route('editing_contato') }}">
        {{ csrf_field() }}
        <input type="hidden" value="{{$contato->id}}" name="contato_id">
        <div class="wrap-input">
            <label for="">Nome</label>
            <input type="text" name="nome" value="{{$contato->nome}}">
        </div>
        <div class="wrap-input">
            <div id="wrap-fones" data-contador="{{count($contato->telefones)}}">
                <?php $contador = 0 ?>
                @foreach ($contato->telefones as $telefone)
                    <?php $contador++; ?>
                    <div>
                        <label>Telefone <?php echo($contador) ?></label>
                        <input type="text" name="telefone[<?php echo($contador - 1) ?>][numero]" value="{{$telefone->numero}}">
                    </div>
                @endforeach
            </div>
            <span class="more-fone" onClick="novoTelefone()">+</span>
        </div>
        <div class="wrap-buttons">
            <a href="{{route("index")}}"><button type="button">Voltar</button></a>
            <button type="submit">Confirmar</button>
        </div>
    </form>
    <script>
        let counter = $("#wrap-fones").data('contador');
        const divFone = document.getElementById("wrap-fones") 
        function novoTelefone(){
            let newFone = document.createElement("div");
            divFone.appendChild(newFone);
            newFone.innerHTML = `<label>Telefone ${counter + 1}</label><input type="text" name="telefone[${counter}][numero]">`;
            counter ++;
        }
    </script>
@endsection