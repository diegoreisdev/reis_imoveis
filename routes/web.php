<?php

use App\Http\Controllers\Admin\CidadeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/cidades');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('cidades', [CidadeController::class, 'index'])->name('cidades.index');
    Route::get('cidades/adicionar', [CidadeController::class, 'create'])->name('cidades.create');
    Route::post('cidades/adicionar', [CidadeController::class, 'store'])->name('cidades.store');

});
