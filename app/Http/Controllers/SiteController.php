<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produtos;
use App\Models\Categoria;
class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produtos::paginate(3);
    
        return view('site/home', compact('produtos'));
    }

    public function details($slug) {
        $produtos = produtos::where('slug', $slug)->first();

        return view('site/details', compact('produtos'));
    }

    
    public function categoria($id) {
        $categoria = Categoria::find($id);
        $produtos = Produtos::where('id_categoria', $id)->paginate(3);
        return view('site/categoria', compact('produtos', 'categoria'));
    }

    public function  LoginUsuario(){
        return view('site/login');
    }
}
