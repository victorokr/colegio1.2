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

<div class="container-global">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
    <a><i class="icono fas fa-user-cog"></i> Editar Acudientes</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('acudientes.update', $listaAcudientes->id_responsable) }}"  id="form">
            {!! method_field('PUT')!!}
            @include('listaAcudientes.form')
           
        </form> 
    </div>
  </div>
</div>

@endsection