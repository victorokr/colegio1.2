@extends('layouts.app')
@section('content')


<div class="container-global">
<!-- <td>{{ $var = request()->path() }}</td> -->


  <div class="card  mr-3 ml-0 mt-3" >
    <div class="card-header text-center">
    <a><i class="icono fas fa-user-cog"></i> PreMatricula </a>
    </div>
    <div class="card-body ">
       
        <form method="POST" action="{{ route('matricula.store') }}" id="form" >
        {!!csrf_field() !!}
            
            <input type="hidden" name="id_alumno"
						value="{{ $crearAlumno->id_alumno  }}">
            {!!$errors->first('id_alumno','<span class=error>:message</span>')!!}

           

            <div class="row justify-content-center ">
                <div class="col-md-4 mt-4">
                  <div class="card">
                      <div class="card-header text-center "> <small class="text-muted asterisko ">Obligatorio</small></div>
                    <div class="card-body">
                      <div class="form-group">  
                        <label class="asterisko">Año al que se va a matricular para iniciar clases </label>
                        <select id="inputParentesco" class="form-control" name="id_añoElectivo" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                              @foreach ($añoElectivoo as $año =>$AñoElectivoo)
                                    <option value="{{ $año }}" {{ old('id_añoElectivo') }} > {{$AñoElectivoo }} </option>
                                    {!!$errors->first('id_añoElectivo','<span class=error>:message</span>')!!}
                              @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="asterisko">Grado al que ingresa</label>
                                    <select  class="grado js-states form-control"  name="id_grado" required data-parsley-required data-parsley-trigger="keyup">
                                        <option value="" selected></option>
                                        @foreach ($gradoo  as $grado => $Grado)
                                            <option value="{{ $grado }}" {{ old('id_grado') }} > {{$Grado }} </option>
                                            {!!$errors->first('id_grado','<span class=error>:message</span>')!!}
                                        @endforeach
                                    </select>
                                    <script type="text/javascript" >
                              $(document).ready(function() {

                            $('.grado').select2();
                                        $("#mySelect").select2();

                            $(".grado").select2({
                                        theme: "classic",							  
                                        });
                                        

                          });
                            </script>
                      </div>
                      <div class="form-group ">
                         <button type="submit" class="btn btn-success btn-sm mt-4 btn-block">Matricular Estudiante</button>
                      </div>
                    </div>  
                  </div>
                </div>
            </div>

            
            
             
        </form> 
      </div>
      
    </div>
    <div class="card-footer text-muted text-center">
    <h6 class="card-title"><p class="card-text"><small class="text-muted">{{ $crearAlumno->nombres }} </small></p></h6>
    </div>




</div>

@endsection