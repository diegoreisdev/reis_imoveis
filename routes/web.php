<?php

use App\Http\Controllers\Admin\CidadeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/cidades');

Route::get('admin/cidades', [CidadeController::class, 'index']);
Route::get('admin/cidades/adicionar', [CidadeController::class, 'create']);
