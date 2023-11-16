@extends('layouts.app')
@section('content')



<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3" >
    <div class="card-header text-center "><a><i class="icono fas fa-book-open"></i> Crear Asignatura</a></div>
     <div class="card-body ">
      <div class="container-cssform">
        <form method="POST" action="{{ route('asignaturas.store') }}" id="form" >
        {!!csrf_field() !!}
            <div class="row justify-content-center ">
              <div class=" col-md-6 col-sm-6 col-lg-4 mt-4">
                <div class="card">
                  <div class="card-header text-center "> <small class="text-muted asterisko ">Obligatorio</small></div>
                    <div class="card-body">
                            <div class="form-group">
                                <label class="asterisko"> asignatura</label>
                                <input type="text" class="form-control form-control-sm" id="inputAsignatura" name="asignatura" placeholder="ingresa el texto sin acentos" value="{{ old('asignatura') }}" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 30]" data-parsley-trigger="keyup"  />
                                {!!$errors->first('asignatura','<span class=error>:message</span>')!!}
                            </div>
        
                            <button type="submit" class="btn btn-success btn-sm btn-block  ">Crear Asignatura</button> 
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