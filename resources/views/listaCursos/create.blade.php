@extends('layouts.app')
@section('content')



<div class="container-global">
  <div class="card  mr-3 ml-0 mt-3" >
    <div class="card-header text-center "><a><i class="fas fa-building"></i> Crear Curso</a></div>
     <div class="card-body ">
      <div class="container-cssform">
        <form method="POST" action="{{ route('cursos.store') }}" id="form" >
        {!!csrf_field() !!}
        <!-- <h6 class="card-title text-center"><p class="card-text"><small class="text-muted ">Todos los campos son obligatorios</small></p></h6> -->
            <div class="row justify-content-center ">
              <div class=" col-sm-4 mt-4">   
                <div class="form-group">
                    <label for="label inputEmail4"> curso</label>
                    <input type="text" class="form-control form-control-sm" id="inputCurso" name="salon" value="{{ old('salon') }}" required data-parsley-type="digits" data-parsley-length="[0, 4]" data-parsley-min="101" data-parsley-max="1104" data-parsley-trigger="keyup"  />
                    {!!$errors->first('salon','<span class=error>:message</span>')!!}
                </div>
                
                
                    <button type="submit" class="btn btn-success btn-sm btn-block  ">Crear Curso</button> 
                

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