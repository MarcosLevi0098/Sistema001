@extends('site/layout')
@section('title', 'CARRINHO')
@section('conteudo')

<div class="row container" style="flex: 1 0 auto;" >

  @if ($mensagen = Session::get('Sucesso'))    
  
  <div class="card green">
    <div class="card-content white-text">
      <span class="card-title">Parabéns!</span>
      <p> {{$mensagen}}</p>
    </div>
  </div>
  @endif

  <div class="row container">

    @if ($mensagen = Session::get('aviso'))    
    
    <div class="card blue">
      <div class="card-content white-text">
        <span class="card-title">Tudo bem!</span>
        <p> {{$mensagen}}</p>
      </div>
    </div>
        
    @endif


    @if($itens->count() == 0)

    <div class="card orange">
      <div class="card-content white-text">
        <span class="card-title">Seu carrinho está vazio!</span>
        <p> Aproveite nossas promoções!</p>
      </div>
    </div>

    @else
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
           
          {{--BTN ATUALIZAR--}}
          <form action="{{route('site/atualizacarrinho')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <td><input type="number" name="quantity" style="width: 40px; font-weight:900;" class="withe center" min="1" value="{{$item->quantity}}"></td>
          <td>  
            <input type="hidden" name="id" value="{{$item->id}}">
            <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button> 
            </form>

            {{--BTN DELETAR--}}
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
    
    <div class="card orange">
      <div class="card-content white-text">
        <span class="card-title"><strong>TOTAL: R${{number_format(\Cart::getTotal(), 2, ',', '.')}}</strong></span>
        <p> <strong>Pague em 12x sem juros</strong></p>
      </div>
    </div>
    @endif
    
   <div class="rowc container center"></div>

   <a href="{{route('site/index')}}" class="btn-large waves-effect waves-light blue">Continuar comprando<i class="material-icons left">arrow_back</i></a>
   
   <a href="{{route('site/limparcarrinho')}}" class="btn-large waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></a> 
   <button class="btn-large waves-effect waves-light green">Finalizar pedido<i class="material-icons right">check</i></button>   
   </div>
</div>
@endsection
