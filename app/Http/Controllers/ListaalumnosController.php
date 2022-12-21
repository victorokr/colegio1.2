<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\FactorRH;
use App\Models\Eps;
use App\Models\Lugardenacimiento;
use App\Models\Tipodocumento;
use App\Models\Grado;
use App\Models\Curso;
use App\Models\Responsable;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Validation\Rule;

class ListaalumnosController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:docente'); 

       $this->middleware('roles:Administrador');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombreAlumno = $request->get('nombres');
        

        $listaAlumnos = Alumno::orderBy('id_alumno','DESC')
        ->alumno($nombreAlumno)//alumno es el nombre del metodo en el modelo, pero sin scope
        
        ->paginate(14);
        return view('listaAlumnos.index', compact('listaAlumnos'));
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
        // $listaAcudientes = Alumno::findOrFail($id);
        // return view('listaAlumnos.show', compact('listaAcudientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaAlumnos        = Alumno::findOrFail($id);

        $factorrhh           = FactorRH::pluck('factorRH','id_factorRH');
        $epss                = Eps::pluck('EPS','id_eps');
        $lugarDeNacimientoo  = Lugardenacimiento::pluck('lugarDeNacimiento','id_lugarDeNacimiento');
        $tipoDeDocumentoo    = Tipodocumento::pluck('tipoDocumento','id_tipoDocumento');
        

        return view('listaAlumnos.edit', compact('listaAlumnos','factorrhh','epss','lugarDeNacimientoo','tipoDeDocumentoo'));
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
        $this->validate(request(), ['documento' =>['required','max:50',Rule::unique('alumno')->ignore($id,'id_alumno')]]);
        $listaAlumnos = Alumno::findOrFail($id);
        $listaAlumnos->update($request->all());
        Alert::success('', 'la informacion del Alumno fue actualizada ')->timerProgressBar();
        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listaAlumnos = Alumno::findOrFail($id);
        $listaAlumnos->delete();
        Alert::success('', 'El Alumno fue eliminado ')->timerProgressBar();
        return back(); 
    }
}
