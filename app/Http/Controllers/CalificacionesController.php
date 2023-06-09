<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificacion;
use App\Models\Curso;
use App\Models\Logro;
use App\Models\Periodo;
use App\Models\Asignatura;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Auth;
use App\Carbon;
use Barryvdh\DomPDF\Facade;
use PDF;
use DB;
use App\Models\Promedio;


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
        $año          = $request->get('año');
        
       // $listacursos  = new Calificacion();
       

        $listaCalificaciones = Calificacion::orderBy('id_calificacion','DESC')
        ->consultaCurso($curso)//consultaCurso es el nombre del metodo en el modelo, pero sin scope
        ->consultaPeriodo($periodo)
        ->consultaAsignatura($asignatura)
        ->consultaNombre($nombreAlumno)
        ->consulta_año($año)
        ->paginate(100);
       
    
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
        $created_at = $calificacionIdAlumno->created_at->year;
        
        //$añoActual = date('Y');
        //$listaCalificacioPdf  = Calificacion::whereYear('created_at', $created_at)->get();
        
        //filtra por año todas las calificaciones del boletin
         $listaCalificacioPdf  = Calificacion::where('id_alumno','=',$calificacionIdAlumno->id_alumno )
         ->where('id_periodo','=',$calificacionIdAlumno->id_periodo)
         ->whereYear('created_at', $created_at)->get();
        //dd($listaCalificacioPdf);

       


        // $todosLosPromedios = Calificacion::where('id_alumno','=',$calificacionIdAlumno->id_alumno )
        
        // ->whereYear('created_at', $created_at)->get();
        //dd($todosLosPromedios);

        //makeHidden() oculta las columnas dadas
        //$filterOnlyNotes = $listaCalificacioPdf->makeHidden(['id_calificacion','promedio','id_asignatura','id_alumno','id_curso','id_periodo','id_docente','id_grado','created_at','updated_at'])->toArray();
        //$collectionNotes = collect($filterOnlyNotes);
      

        // $filterOnlyNotes = $listaCalificacioPdf->pluck('nota6');
    
        
        // $listaLogrosPDF = Logro::where('id_periodo' , $calificacionIdAlumno->id_periodo)
        // ->where('id_grado', $calificacionIdAlumno->id_grado)->get();


        //dd($listaLogrosPDF);
        //$filterOnlyLogros = $listaLogrosPDF->makeHidden(['id_logro','id_docente','id_periodo','id_asignatura','id_grado','created_at','updated_at'])->toArray();
        //$collectionLogros = collect($filterOnlyLogros);
       

        //$combined =  $collectionNotes->combine($collectionLogros);
     
        $pdf = PDF::loadView('calificaciones.show', compact('calificacionIdAlumno','listaCalificacioPdf'))->setPaper('A4','landscape');

        return $pdf->download('boletin.pdf');
        //stream abre el pdf en el navegador
        //download descarga directa
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
        //dd($calificacion->id_periodo);
        $notas =  $request->all( 'nota1','nota2','nota3','nota4');
        $countColum = count($notas);
        $calcularPromedio = array_sum($notas)/$countColum;
        $numeroFormateado = bcdiv($calcularPromedio, '1','1'); //bcdiv no redondea el resultado
        //"promedio"      => ($numeroFormateado),
        
         
        $calificacion->update([
            "nota1" => $request->input('nota1'),
            "nota2" => $request->input('nota2'),
            "nota3" => $request->input('nota3'),
            "nota4" => $request->input('nota4'),
            // "nota5" => $request->input('nota5'),
            // "nota6" => $request->input('nota6'),
            //"promedio"      => ($numeroFormateado),
        ]);


         //update average
         switch ($calificacion->id_periodo) {
            case "1":
                  $promediop1 = Promedio::where('id_promedio','=', $calificacion->id_promedio)->first();
                  $promediop1->promediop1 = $numeroFormateado;
                  $promediop1->save();  
                break;
                  
            case "2":
                  $promediop2 = Promedio::where('id_promedio','=', $calificacion->id_promedio)>first();
                  $promediop2->promediop2 = $numeroFormateado;
                  $promediop2->save(); 
                break;

            case "3":
                  $promediop3 = Promedio::where('id_promedio','=', $calificacion->id_promedio)>first();
                  $promediop3->promediop3 = $numeroFormateado;
                  $promediop3->save(); 
                break;
            case "4":
                  $promediop4 = Promedio::where('id_promedio','=', $calificacion->id_promedio)>first();
                  $promediop4->promediop4 = $numeroFormateado;
                  $promediop4->save(); 
                break;    
            }




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
        // $ids = $request->ids;
        // $calificacion = Calificacion::whereIn('id_calificacion',$ids);
        // $calificacion->delete();
        // Alert::toast('calificacion eliminada', 'success')->timerProgressBar();
        // return back();
    }
}
