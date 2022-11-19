@extends('layouts.app')
@section('content')



<div class="container-global">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header text-center">
    <a><i class="icono fas fa-history"></i> Establecer periodo {{  $periodo->id_periodo }}</a>
    </div>
    <div class="card-body">
      <div class="container-angosto">
        <form method="POST" action="{{ route('periodo.update', $periodo->id_periodo) }}"  id="form">
            {!! method_field('PUT')!!}
            @include('periodo.form')
           
        </form>
      </div>   
    </div>
  </div>
</div>

@endsection