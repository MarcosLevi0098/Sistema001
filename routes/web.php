<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;

Route::resource("produtos", ProdutoController::class);

/*Route::get("/", function(){
    return view("welcome");
});*/

Route::get("/",[UserController::class, "index"]);

