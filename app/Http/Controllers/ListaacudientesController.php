<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsable;
use App\Models\Parentesco;
use App\Models\Tipodocumento;
use App\Models\Responsabledos;
use App\Models\Ocupacion;
use App\Http\Requests\CreateAcudienteRequest;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class ListaacudientesController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:docente'); 

       $this->middleware('roles:Administrador');
       //, ['except' =>['edit','update']]
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombreResponsable = $request->get('nombres');
        

        $listaAcudientes = Responsable::orderBy('id_responsable','DESC')
        ->acudiente($nombreResponsable)//acudiente es el nombre del metodo en el modelo, pero sin scope
        ->paginate(4);
        return view('listaAcudientes.index', compact('listaAcudientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentescoo            = Parentesco::pluck('parentesco','id_parentesco');
        $tipoDeDocumentoo       = Tipodocumento::pluck('tipoDocumento','id_tipoDocumento');
        $ocupacionn             = Ocupacion::pluck('ocupacion', 'id_ocupacion');
        //$responsabledos         = Responsabledos::pluck('nombres', 'id_responsabledos');
        return view('listaAcudientes.create', compact('parentescoo','tipoDeDocumentoo','ocupacionn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAcudienteRequest $request)
    {   //return $request->all();
            $listaAcudientes = new Responsable;
            $listaAcudientes->nombres   = $request->input('nombres');
            $listaAcudientes->apellidos = $request->input('apellidos');
            $listaAcudientes->documento = $request->input('documento');
            $listaAcudientes->telefono  = $request->input('telefono');
            $listaAcudientes->direccion = $request->input('direccion');
            $listaAcudientes->email     = $request->input('email');
            $listaAcudientes->lugarDeResidencia = $request->input('lugarDeResidencia');
            $listaAcudientes->password          = bcrypt( $request->input('password')); 
            $listaAcudientes->id_parentesco     = $request->input('id_parentesco');
            $listaAcudientes->id_tipoDocumento  = $request->input('id_tipoDocumento');
            $listaAcudientes->save();
            $listaAcudientes->ocupacion()->attach($request->ocupacion);
            $listaAcudientes->roles()->attach(2);
        Alert::toast('Acudiente creado exitosamente', 'success')->timerProgressBar();
        return redirect()->route('acudientes.index', compact('listaAcudientes'));
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
        $listaAcudientes        = Responsable::findOrFail($id);
        $parentescoo            = Parentesco::pluck('parentesco','id_parentesco');
        $tipoDeDocumentoo       = Tipodocumento::pluck('tipoDocumento','id_tipoDocumento');
        $ocupacionn             = Ocupacion::pluck('ocupacion', 'id_ocupacion');
        return view('listaAcudientes.edit', compact('listaAcudientes','parentescoo','tipoDeDocumentoo','ocupacionn'));
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
        $this->validate(request(), ['email' =>['required','email','max:50',Rule::unique('responsable')->ignore($id,'id_responsable')]]);
        $listaAcudientes        = Responsable::findOrFail($id);
        $listaAcudientes->ocupacion()->sync($request->ocupacion);

        if (is_null($request->password)) {
        $listaAcudientes->update($request->except('password'));
        Alert::toast('Acudiente actualizado', 'success')->timerProgressBar();
        return redirect()->route('acudientes.index');
        }

        else{
            //$listaDocentes  ->update($request->all());
            $listaAcudientes->nombres   = $request->input('nombres');
            $listaAcudientes->apellidos = $request->input('apellidos');
            $listaAcudientes->documento = $request->input('documento');
            $listaAcudientes->telefono  = $request->input('telefono');
            $listaAcudientes->direccion = $request->input('direccion');
            $listaAcudientes->email     = $request->input('email');
            $listaAcudientes->lugarDeResidencia = $request->input('lugarDeResidencia');
            $listaAcudientes->password          = bcrypt( $request->input('password')); 
            $listaAcudientes->id_parentesco     = $request->input('id_parentesco');
            $listaAcudientes->id_tipoDocumento  = $request->input('id_tipoDocumento');
            $listaAcudientes->save();
    
            Alert::toast('Acudiente actualizado', 'success')->timerProgressBar();
            return redirect()->route('acudientes.index');
            }







    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listaAcudientes = Responsable::findOrFail($id);
        $listaAcudientes->delete();
        Alert::toast('Acudiente eliminado', 'success')->timerProgressBar();
        return back();
    }
}
