<?php

use App\Http\Controllers\Admin\CidadeController;
use App\Http\Controllers\Admin\FotoController;
use App\Http\Controllers\Admin\ImovelController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/cidades');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::resource('cidades', CidadeController::class)->except('show');
    Route::resource('imoveis', ImovelController::class);
    Route::resource('imoveis.fotos', FotoController::class)->except(['show', 'edit', 'update']);
});
