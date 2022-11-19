<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FactorRH;
use App\Models\Eps;
use App\Models\Lugardenacimiento;
use App\Models\Tipodocumento;
use App\Models\Grado;
use App\Models\Crearalumno;
use Illuminate\Support\Facades\Auth;

use App\Models\Anioelectivo;
use App\Models\Tipodeaspirante;
use App\Models\Responsable;
use App\Models\Alumno;
use App\Http\Requests\CrearalumnosRequest;

class CrearalumnosController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:acudiente'); 

       $this->middleware('roles:Responsable');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $añoElectivoo           = Anioelectivo::pluck('añoElectivo','id_añoElectivo');
        // $gradoo                 = Grado::pluck('grado','id_grado');
       

        // //$crearAlumno = Crearalumno::findOrFail($id);
       
        // return view('crearAlumnos.show',compact('añoElectivoo','gradoo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $factorrhh           = FactorRH::pluck('factorRH','id_factorRH');
        $epss                = Eps::pluck('EPS','id_eps');
        $lugarDeNacimientoo  = Lugardenacimiento::pluck('lugarDeNacimiento','id_lugarDeNacimiento');
        //$tipoDeDocumentoo    = Tipodocumento::pluck('tipoDocumento','id_tipoDocumento');
       
        return view('crearAlumnos.create', compact('factorrhh','epss','lugarDeNacimientoo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearalumnosRequest $request)
    {   //return $request->all();
            $crearAlumno = new Crearalumno;
            $crearAlumno->nombres              = $request->input('nombres');
            $crearAlumno->documento            = $request->input('documento');
            $crearAlumno->telefono             = $request->input('telefono');
            $crearAlumno->email                = $request->input('email');
            $crearAlumno->direccion            = $request->input('direccion');
            $crearAlumno->lugarDeResidencia    = $request->input('lugarDeResidencia');
            $crearAlumno->fechaDeNacimiento    = $request->input('fechaDeNacimiento');
            $crearAlumno->id_tipoDocumento     = '3';
            $crearAlumno->id_lugarDeNacimiento = $request->input('id_lugarDeNacimiento');
            
            $crearAlumno->id_factorRH          = $request->input('id_factorRH');
            $crearAlumno->id_eps               = $request->input('id_eps');
            
            $crearAlumno->save();
        
            $responsableDelAlumno =  Auth::user()->id_responsable;
            $crearAlumno ->responsable()->attach($responsableDelAlumno);
          //dd($crearAlumno->id_alumno);
        //return redirect()->route('alumnosmatricula.show', compact('crearAlumno'))->with($crearAlumno->id_alumno);
        //return redirect()->route('alumnosmatricula.show', ['crearAlumno' => $crearAlumno->id_alumno]);
        return redirect()->route('alumnosmatricula.show', [$crearAlumno]);
        //return redirect()->route('alumnosmatricula.show')->with('crearAlumno', $crearAlumno->id_alumno);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $alumnosmatricula
     * @return \Illuminate\Http\Response
     */
    public function show($alumnosmatricula  )
    {
        $añoElectivoo           = Anioelectivo::pluck('añoElectivo','id_añoElectivo');
        $gradoo                 = Grado::pluck('grado','id_grado');
        //$tipoDeAspirantee       = Tipodeaspirante::pluck('tipoDeAspirante','id_tipoDeAspirante');
        //$responsablee           = Responsable::pluck('nombres','id_responsable');
        //$alumnoo                = Alumno::pluck('nombres','id_alumno');
        //return $alumnosmatricula;
        $crearAlumno = Crearalumno::findOrFail($alumnosmatricula);
       
        return view('crearAlumnos.show',compact('crearAlumno','añoElectivoo','gradoo') )->with('crearAlumno', $crearAlumno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
