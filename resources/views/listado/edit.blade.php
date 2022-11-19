@extends('layouts.app')
@section('content')



<div class="container-global">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header text-center">
    <a><i class="icono fas fa-user-cog"></i> Editar listado</a>
    </div>
    <div class="card-body">
      <div class="container-cssform">
        <form method="POST" action="{{ route('listado.update', $listado->id_listado) }}"  id="form">
            {!! method_field('PUT')!!}
            @include('listado.form')
           
        </form>
      </div>   
    </div>
  </div>
</div>

@endsection