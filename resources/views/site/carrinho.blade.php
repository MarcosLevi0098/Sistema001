@extends('site/layout')
@section('title', 'CARRINHO')
@section('conteudo')

<div class="row container">

  @if ($mensagen = Session::get('Sucesso'))    
  
  <div class="card green darken-1">
    <div class="card-content white-text">
      <span class="card-title">Parabéns!</span>
      <p> {{$mensagen}}</p>
    </div>
  </div>
      
  @endif
    <h5>Seu carrinho possui: {{$itens->count()}} produtos. </h5>
   
    
    <table class="striped">
        <thead>
          <tr>
            <th></th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Quantidade</th>
            <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($itens as $item)
          <tr>
            <td><img src="{{$item->attributes->image}}" alt="" width="70px" class="responsive-img circle"></td>
            <td>{{$item->name}}</td>
            <td class="btn blue">R${{number_format($item->price, 2, ',', '.')}}</td>
            <td><input type="number" name="quantity" style="width: 40px; font-weight:900;" class="withe center" value="{{$item->quantity}}"></td>
            <td>  
                <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button> 

                <form action="{{route('site/removecarrinho')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
              </form>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

   <div class="rowc container center"></div>

   <button class="btn-large waves-effect waves-light blue">Continuar comprando<i class="material-icons left">arrow_back</i></button>
   <button class="btn-large waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></button> 
   <button class="btn-large waves-effect waves-light green">Finalizar pedido<i class="material-icons right">check</i></button>   
   </div>

@endsection
