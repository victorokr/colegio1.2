@extends('layouts.app')
@section('content')



<div class="container-global">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header text-center "><a><i class="fas fa-chalkboard-teacher"></i> asignar docente</a>
    </div>
    <div class="card-body">
      <div class="container-cssform">
        <form method="POST" action="{{ route('listado.store') }}" id="form" >
        {!!csrf_field() !!}
          <div class="row justify-content-center ">
            <div class=" col-sm-8 col-md-8 col-lg-6 mt-4">
             <div class="card">
              <div class="card-header text-center "> <small class="text-muted asterisko ">Obligatorio</small></div>
              <div class="card-body">  
                

                <div class="form-group ">
                        <label class="asterisko">Asignatura</label>
                        <select id="inputAsignatura" class="form-control form-control-sm" name="id_asignatura"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($asignaturaa as $asignatura => $Asignatura)
                                <option value="{{ $asignatura }}" {{ old('id_asignatura') }} > {{$Asignatura }} </option>
                                {!!$errors->first('id_asignatura','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <div class="form-group ">
                    <label class="asterisko">Docente</label>
                        <select id="inputPeriodo" class="form-control form-control-sm" name="id_docente" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($docentee as $docente =>$Docente)
                                <option value="{{ $docente }}" {{ old('id_docente') }} > {{$Docente }} </option>
                                {!!$errors->first('id_docente','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                
                
                <div class="form-group ">
                    <label class="asterisko">Curso</label>
                        <select id="inputGrado" class="form-control form-control-sm" name="id_curso"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($cursoo as $curso => $Curso)
                                <option value="{{ $curso }}" {{ old('id_curso') }} > {{$Curso }} </option>
                                {!!$errors->first('id_curso','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                
                
            
                <button type="submit" class="btn btn-success btn-sm btn-block">Asignar docente</button>
              </div>
             </div>  
            </div>
          </div>   
        </form> 
      </div>
    </div>
  </div>
</div>

@endsection