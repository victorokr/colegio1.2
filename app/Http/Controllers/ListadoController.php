<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Asignatura;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Listado;
use Illuminate\Validation\Rule;
use Validator;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateListadoRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ListadoController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:docente'); 

    //    colocar el except index
       $this->middleware('roles:Administrador', ['except' =>['index']]); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {   // return $request->all();
        $cursoo        = Curso::pluck('salon','id_curso');
        $busquedaCurso = $request-> get('salon');
        // dd($busquedaCurso);

        $listado = Listado::orderBy('id_listado','DESC')
        ->consultaCurso($busquedaCurso)//consultaCurso es el nombre del metodo en el modelo, pero sin scope
        ->paginate(15);
        return view('listado.index', compact('listado','cursoo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $asignaturaa        = Asignatura::pluck('asignatura','id_asignatura');
        $docentee           = Docente::pluck('nombres','id_docente');
        $cursoo             = Curso::pluck('salon','id_curso');
        return view('listado.create',compact('asignaturaa', 'docentee', 'cursoo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion doble
        $validator = Validator::make($request->all(), [
            'id_curso' =>['required',Rule::unique('listado')->where(function ($query) use ($request){
                return $query->where('id_asignatura', $request->id_asignatura)
                ->where('id_docente', $request->id_docente);
                
            })],

            'id_asignatura' =>['required',Rule::unique('listado')->where(function ($query) use ($request){
                return $query->where('id_curso', $request->id_curso);
                
            })],

        ]);


        if ($validator->fails()) {
            Alert::error('ups ', 'El docente ya existe con esta asignatura y curso')->timerProgressBar();
            return back();
        }

        $listado    = Listado::create($request->all());

        
        Alert::toast('listado asignado al docente', 'success')->timerProgressBar();
        return redirect()->route('listado.index', compact('listado'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listado    = Listado::findOrFail($id);

        $asignaturaa        = Asignatura::pluck('asignatura','id_asignatura');
        $docentee           = Docente::pluck('nombres','id_docente');
        $cursoo             = Curso::pluck('salon','id_curso');
        return view('listado.edit', compact('listado','asignaturaa','cursoo','docentee'));
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
        //$this->validate(request(), ['asignatura' =>['required','string','max:30',Rule::unique('asignatura')->ignore($id,'id_asignatura')]]);

        //validacion doble
        $validator = Validator::make($request->all(), [
            'id_curso' =>['required',Rule::unique('listado')->ignore($id,'id_listado')->where(function ($query) use ($request){
                return $query->where('id_asignatura', $request->id_asignatura)
                ->where('id_docente', $request->id_docente);
                
            })],

            'id_asignatura' =>['required',Rule::unique('listado')->ignore($id,'id_listado')->where(function ($query) use ($request){
                return $query->where('id_curso', $request->id_curso);
                
            })],

        ]);


        if ($validator->fails()) {
            Alert::error('ups ', 'El docente ya existe con esta asignatura y curso')->timerProgressBar();
            return back();
        }

        $listado = Listado::findOrFail($id);
         
        $listado->update($request->all());
        Alert::toast('listado actualizado correctamente', 'success')->timerProgressBar();
        return redirect()->route('listado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listado = Listado::findOrFail($id);
        $listado->delete();
        Alert::toast('Listado eliminado', 'success')->timerProgressBar();
        return back();
    }
}
