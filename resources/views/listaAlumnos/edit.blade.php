@extends('layouts.app')
@section('content')



<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header text-center "><a><i class="icono fas fa-user-cog"></i> Editar Alumno</a></div>
    <div class="card-body">
      <div class="container-cssform">
        <form method="POST" action="{{ route('alumnos.update', $listaAlumnos->id_alumno) }}"  id="form">
            {!! method_field('PUT')!!}
            {!!csrf_field() !!}
                <div class="row justify-content-center">
                  <div class=" col-md-6 col-sm-6 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-header text-center "> <small class="text-muted asterisko ">Obligatorio</small></div>
                        <div class="card-body"> 
                           @include('listaAlumnos.form')
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