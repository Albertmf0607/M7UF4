<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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
Route::get('/api/llibres', [ApiController::class, "getLlibres"]);
Route::get('/api/autors', [ApiController::class, "getAutors"]);
Route::get('/api/llibre/{id}', [ApiController::class, "getLlibre"]);
Route::get('/api/autor/{id}', [ApiController::class, "getAutor"]);
Route::put('/api/llibre/{id}', [ApiController::class, "updateLlibre"]);
Route::post('/api/llibre/', [ApiController::class, "crearLlibre"]);
Route::post('/api/autor/', [ApiController::class, "crearAutor"]);
Route::delete('/api/llibre/{id}', [ApiController::class, "eliminarLlibre"]);
Route::get('/', function () {
    return view('welcome');
});
