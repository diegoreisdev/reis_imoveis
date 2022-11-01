<?php

use App\Http\Controllers\Admin\CidadeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CidadeController::class, 'index']);
