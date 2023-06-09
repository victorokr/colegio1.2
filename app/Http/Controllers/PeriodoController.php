<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use RealRashid\SweetAlert\Facades\Alert;

class PeriodoController extends Controller
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
    public function index()
    {
        $periodos = Periodo::all();
        return view('periodo.index', compact('periodos'));
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
        $periodo = Periodo::findOrFail($id);
        return view('periodo.edit', compact('periodo'));
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

        //eturn $request->all();
        $periodo = Periodo::findOrFail($id);
        //dd($periodo);
        $añoActual     = date('Y');
        $fechainicioo  = Periodo::pluck('fechainicio')->toArray();
        $fechafinn     = Periodo::pluck('fechafin')->toArray();

         
            switch ($periodo->id_periodo) {
                case "1":
                        if( ($request->input('fechainicio')) > ($fechafinn[0]) or ($request->input('fechafin')) < ($fechainicioo[0]) ){
                            Alert::error('UPS ', 'Rango de fecha no valido ')->timerProgressBar();
                            return back();
                        }
                       
                        if( ($request->input('fechafin')) > ($fechainicioo[1]) ){
                            Alert::error('UPS ', 'No se puede poner la fecha fin del primer periodo, superior a la fecha de inicio del segundo periodo')->timerProgressBar();
                            return back();
                        }else{
                            $periodo->update($request->all());
                            Alert::toast('Periodo 1 actualizado correctamente', 'success')->timerProgressBar();
                            return redirect()->route('periodo.index');
                        }
                    break;
                      
                case "2":
                        if( ($request->input('fechainicio')) > ($fechafinn[1]) or ($request->input('fechafin')) < ($fechainicioo[1]) ){
                            Alert::error('UPS ', 'Rango de fecha no valido ')->timerProgressBar();
                            return back();
                        }
                    
                        if( ($request->input('fechafin')) > ($fechainicioo[2]) ){
                            Alert::error('UPS ', 'No se puede poner la fecha fin del segundo periodo, superior a la fecha de inicio del tercer periodo')->timerProgressBar();
                            return back();
                        }else{
                            $periodo->update($request->all());
                            Alert::toast('Periodo 2 actualizado correctamente', 'success')->timerProgressBar();
                            return redirect()->route('periodo.index');
                        }
                    break;
    
                case "3":
                        if( ($request->input('fechainicio')) > ($fechafinn[2]) or ($request->input('fechafin')) < ($fechainicioo[2]) ){
                            Alert::error('UPS ', 'Rango de fecha no valido ')->timerProgressBar();
                            return back();
                        }
                    
                        if( ($request->input('fechafin')) > ($fechainicioo[3]) ){
                            Alert::error('UPS ', 'No se puede poner la fecha fin del tercer periodo, superior a la fecha de inicio del cuarto periodo')->timerProgressBar();
                            return back();
                        }else{
                            $periodo->update($request->all());
                            Alert::toast('Periodo 3 actualizado correctamente', 'success')->timerProgressBar();
                            return redirect()->route('periodo.index');
                        }
                    break;
                case "4":
                        if( ($request->input('fechainicio')) > ($fechafinn[3]) or ($request->input('fechafin')) < ($fechainicioo[3]) ){
                            Alert::error('UPS ', 'Rango de fecha no valido ')->timerProgressBar();
                            return back();
                        }else{
                            $periodo->update($request->all());
                            Alert::toast('Periodo 4 actualizado correctamente', 'success')->timerProgressBar();
                            return redirect()->route('periodo.index');
                        }
                    break;    
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
        //
    }
}
