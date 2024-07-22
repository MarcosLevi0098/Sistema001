<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function CarrinhoLista(){
        $itens = \Cart::getContent();
        return view('site/carrinho', compact('itens'));
    }

    public function  adicionarCarrinho(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' =>$request->name,
            'price' =>$request->price,
            'quantity' =>$request->qnt,
            'attributes' => array(
                'image' => $request->img
            )
        ]);
        return redirect()->route('site/carrinho')->with('Sucesso', 'Produto adicionado com sucesso!');
    }

    public function removerCarrinho(Request $request){
        \Cart::remove($request->id);

        return redirect()->route('site/carrinho')->with('Sucesso', 'Produto Removido com sucesso!');
    }
}
