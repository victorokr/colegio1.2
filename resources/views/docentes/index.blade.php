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
<div class="container-global">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
    <a><i class="icono fas fa-user-tie"></i>  Docentes</a>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('docente.index') }}">
          
              <div class="row mt-1">
                  <div class="col-sm">
                      <input type="text" class="form-control mb-2" value="{{ request('nombres')}}" id="prueba" name="nombres" placeholder="Ingrese Nombres o apellidos">
                  </div>
                  <div class="col-sm">
                      <button type="submit" class="btn btn-primary mt-0 ml-0 mr-0 " title="Buscar"><i class="fas fa-search"></i></button>
                      <a href="{{ url('docente') }}"   class="btn btn-light mt-0 ml-0 "title="restablecer"><i class="fas fa-reply"></i></a>
                  </div>
                  <div class="col-sm">
                  <a href="{{ url('docente/create') }}" class="btn btn-primary mt-0 ml-0 mr-0 btn-sm"style="float:right;"><i class="fas fa-plus-circle"></i> Agregar Docente</a>
                  </div>
              </div>
          
        </form>
          <div class="table-responsive">  
            <table class="table table-sm table-hover  mt-2">
            <caption>Lista de Docentes</caption>
            <thead class="thead-light">
                <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Nombres</th>
                <!-- <th scope="col">Apellidos</th> -->
                <th scope="col">Documento</th>
                <th scope="col">Telefono</th>
                <th scope="col">Direccion</th>
                <th scope="col">Email</th>
                <th scope="col">LugarDeResidencia</th>
                <th scope="col">Escalafon</th>
                <th scope="col">Perfil</th>
                <th scope="col">Nivel</th>
                <th scope="col">Roles</th>
                <th scope="col">Estudios</th>
                </tr>
            </thead>
              <tbody>
                @forelse ($listaDocentes as $listaDocente)
                <tr>
                  <td>
                  <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                      <button class="eliminar btn btn-danger btn-sm mr-3"data-toggle="modal" onclick="deleteData({{$listaDocente->id_docente}})" data-target="#delete"
								        title="Eliminar"><i class="fas fa-trash-alt"></i> </button>

                        <a class="editar btn btn-info btn-sm" title="Editar" href="{{ route('docente.edit', $listaDocente->id_docente) }} "><i class="fas fa-edit"></i></a>
                    </div>
                  </div>
                  </td>
                  <td>{{ $listaDocente->nombres }}</td>
                  <!-- <td>{{ $listaDocente->apellidos }}</td> -->
                  <td>{{ $listaDocente->documento }}</td>
                  <td>{{ $listaDocente->telefono }}</td>
                  <td>{{ $listaDocente->direccion }}</td>
                  <td>{{ $listaDocente->email }}</td>
                  <td>{{ $listaDocente->lugarDeResidencia }}</td>
                  <td>{{ optional($listaDocente->gradoEscalafon)->escalafon }}</td>
                  <td>{{ optional($listaDocente->perfil)->perfil }}</td>
                  <td>{{ optional($listaDocente->nivel)->nivel }}</td>
                  <td>{{ $listaDocente->roles->pluck('display_name')->implode(' - ') }}</td>
                  <td>{{ $listaDocente->areaDeEstudio->pluck('nombre')->implode(' - ') }}</td>
                  @empty
					          <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $listaDocentes->render() }} {{-- paginacion --}}
          </div>
          {{-- modal delete --}}
			    <div class="modal" id="delete" tabindex="-1" role="dialog">
				  <div class="modal-dialog" role="document">
				   <form action="" id="deleteForm" method="POST">
				    <div class="modal-content">
				      <div class="modal-header" style="background: #FB1C1C" >
				        <h5 class="modal-title">Eliminar Docente</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
					      <div class="modal-body">
					      	{!! csrf_field()!!}
						    {!! method_field('DELETE')!!}
					        <p>¿Está seguro de eliminar Docente?</p>
					        {{-- <input type="hidden" name="id_materialBiblioteca" value=""> --}}
					      </div>
					      <div class="modal-footer">
					      	<button type="submit" class="btn btn-danger" data-dismiss="modal"
					      	 onclick="formSubmit()">Si</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					      </div>
				    </div>
				   </form>
				  </div>
				           <script type="text/javascript">
                        function deleteData(id_docente)
                        {
                            var id = id_docente;
                            var url = '{{ route("docente.destroy", ":id") }}';
                            url = url.replace(':id', id);
                            $("#deleteForm").attr('action', url);
                        }

                        function formSubmit()
                        {
                            $("#deleteForm").submit();
                        }
						       </script>
			    </div> 
      </div>
  </div>
</div>

@endsection