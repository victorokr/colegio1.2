<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificacion;
use App\Models\Curso;

use App\Models\Periodo;
use App\Models\Asignatura;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Auth;
use App\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Logro;

class CalificacionesController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:docente'); 

       $this->middleware('roles:Empleado');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cursoo       = Curso::pluck('salon','id_curso');
        $periodoo     = Periodo::pluck('periodo','id_periodo');
        $asignaturaa  = Asignatura::pluck('asignatura','id_asignatura');
        

        $curso        = $request->get('curso');
        $periodo      = $request->get('periodo');
        $asignatura   = $request->get('asignatura');
        $nombreAlumno = $request->get('nombre');
       
        
       // $listacursos  = new Calificacion();
       

        $listaCalificaciones = Calificacion::orderBy('id_calificacion','DESC')
        ->consultaCurso($curso)//consultaCurso es el nombre del metodo en el modelo, pero sin scope
        ->consultaPeriodo($periodo)
        ->consultaAsignatura($asignatura)
        ->consultaNombre($nombreAlumno)
        ->paginate(8);
       
    
        return view('calificaciones.index', compact('listaCalificaciones','cursoo','periodoo','asignaturaa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('calificaciones.show');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function downloadPDF($id, Request $request)
    {
        
        $calificacionIdAlumno = Calificacion::findOrFail($id);
        $listaCalificacioPdf  = Calificacion::get();
        $listaLogros          = Logro::get();
        //$listaAsignatura      = Asignatura::get();
        $listaAsignatura      = Asignatura::with('logros')->get();
        dd($listaAsignatura);
        //$idAlumno = $request->get('id_alumno');
        //dd($listaLogros);

        $pdf = PDF::loadView('calificaciones.show', compact('calificacionIdAlumno','listaCalificacioPdf','listaLogros','listaAsignatura'));

        return $pdf->stream('prueba.pdf');
    }



    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();
        $calificacion = Calificacion::findOrFail($request->id_calificacion);

        $notas =  $request->all( 'nota1','nota2','nota3','nota4','nota5','nota6');
        $calcularPromedio = array_sum($notas)/6;
        $numeroFormateado = bcdiv($calcularPromedio, '1','1'); //bcdiv no redondea el resultado
        //"promedio"      => ($numeroFormateado),
        
         
        $calificacion->update([
            "nota1" => $request->input('nota1'),
            "nota2" => $request->input('nota2'),
            "nota3" => $request->input('nota3'),
            "nota4" => $request->input('nota4'),
            "nota5" => $request->input('nota5'),
            "nota6" => $request->input('nota6'),
            "promedio"      => ($numeroFormateado),
        ]);
        Alert::toast('nota actualizada correctamente', 'success')->timerProgressBar();
        return redirect()->route('calificaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ids = $request->ids;
        $calificacion = Calificacion::whereIn('id_calificacion',$ids);
        $calificacion->delete();
        Alert::toast('calificacion eliminada', 'success')->timerProgressBar();
        return back();
    }
}
