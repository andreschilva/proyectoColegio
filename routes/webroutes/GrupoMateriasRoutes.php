<?php
use App\Http\Controllers\GrupoMateriaController;

Route::get('grupoMaterias/{id}', [GrupoMateriaController::class,'index'])->name('grupoMaterias.index')->middleware('sesion.iniciada');
Route::get('grupoMaterias/agregar/{id}', [GrupoMateriaController::class,'agregar'])->name('grupoMaterias.agregar')->middleware('sesion.iniciada');
Route::post('grupoMaterias', [GrupoMateriaController::class,'insertar'])->name('grupoMaterias.insertar')->middleware('sesion.iniciada');
/*Route::get('grupos/{id}/modificar', [GrupoController::class,'modificar'])->name('grupos.modificar')->middleware('sesion.iniciada');
Route::put('grupos/{grupo}', [GrupoController::class,'actualizar'])->name('grupos.actualizar')->middleware('sesion.iniciada');
Route::delete('grupos/{grupos}', [GrupoController::class,'eliminar'])->name('grupos.eliminar')->middleware('sesion.iniciada'); */
