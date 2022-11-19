@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
  	<div class="col-auto">
      @if (session()->has('infoCreate'))
		    <div class="alert alert-primary mt-1 text-center" style="width: 900px" id="alerta" >
          <strong>Aviso: </strong>{{ session('infoCreate') }}
          <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
            <span arial-hidden="true"> &times; </span>
          </button>
	      </div>
		  @endif
		  @if (session()->has('infoDelete'))
		    <div class="alert alert-primary mt-1 text-center" style="width: 900px" id="alerta" >
          <strong>Aviso: </strong>{{ session('infoDelete') }}
          <button type="button" class="close" data-dismiss="alert" arial-label="cerrar" >
            <span arial-hidden="true"> &times; </span>
          </button>
	      </div>
		  @endif
	  </div>	
  </div>
</div>
<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
    <a><i class="icono  fas fa-folder-open"></i> Mis Matriculas</a>
    </div>
    <div class="card-body">
          <div class="row mt-1">
              
                  <div class="col-sm">
                     <a href="{{ url('crear/alumnosmatricula/create') }}" class="btn btn-primary mt-0 ml-0 mr-0 btn-sm"style="float:right;"><i class="fas fa-plus-circle"></i> Prematricular estudiante</a>
                  </div>
              
          </div>
          <div class="table-responsive">  
            <table class="table table-sm table-hover table-striped  mt-2">
            <caption> Matriculas</caption>
            <thead >
                <tr>
                
                <th scope="col">Estudiante</th>
                <th scope="col">Estado de la Matricula</th>
                <th scope="col">Año Electivo</th>
                <th scope="col">Tipo de aspirante</th>
                
                </tr>
            </thead>
              <tbody>
                @foreach ($listaMatriculas as $listaMatricula)
                <tr> 
                   
                    <td>{{ optional($listaMatricula->alumno)->nombres }} {{ optional($listaMatricula->alumno)->apellidos }}</td>
                    <td>{{ optional($listaMatricula->estado)->estado }}</td>
                    <td>{{ optional($listaMatricula->añoElectivo)->añoElectivo }}</td>
                    <td>{{ optional($listaMatricula-> tipoDeAspirante)->tipoDeAspirante }}</td>
                  
                </tr>
                @endforeach
              </tbody>
            </table>
            
          </div>
           
      </div>
  </div>
</div>

@endsection