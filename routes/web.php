<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AreadocentesController;
use App\Http\Controllers\AreaacudientesController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AcudientesController;
use App\Http\Controllers\acudientes\AcudienteForgotPasswordController;
use App\Http\Controllers\acudientes\AcudienteResetPasswordController;


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


Route::get('docentes/area',        [AreadocentesController::class,'docente' ])->name('docente');//redirec login
Route::resource('acudientes/area', AreaacudientesController::class);
Route::resource('docente',         DocenteController::class);


// Route::get('acudientes/login',  [AcudientesController::class, 'showLoginForm']);
// Route::post('acudientes/login', [AcudientesController::class, 'login']);

//Route::get('logout',            [AcudientesController::class, 'logout'])->name('logoutAcudiente');

// Route::get('acudiente/password/reset',         [AcudienteForgotPasswordController::class, 'showLinkRequestForm'])->name('acudiente.password.request');
// Route::post('acudiente/password/email',        [AcudienteForgotPasswordController::class, 'sendResetLinkEmail'])->name('acudiente.password.email');
// Route::get('acudiente/password/reset/{token}', [AcudienteResetPasswordController::class,  'showResetForm'])->name('acudiente.password.reset');
// Route::post('acudiente/password/reset',        [AcudienteResetPasswordController::class,  'reset'])->name('acudiente.password.update');