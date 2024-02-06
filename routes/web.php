<?php

use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\SupportController;
use App\Models\Support;
use Illuminate\Support\Facades\Route; 


//Rota create deve ser colocada antes, da rota get que captura id's dinâmicos para evitar erros!
Route::get('supports/create', [SupportController::class, 'create'])->name('supports.create');
Route::get('supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
Route::post('supports', [SupportController::class, 'store'])->name('supports.store');
Route::get('supports', [SupportController::class, 'index'])->name('supports.index');
Route::get('/contato', [SiteController::class, 'contact']);
Route::get('/', function () {
    return view('welcome');
});
