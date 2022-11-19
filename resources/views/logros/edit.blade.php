@extends('layouts.app')
@section('content')

<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header text-center"><a><i class="icono fas fa-user-cog"></i> Editar Logro</a>
    </div>
      <div class="card-body">
        <div class="container-cssform">
          <form method="POST" action="{{ route('logros.update', $listaLogros->id_logro) }}"  id="form">
              {!! method_field('PUT')!!}
              @include('logros.form')
              
          </form> 
        </div>
      </div>
  </div>
</div>

@endsection