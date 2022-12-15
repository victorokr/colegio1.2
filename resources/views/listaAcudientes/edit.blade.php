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
    <div class="card-header text-center"><a><i class="icono fas fa-user-cog"></i> Editar Acudiente</a></div>
    <div class="card-body">
      <div class="container-cssform">
        <form method="POST" action="{{ route('acudientes.update', $listaAcudientes->id_responsable) }}"  id="form">
            {!! method_field('PUT')!!}
            {!!csrf_field() !!}
                <div class="row justify-content-center">
                  <div class=" col-md-6 col-sm-6 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-header text-center "> <small class="text-muted asterisko ">Obligatorio</small></div>
                        <div class="card-body"> 
                           @include('listaAcudientes.form')
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