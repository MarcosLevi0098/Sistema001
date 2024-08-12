<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\produtos;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    
    public function index(){
    
        $usuarios = User::all()->count();

         //GRAFICO 1 USUARIOS

         $usersData = User::select([

            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
         ])
         ->groupBY('ano')
         ->orderBY('ano', 'asc')
         ->get();

        //PREPARAR ARRAYS

        foreach($usersData as $user){
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        //FORMATAR PARA CHARTJS

        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);
            

        //GRAFICO 2 CATEGORIAS

        $catData = Categoria::with('produtos')->get(); 

        //PREPARAR O ARRAY 

         foreach($catData as $cat) {
            $catNome[] = "'".$cat->nome."'";
            $catTotal[] = $cat->produtos->count();
         }

         //FORMATAR PARA CHATJS
         $catLabel = implode(',', $catNome);
         $catTotal = implode(',', $catTotal);

        return view('admin/dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
