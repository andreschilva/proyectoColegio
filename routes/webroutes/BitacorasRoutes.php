<?php
use App\Http\Controllers\BitacoraController;
Route::get('bitacoras', [BitacoraController::class,'index'])->name('bitacoras.index')->middleware('sesion.iniciada');
