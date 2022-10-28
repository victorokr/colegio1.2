<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AreadocentesController;
use App\Http\Controllers\AreaacudientesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('docentes/area', [AreadocentesController::class,'docente' ])->name('docente');//redirec login
Route::resource('acudientes/area', AreaacudientesController::class);
