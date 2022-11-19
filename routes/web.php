<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AreadocentesController;
use App\Http\Controllers\AreaacudientesController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AcudientesController;
use App\Http\Controllers\ListaacudientesController;
use App\Http\Controllers\ListaalumnosController;
use App\Http\Controllers\CrearalumnosController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\ListamatriculasController;
use App\Http\Controllers\ListaasignaturasController;
use App\Http\Controllers\ListadoController;
use App\Http\Controllers\ListalogrosController;
use App\Http\Controllers\ListacursosController;
use App\Http\Controllers\EvaluarcursoController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\CalificacionesController;



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


Route::resource('lista/acudientes', ListaacudientesController::class);
Route::resource('lista/alumnos', ListaalumnosController::class);
Route::resource('crear/alumnosmatricula', CrearalumnosController::class);
Route::resource('matricula', MatriculaController::class);
Route::resource('lista/matriculas', ListamatriculasController::class);

Route::resource('lista/asignaturas', ListaasignaturasController::class);
Route::resource('listado', ListadoController::class);
Route::resource('lista/logros', ListalogrosController::class);

Route::resource('lista/cursos', ListacursosController::class);


Route::resource('evaluar', EvaluarcursoController::class);

Route::resource('periodo', PeriodoController::class);
Route::resource('calificaciones', CalificacionesController::class);

Route::get('/downloadPDF/{id}', [CalificacionesController::class, 'downloadPDF'])->name('downloadPDF');