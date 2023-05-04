@extends('layouts.app')
@section('content')



<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3" >
    <div class="card-header text-center "><a><i class="fas fa-building"></i> Crear Curso</a></div>
     <div class="card-body ">
      <div class="container-cssform">
        <form method="POST" action="{{ route('cursos.store') }}" id="form" >
        {!!csrf_field() !!}
        <!-- <h6 class="card-title text-center"><p class="card-text"><small class="text-muted ">Todos los campos son obligatorios</small></p></h6> -->
            <div class="row justify-content-center ">
              <div class=" col-md-6 col-sm-6 col-lg-4 mt-4">
                <div class="card">
                <div class="card-header text-center "> <small class="text-muted asterisko ">Obligatorio</small></div>
                  <div class="card-body"> 
                    <div class="form-group">
                        <label class="asterisko"> curso</label>
                        <input type="text" class="form-control form-control-sm" id="inputCurso" name="salon" value="{{ old('salon') }}" required data-parsley-type="digits" data-parsley-length="[0, 4]" data-parsley-min="101" data-parsley-max="1106" data-parsley-trigger="keyup"  />
                        {!!$errors->first('salon','<span class=error>:message</span>')!!}
                    </div>
                    <div class="form-group ">
                        <label class="asterisko">Sede</label>
                        <select id="inputSede" class="form-control form-control-sm" name="id_sede"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($sedee as $sede => $Sede)
                                <option value="{{ $sede }}" {{ old('id_sede') }} > {{$Sede }} </option>
                                {!!$errors->first('id_sede','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label class="asterisko">Jornada</label>
                        <select id="inputJornada" class="form-control form-control-sm" name="id_jornada"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($jornadaa as $jornada => $Jornada)
                                <option value="{{ $jornada }}" {{ old('id_jornada') }} > {{$Jornada }} </option>
                                {!!$errors->first('id_jornada','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="asterisko">Director(a) de curso</label>
                        <select id="mySelect" class="dirCurso form-control form-control-sm" name="id_docente"required data-parsley-required data-parsley-trigger="keyup">
                            <option value="" selected></option>
                            @foreach ($directorDeCursoo  as $director => $Director)
                                <option value="{{ $director }}" {{ old('id_docente') }} > {{$Director }} </option>
                                {!!$errors->first('id_docente','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                          <script type="text/javascript" >
                              $(document).ready(function() {

                            $('.dirCurso').select2();
                                        $("#mySelect").select2();

                            $(".dirCurso").select2({
                                        maximumSelectionLength: 2,
                                        theme: "classic"							  
                                        });
                                        

                                      });
                          </script>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm btn-block  ">Crear Curso</button> 
                  </div>  
                </div>

              </div>  
            </div>

            <div class="form-row">
             <!-- inputs en horizontal    -->
            </div>


            <div class="form-row">
            </div>

            
        </form>
      </div>
      </div>
     </div>
</div>

@endsection