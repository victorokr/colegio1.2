<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Anioelectivo;
use App\Models\Alumno;
use App\Models\Estado;
use App\Models\Grado;
use App\Models\Curso;
use App\Models\Tipodocumento;
use App\Models\Tipodeaspirante;
use App\Models\Responsable;


use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateMatriculaRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Validator;
// use Illuminate\Support\Arr;
// use Illuminate\Support\Str;

class ListamatriculasController extends Controller
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
        {
            $alumnoDocumento    = $request->get('documento');
            $grado              = $request->get('grado');
            $curso              = $request->get('salon');
            $añoElectivo        = $request->get('añoElectivo');
            $gradoo       = Grado::pluck('grado','id_grado');
            $cursoo       = Curso::pluck('salon','id_curso');
            
    
            $listaMatriculas = Matricula::orderBy('id_matricula','DESC')
            ->alumnodocumentoo($alumnoDocumento)//alumnodocumentoo es el nombre del metodo en el modelo, pero sin scope
            ->grado($grado)
            ->curso($curso)
            ->añoElectivo($añoElectivo)
            ->paginate(14);
            return view('matriculas.index', compact('listaMatriculas','gradoo','cursoo'));
        }
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
        $listaMatriculas     = Matricula::findOrFail($id);

        $añoActual = date('Y');
        $añoElectivoo        = Anioelectivo::where('añoElectivo', '>=', $añoActual)->pluck('añoElectivo','id_añoElectivo');
        //$añoElectivoo        = Anioelectivo::pluck('añoElectivo','id_añoElectivo');
        $alumnoo             = Alumno::pluck('nombres','id_alumno');
        $estadoo             = Estado::pluck('estado','id_estado');
        $gradoo              = Grado::pluck('grado','id_grado');
        $cursoo              = Curso::pluck('salon','id_curso');
        $tipoDeAspirantee    = Tipodeaspirante::pluck('tipoDeAspirante','id_tipoDeAspirante');
        $responsablee        = Responsable::pluck('nombres','id_responsable');

        return view('matriculas.edit', compact('listaMatriculas','añoElectivoo','alumnoo','estadoo','gradoo','cursoo','tipoDeAspirantee','responsablee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   //return  $request->all();
        $listaMatriculas     = Matricula::findOrFail($id);
    //--------------------------------------------------------------------------------------------------------------    
        //validacion input id_añoElectivo, año no puede ser inferior al año actual
        //$añoElectivo = Anioelectivo::where('id_añoElectivo', $request->id_añoElectivo)->pluck('añoElectivo')->toArray();
        //$fechaActual = Carbon::now();
        //$añoActual = date('Y');
        //dd($añoActual);

        // $validator = Validator::make($request->all(), [
            
        //     'id_añoElectivo' => ['required',

       
                
        //     function($attribute, $value, $fail){
        //         if($value < $añoActual && $value <= date('Y')){
        //             $fail("The :attribute must be between 1990 to ".date('Y').".");
        //         }
        //     }  

                
            

        //     ],
           
        // ]);

        // if ($validator->fails()) {
        //     Alert::error('UPS ', 'el año no puede ser inferior al año actual, intentalo de nuevo')->timerProgressBar();
        //     return back();
        // }


    //--------------------------------------------------------------------------------------------------------------
        //validacion el curso no puede ser distinto a su grado    
        $CursoAbuscar = Curso::where('id_curso', $request->id_curso)->pluck('salon')->toArray();//->all()
       
        //$CursoAbuscar = '101';
        //dd($requestCurso);
        
        switch ($request->id_grado) {
            case "1":
                $arrayCursos = ['101', '102', '103', '104', '105', '106', '107', '108', '109'];
                //$arrayCollection = collect($arrayCursos);
                //dd($arrayCollection);
              
                //in_array() compara si un elemento de un array plano esta en otro array plano
                foreach($CursoAbuscar as $CursoAbusca){
                    if(in_array($CursoAbusca, $arrayCursos))
                    {
                        $listaMatriculas     ->update($request->except('id_responsable','id_alumno'));
                        $listaMatriculas->id_estado = '2';
                        $listaMatriculas->save();
                        Alert::success('', 'Alumno Matriculado')->timerProgressBar();
                        return redirect()->route('matriculas.index');
                        
                    }else
                    {
                        Alert::error('UPS ', 'el curso no corresponde al grado, intentalo de nuevo')->timerProgressBar();
                        return back();    
                    }
                    break;
                }
           
            case "2":
                $arrayCursos = ['201', '202', '203', '204', '205', '206', '207', '208', '209'];
    
                foreach($CursoAbuscar as $CursoAbusca){
                    if(in_array($CursoAbusca, $arrayCursos))
                    {
                        $listaMatriculas     ->update($request->except('id_responsable','id_alumno'));
                        $listaMatriculas->id_estado = '2';
                        $listaMatriculas->save();
                        Alert::success('', 'Alumno Matriculado')->timerProgressBar();
                        return redirect()->route('matriculas.index');
                        
                    }else
                    {
                        Alert::error('UPS ', 'el curso no corresponde al grado, intentalo de nuevo')->timerProgressBar();
                        return back();                
                    }
                    break;
                }

            case "3":
                $arrayCursos = ['301', '302', '303', '304', '305', '306', '307', '308', '309'];
    
                foreach($CursoAbuscar as $CursoAbusca){
                    if(in_array($CursoAbusca, $arrayCursos))
                    {
                        $listaMatriculas     ->update($request->except('id_responsable','id_alumno'));
                        $listaMatriculas->id_estado = '2';
                        $listaMatriculas->save();
                        Alert::success('', 'Alumno Matriculado')->timerProgressBar();
                        return redirect()->route('matriculas.index');
                        
                    }else
                    {
                        Alert::error('UPS ', 'el curso no corresponde al grado, intentalo de nuevo')->timerProgressBar();
                        return back();   
                    }
                    break;
                }

            case "4":
                $arrayCursos = ['401', '402', '403', '404', '405', '406', '407', '408', '409'];
    
                foreach($CursoAbuscar as $CursoAbusca){
                    if(in_array($CursoAbusca, $arrayCursos))
                    {
                        $listaMatriculas     ->update($request->except('id_responsable','id_alumno'));
                        $listaMatriculas->id_estado = '2';
                        $listaMatriculas->save();
                        Alert::success('', 'Alumno Matriculado')->timerProgressBar();
                        return redirect()->route('matriculas.index');
                        
                    }else
                    {
                        Alert::error('UPS ', 'el curso no corresponde al grado, intentalo de nuevo')->timerProgressBar();
                        return back();   
                    }
                    break;
                }

            case "5":
                $arrayCursos = ['501', '502', '503', '504', '505', '506', '507', '508', '509'];
    
                foreach($CursoAbuscar as $CursoAbusca){
                    if(in_array($CursoAbusca, $arrayCursos))
                    {
                        $listaMatriculas     ->update($request->except('id_responsable','id_alumno'));
                        $listaMatriculas->id_estado = '2';
                        $listaMatriculas->save();
                        Alert::success('', 'Alumno Matriculado')->timerProgressBar();
                        return redirect()->route('matriculas.index');
                        
                    }else
                    {
                        Alert::error('UPS ', 'el curso no corresponde al grado, intentalo de nuevo')->timerProgressBar();
                        return back();   
                    }
                    break;
                }

            case "6":
                $arrayCursos = ['601', '602', '603', '604', '605', '606', '607', '608', '609'];
    
                foreach($CursoAbuscar as $CursoAbusca){
                    if(in_array($CursoAbusca, $arrayCursos))
                    {
                        $listaMatriculas     ->update($request->except('id_responsable','id_alumno'));
                        $listaMatriculas->id_estado = '2';
                        $listaMatriculas->save();
                        Alert::success('', 'Alumno Matriculado')->timerProgressBar();
                        return redirect()->route('matriculas.index');
                        
                    }else
                    {
                        Alert::error('UPS ', 'el curso no corresponde al grado, intentalo de nuevo')->timerProgressBar();
                        return back();   
                    }
                    break;
                }

            case "7":
                $arrayCursos = ['701', '702', '703', '704', '705', '706', '707', '708', '709'];
    
                foreach($CursoAbuscar as $CursoAbusca){
                    if(in_array($CursoAbusca, $arrayCursos))
                    {
                        $listaMatriculas     ->update($request->except('id_responsable','id_alumno'));
                        $listaMatriculas->id_estado = '2';
                        $listaMatriculas->save();
                        Alert::success('', 'Alumno Matriculado')->timerProgressBar();
                        return redirect()->route('matriculas.index');
                        
                    }else
                    {
                        Alert::error('UPS ', 'el curso no corresponde al grado, intentalo de nuevo')->timerProgressBar();
                        return back();   
                    }
                    break;
                }

            case "8":
                $arrayCursos = ['801', '802', '803', '804', '805', '806', '807', '808', '809'];
    
                foreach($CursoAbuscar as $CursoAbusca){
                    if(in_array($CursoAbusca, $arrayCursos))
                    {
                        $listaMatriculas     ->update($request->except('id_responsable','id_alumno'));
                        $listaMatriculas->id_estado = '2';
                        $listaMatriculas->save();
                        Alert::success('', 'Alumno Matriculado')->timerProgressBar();
                        return redirect()->route('matriculas.index');
                        
                    }else
                    {
                        Alert::error('UPS ', 'el curso no corresponde al grado, intentalo de nuevo')->timerProgressBar();
                        return back();   
                    }
                    break;
                }

            case "9":
                $arrayCursos = ['901', '902', '903', '904', '905', '906', '907', '908', '909'];
    
                foreach($CursoAbuscar as $CursoAbusca){
                    if(in_array($CursoAbusca, $arrayCursos))
                    {
                        $listaMatriculas     ->update($request->except('id_responsable','id_alumno'));
                        $listaMatriculas->id_estado = '2';
                        $listaMatriculas->save();
                        Alert::success('', 'Alumno Matriculado')->timerProgressBar();
                        return redirect()->route('matriculas.index');
                        
                    }else
                    {
                        Alert::error('UPS ', 'el curso no corresponde al grado, intentalo de nuevo')->timerProgressBar();
                        return back();   
                    }
                    break;
                }

            case "10":
                $arrayCursos = ['1001', '1002', '1003', '1004', '1005', '1006', '1007', '1008', '1009'];
    
                foreach($CursoAbuscar as $CursoAbusca){
                    if(in_array($CursoAbusca, $arrayCursos))
                    {
                        $listaMatriculas     ->update($request->except('id_responsable','id_alumno'));
                        $listaMatriculas->id_estado = '2';
                        $listaMatriculas->save();
                        Alert::success('', 'Alumno Matriculado')->timerProgressBar();
                        return redirect()->route('matriculas.index');
                        
                    }else
                    {
                        Alert::error('UPS ', 'el curso no corresponde al grado, intentalo de nuevo')->timerProgressBar();
                        return back();   
                    }
                    break;
                }

            case "11":
                $arrayCursos = ['1101', '1102', '1103', '1104', '1105', '1106', '1107', '1108', '1109'];
    
                foreach($CursoAbuscar as $CursoAbusca){
                    if(in_array($CursoAbusca, $arrayCursos))
                    {
                        $listaMatriculas     ->update($request->except('id_responsable','id_alumno'));
                        $listaMatriculas->id_estado = '2';
                        $listaMatriculas->save();
                        Alert::success('', 'Alumno Matriculado')->timerProgressBar();
                        return redirect()->route('matriculas.index');
                        
                    }else
                    {
                        Alert::error('UPS ', 'el curso no corresponde al grado, intentalo de nuevo')->timerProgressBar();
                        return back();   
                    }
                    break;
                }    
            default:
                return "";
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
        $listaMatriculas     = Matricula::findOrFail($id);
        $listaMatriculas->delete();
        Alert::toast('Matricula eliminada', 'success')->timerProgressBar();
        return back();
    }
}
