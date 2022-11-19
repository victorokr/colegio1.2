@extends('layouts.app')
@section('content')



<div class="container-global">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header text-center "><a><i class="icono fas fa-bookmark"></i> Crear logro</a>
    </div>
    <div class="card-body">
      <div class="container-cssform">
        <form method="POST" action="{{ route('logros.store') }}" id="form" >
        {!!csrf_field() !!}
          <div class="row justify-content-center ">
            <div class=" col-sm-8 col-md-8 col-lg-6 mt-4">
             <div class="card">
              <div class="card-header text-center "> <small class="text-muted asterisko ">Obligatorio</small></div>
              <div class="card-body">  
                <div class="form-group ">
                    <label class="asterisko"> logro</label>
                    <textarea class="form-control form-control-sm " id="inputLogro" name="logro"  value="{{ old('logro') }}"  placeholder="escribe el logro" required  data-parsley-length="[3, 200]" data-parsley-trigger="keyup"></textarea>
                    {!!$errors->first('logro','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko">para que periodo?</label>
                        <select id="inputPeriodo" class="form-control form-control-sm" name="id_periodo" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($periodoo as $periodo =>$Periodo)
                                <option value="{{ $periodo }}" {{ old('id_periodo') }} > {{$Periodo }} </option>
                                {!!$errors->first('id_periodo','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                
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
                    <label class="asterisko">Grado</label>
                        <select id="inputGrado" class="form-control form-control-sm" name="id_grado"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($gradoo as $grado => $Grado)
                                <option value="{{ $grado }}" {{ old('id_grado') }} > {{$Grado }} </option>
                                {!!$errors->first('id_grado','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>
                <input type="hidden" name="id_docente"
						    value="{{ Auth::user()->id_docente }}"> 
                
            
                <button type="submit" class="btn btn-success btn-sm btn-block">Crear Logro</button>
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