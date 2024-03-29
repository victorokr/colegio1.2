<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promedio;
use RealRashid\SweetAlert\Facades\Alert;

class PromedioController extends Controller
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
        $searchStudent = $request-> get('alumno');
        $searchYear    = $request-> get('año');

        $listaPromedios = Promedio::orderBy('id_promedio','DESC')
        ->consultaAlumno($searchStudent)//consultaCurso es el nombre del metodo en el modelo, pero sin scope
        ->consultaAño($searchYear)
        ->paginate(100);
        return view('promedios.index', compact('listaPromedios','searchStudent','searchYear'));
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
    public function destroy(Request $request, $id)
    {
         //return $request->all();
         $ids = $request->ids;
         $promedios = Promedio::whereIn('id_promedio',$ids);
         $promedios->delete();
         Alert::toast('Los Promedios y sus Calificaciones fueron eliminados', 'success')->timerProgressBar();
         return back();
    }
}
