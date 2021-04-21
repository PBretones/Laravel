<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;


Route::get('/fruits/{id?}', function ($id = "") { // Asi metemos url dinamica con id opcional
    return $id.'º Pagina para frutas';
})->where('id','[0-9]+'); // Asi hacemos que el campo id solo pueda ser un numero

Route::get('fotos',[PagesController::class,'fotos'] )->name('fotos');

Route::get('blog', [PagesController::class,'blog'])->name('blog');

Route::get('nosotros/{name?}',[PagesController::class,'nosotros'])->name('nosotros');

Route::get('/', [PagesController::class,'notas'])->name('notas');
Route::get('notas/{id?}', [PagesController::class,'detalle'])->name('notas.detalle');

Route::post('/detalle/crear',[PagesController::class,'crear'])->name('notas.crear');
Route::get('/detalle/editar/{id}',[PagesController::class,'editar'])->name('notas.editar');
Route::put('/detalle/editar/{id}',[PagesController::class,'update'])->name('notas.update');
Route::delete('/detalle/eliminar/{id}',[PagesController::class,'delete'])->name('notas.delete');


// En LARAVEL 5.1 ===> Route::get('blog', 'PagesController@blog'])->name('dos');
