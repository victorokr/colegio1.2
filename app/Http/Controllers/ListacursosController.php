<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\CreateCursoRequest;
use Illuminate\Validation\Rule;

class ListacursosController extends Controller
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
        $busquedaCurso = $request-> get('salon');

        $listaCursos = Curso::orderBy('id_curso','DESC')
        ->consultaCurso($busquedaCurso)//consultaCurso es el nombre del metodo en el modelo, pero sin scope
        ->paginate(15);
        return view('listaCursos.index', compact('listaCursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listaCursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCursoRequest $request)
    {
        $listaCursos    = Curso::create($request->all());

        
        Alert::toast('curso creado correctamente', 'success')->timerProgressBar();
        return redirect()->route('cursos.index', compact('listaCursos'));
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
        $listaCursos    = Curso::findOrFail($id);
        return view('listaCursos.edit', compact('listaCursos'));
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
        $this->validate(request(), ['salon' =>['required','max:540',Rule::unique('curso')->ignore($id,'id_curso')]]);

        $listaCursos = Curso::findOrFail($id);
         
        $listaCursos->update($request->all());
        Alert::toast('curso actualizado correctamente', 'success')->timerProgressBar();
        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listaCursos = Curso::findOrFail($id);
        $listaCursos->delete();
        Alert::toast('Curso eliminado', 'success')->timerProgressBar();
        return back();
    }
}
