<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Añoelectivo;
use App\Models\Tipodeaspirante;
use App\Models\Responsable;
use App\Models\Alumno;
use App\Models\Matricula;
use App\Models\Grado;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateMatriculaRequest;
use RealRashid\SweetAlert\Facades\Alert;
//use  SweetAlert;
//use Alert;
class MatriculaController extends Controller
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
    public function index(Request $request)
    {
        
        $listaMatriculas = Matricula::orderBy('id_matricula','DESC')
       ->where('id_responsable','=', Auth::user()->id_responsable)->get();
        return view('mismatriculas.index', compact('listaMatriculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $documentoAlumno = $request->get('nombres');
        // $listaMatriculas = Matricula::orderBy('id_matricula','DESC')
        // ->alumnoscope($documentoAlumno)//alumno es el nombre del metodo en el modelo, pero sin scope
        // ->paginate(1);

        $añoElectivoo           = Añoelectivo::pluck('añoElectivo','id_añoElectivo');
        $gradoo                 = Grado::pluck('grado','id_grado');
        //$tipoDeAspirantee       = Tipodeaspirante::pluck('tipoDeAspirante','id_tipoDeAspirante');
        //$responsablee           = Responsable::pluck('nombres','id_responsable');
        //$alumnoo                = Alumno::pluck('nombres','id_alumno');
        
        return view('mismatriculas.create', compact('añoElectivoo','gradoo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMatriculaRequest $request)
    {
        //return $request->all();
        $crearMatricula = Matricula::create([

            "id_responsable"     => Auth::user()->id_responsable,
            //"id_responsable"     => $request->input('id_responsable'),
            "id_añoElectivo"     => $request->input('id_añoElectivo'),
            "id_grado"           => $request->input('id_grado'),
            "id_tipoDeAspirante" => '1',
            "id_alumno"          => $request->input('id_alumno'),
            "id_estado"          => '1',
        ]);
        Alert::success('Su registro fue exitoso', 'Para continuar con el proceso de matrícula, por favor diríjase con el recibo de pago a las instalaciones del colegio')->timerProgressBar();
        return redirect()->route('area.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listaMatriculas = Matricula::orderBy('id_matricula','DESC')
        ->alumnoscope($documentoAlumno)//alumno es el nombre del metodo en el modelo, pero sin scope
        ->paginate(4);
        return view('mismatriculas.show', compact('listaMatriculas'));
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
