<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Livewire\ChatSingle;



Route::get('/producto',[MenuController::class,'producto'])->middleware(['auth'])->name('producto');
Route::get('/marca',[MenuController::class,'marca'])->middleware(['auth'])->name('marca');

