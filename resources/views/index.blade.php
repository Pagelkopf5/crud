@extends('template')

@section('title', 'Index')

@section('content')
    <div><h1>Hello World</h1></div>
    <a href="{{route("create_contato")}}">Novo Contato</a>
    <a href="{{route("create_empresa")}}">Nova Empresa</a>
@endsection