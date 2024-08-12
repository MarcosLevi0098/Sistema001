<?php

namespace App\Policies;

use App\Models\User;
use App\Models\produtos;
class ProdutoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function verProduto(User $user, produtos $produto){

        return $user->id === $produto->id_user; 
    }
}
