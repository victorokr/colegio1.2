@extends('layouts.app')
@section('content')



<div class="container-global">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header text-center "><a><i class="icono fas fa-bookmark"></i> Crear logros</a>
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
                    <label class="asterisko"> logro uno</label>
                    <textarea class="form-control form-control-sm " id="inputLogro1" name="logro1"  value="{{ old('logro1') }}"  placeholder="escribe el logro 1" required  data-parsley-length="[3, 200]" data-parsley-trigger="keyup"></textarea>
                    {!!$errors->first('logro1','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko"> logro dos</label>
                    <textarea class="form-control form-control-sm " id="inputLogro2" name="logro2"  value="{{ old('logro2') }}"  placeholder="escribe el logro 2" required  data-parsley-length="[3, 200]" data-parsley-trigger="keyup"></textarea>
                    {!!$errors->first('logro2','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko"> logro tres</label>
                    <textarea class="form-control form-control-sm " id="inputLogro9" name="logro3"  value="{{ old('logro3') }}"  placeholder="escribe el logro 3" required  data-parsley-length="[3, 200]" data-parsley-trigger="keyup"></textarea>
                    {!!$errors->first('logro3','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko"> logro cuatro</label>
                    <textarea class="form-control form-control-sm " id="inputLogro4" name="logro4"  value="{{ old('logro4') }}"  placeholder="escribe el logro 4" required  data-parsley-length="[3, 200]" data-parsley-trigger="keyup"></textarea>
                    {!!$errors->first('logro4','<span class=error>:message</span>')!!}
                </div>
                <!-- <div class="form-group ">
                    <label class="asterisko"> logro cinco</label>
                    <textarea class="form-control form-control-sm " id="inputLogro5" name="logro5"  value="{{ old('logro5') }}"  placeholder="escribe el logro 5" required  data-parsley-length="[3, 200]" data-parsley-trigger="keyup"></textarea>
                    {!!$errors->first('logro5','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko"> logro seis</label>
                    <textarea class="form-control form-control-sm " id="inputLogro6" name="logro6"  value="{{ old('logro6') }}"  placeholder="escribe el logro 6" required  data-parsley-length="[3, 200]" data-parsley-trigger="keyup"></textarea>
                    {!!$errors->first('logro6','<span class=error>:message</span>')!!}
                </div> -->
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
                
            
                <button type="submit" class="btn btn-success btn-sm btn-block">Crear Logros</button>
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