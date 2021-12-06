<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrendasController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
/*
//ruta para acceder a la lista de prendas
Route::get('/prendas', function () {
    return view('prendas.index');
});

//ruta para acceder a create
Route::get('/prendas/create',[PrendasController::class,'create']);
*/
//rutas para prenda

Route::resource('prendas', PrendasController::class)->middleware('auth');

Auth::routes(['reset'=>false]);

Route::get('/home', [PrendasController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [PrendasController::class, 'index'])->name('home');
});

/* rutas para los visitantes */
Route::get('/index', [PrendasController::class, 'welcome'])->name('welcome');

Route::get('/producto/{id}', [PrendasController::class, 'producto'])->name('producto');