<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Calificacion;
use App\Models\Evaluarcurso;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;

use App\Models\Periodo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use Illuminate\Validation\Rule;
use Validator;


class EvaluarcursoController extends Controller
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
    {       //return $request->all();
            // $parametros = $request->query();
            // $parametross = $request->all();
            // $parametrosUrl = $request->fullUrl();
            // $paramet = url()->full();
            //dd($paramet);

            $docentee     = $request->get('docentee');
            $idAsignatura = $request->get('idAsignatura');
            //dd($idAsignatura);

            if(! $request->hasValidSignature())
                {
                        Alert::toast('no puedes calificar este salon', 'error')->timerProgressBar();
                        return redirect()->route('listado.index');
                }
                else
                {

                

            
                            if($docentee != Auth::user()->id_docente ){
                                
                                Alert::toast('no puedes calificar este salon', 'error')->timerProgressBar();
                                return redirect()->route('listado.index');
                                

                            }
                            else{

                                // dd($curso);
                                $curso        = $request->get('cursoo');
                                $listaCursos = Matricula::orderBy('id_matricula','DESC')
                                ->curso($curso) //curso es el nombre del metodo en el modelo, pero sin scope
                                ->paginate(150);//la paginacion no se debe habilitar porque borra los parametros de la url

                                
                                 return view('evaluarCurso.index', compact('listaCursos'));
                                
                                
                                }

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




    public static function calcularPeriodo(){
        //toArray convierte un objeto elocuent en un array plano
        $fechainicioo  = Periodo::pluck('fechainicio')->toArray();
        $fechafinn     = Periodo::pluck('fechafin')->toArray();

        

        $fechahoy = Carbon::now();
        

        foreach($fechainicioo as $fechainicio){

                if($fechahoy >= ($fechainicio[0]) && $fechahoy <= ($fechafinn[0]) )
                return '1';

                
       
                if($fechahoy >= ($fechainicio[1]) && $fechahoy <= ($fechafinn[1]) )
                return '2';

                
                    
                if($fechahoy >= ($fechainicio[2]) && $fechahoy <= ($fechafinn[2]) )
                return '3';

               
                    
                if($fechahoy >= ($fechainicio[3]) && $fechahoy <= ($fechafinn[3]) )
                return '4';

                

        }





    }








    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {
        //$idGrado     = Crypt::decrypt($request->idGrado);
         //return $request->all();
         
        try{
            $idAsignatura = Crypt::decrypt($request->get('id_asignatura'));
            $idCurso      = Crypt::decrypt($request->get('id_curso'));
            //$idGrado     = Crypt::decrypt($request->idGrado);
        }catch (DecryptException $e){
            Alert::toast('no puedes calificar este salon', 'error')->timerProgressBar();
            return redirect()->route('listado.index');
        }
        


         //validacion doble
         //id_alumno requiere regla unica en la tabla calificacion, donde id_periodo en la bd es igual a calcularPeriodo y id_asignatura bd es igual id_asignatura request
         //id_alumno requere unico periodo y unica asignatura
         $validator = Validator::make($request->all(), [
            'id_alumno' =>['required',Rule::unique('calificacion')->where(function ($query) use ($request){
                return $query->where('id_periodo', $this->calcularPeriodo())
                ->where('id_asignatura', Crypt::decrypt($request->id_asignatura) );
                
            })],

            

        ]);


        if ($validator->fails()) {
            Alert::error('UPS ', 'Intentalo en el proximo periodo por que ya fue calificado en este')->timerProgressBar();
            return back();
        }



        
        //dd($idGrado);

        $notas =  $request->all( 'nota1','nota2','nota3','nota4','nota5','nota6');
        $calcularPromedio = array_sum($notas)/6;
        $numeroFormateado = bcdiv($calcularPromedio, '1','1'); //bcdiv no redondea el resultado
        //dd($numeroFormateado);
        

        $crearCalificacion = Calificacion::create([
            
            //"id_responsable"     => Auth::user()->id_responsable,
            "nota1" => $request->input('nota1'),
            "nota2" => $request->input('nota2'),
            "nota3" => $request->input('nota3'),
            "nota4" => $request->input('nota4'),
            "nota5" => $request->input('nota5'),
            "nota6" => $request->input('nota6'),
            "promedio"      => ($numeroFormateado),
            "id_asignatura" =>  ($idAsignatura),
            
            "id_alumno"     => $request->input('id_alumno'),
            "id_curso"      => ($idCurso),
            "id_periodo"    => $this->calcularPeriodo(),
           // "id_periodo"    => '4',
            "id_docente"    =>  Auth::user()->id_docente,
            "id_grado"      => $request->input('id_grado'),

        ]);
        
        
        Alert::toast('Su calificacion fue exitosa', 'success')->timerProgressBar();
        return redirect()-> back();
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
    public function destroy($id)
    {
        //
    }
}
