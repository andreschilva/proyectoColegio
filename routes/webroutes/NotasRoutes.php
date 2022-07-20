<?php
use App\Http\Controllers\NotaController;

Route::get('notas', [NotaController::class,'index'])->name('notas.index')->middleware('sesion.iniciada');
Route::get('notas/{id}/index2', [NotaController::class,'index2'])->name('notas.index2')->middleware('sesion.iniciada');

Route::get('notas/{id}/index3', [NotaController::class,'index3'])->name('notas.index3')->middleware('sesion.iniciada');
Route::get('notas/mostrar/{id}/{grupo}/{periodo?}', [NotaController::class,'mostrar'])->name('notas.mostrar')->middleware('sesion.iniciada');
Route::get('notas/agregar/{id}/{grupo}/{periodo?}', [NotaController::class,'agregar'])->name('notas.agregar')->middleware('sesion.iniciada');
Route::post('notas', [NotaController::class,'insertar'])->name('notas.insertar')->middleware('sesion.iniciada');
Route::get('notas/{id}/modificar', [NotaController::class,'modificar'])->name('notas.modificar')->middleware('sesion.iniciada');
Route::post('notas/{nota}', [NotaController::class,'actualizar'])->name('notas.actualizar')->middleware('sesion.iniciada');

