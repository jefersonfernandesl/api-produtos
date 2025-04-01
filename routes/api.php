<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::controller(ProdutoController::class)->group(function () {
    Route::get('/produtos', 'all')->name('produto.all');
    Route::get('/produto/{produto}', 'find')->name('produto.find');
    Route::post('/produto', 'create')->name('produto.create');
    Route::put('/produto/{produto}', 'update')->name('produto.update');
    Route::delete('/produto/{produto}', 'delete')->name('produto.delete');
});