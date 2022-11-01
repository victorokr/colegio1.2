@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
  	<div class="col-auto">
      @if (session()->has('infoUpdate'))
        <div class="alert alert-primary mt-1 text-center" style="width: 900px" id="alerta" >
          <strong>Aviso: </strong>{{ session('infoUpdate') }}
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
    <div class="card-header text-center"><a><i class="icono fas fa-user-cog"></i> Editar Docente</a>
    </div>
      <div class="card-body">
        <div class="container-cssform">
          <form method="POST" action="{{ route('docente.update', $listaDocentes->id_docente) }}"  id="form">
              {!! method_field('PUT')!!}
              @include('docentes.form')
              
          </form> 
        </div>
      </div>
  </div>
</div>

@endsection