@extends('site/layout')
@section('title', 'Detalhes')
@section('conteudo')

<div class="row container"> <br>
    <div class="col s12 m6">
        <img src="{{$produtos->imagem}}" alt="" class="responsive-img">
    </div>

    <div class="col s12 m6">
        <h4>{{$produtos->nome}}</h4>
        <h4> R${{number_format($produtos->preco, 2, ',','.')}}</h4>
        <p>{{$produtos->descricao}}</p>
        <p>Postado por: {{$produtos->user->firstName}} <br>
        <p>Categoria: {{$produtos->categoria->nome}}</p>
        <form action="{{Route('site/addcarrinho')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$produtos->id}}">
        <input type="hidden" name="name" value="{{$produtos->nome}}">
        <input type="hidden" name="price" value="{{$produtos->preco}}">
        <input type="number" name="qnt" value="1">
        <input type="hidden" name="img" value="{{$produtos->imagem}}">
        <button class="btn orange btn-large">Comprar</button>
    </div>
@endsection