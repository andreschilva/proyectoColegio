<?php
use App\Http\Controllers\NotaController;

Route::get('notas', [NotaController::class,'index'])->name('notas.index')->middleware('sesion.iniciada');
/* Route::get('perfiles/agregar', [PerfilController::class,'agregar'])->name('perfiles.agregar')->middleware('sesion.iniciada');*/
Route::get('notas/{id}', [NotaController::class,'index2'])->name('notas.index2')->middleware('sesion.iniciada');

Route::get('notas/{id}/index3', [NotaController::class,'index3'])->name('notas.index3')->middleware('sesion.iniciada');
/*Route::post('perfiles', [PerfilController::class,'insertar'])->name('perfiles.insertar')->middleware('sesion.iniciada');
Route::get('perfiles/{id}/modificar', [PerfilController::class,'modificar'])->name('perfiles.modificar')->middleware('sesion.iniciada');
Route::put('perfiles/{perfil}', [PerfilController::class,'actualizar'])->name('perfiles.actualizar')->middleware('sesion.iniciada');
Route::delete('perfiles/{perfil}', [PerfilController::class,'eliminar'])->name('perfiles.eliminar')->middleware('sesion.iniciada'); */
