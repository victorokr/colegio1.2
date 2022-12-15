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
    <a><i class="icono  fas fa-folder-open"></i> Matriculas</a>
    </div>
    <div class="card-body">
          
          <form method="GET" action="{{ route('matriculas.index') }}">
          
              <div class="row mt-1">
                  <div class="col-sm-2">
                      <input type="text" class="form-control form-control-sm mb-2" value="{{ request('documento')}}" id="prueba" name="documento" placeholder="busca por documento">
                  </div>
                  <div class="col-sm-2">
                      <input type="text" class="form-control form-control-sm mb-2" value="{{ request('grado')}}" id="prueba" name="grado" placeholder="busca por grado">
                  </div>
                  <div class="col-sm-2">
                  <input type="text" class="form-control form-control-sm mb-2" value="{{ request('salon')}}" id="prueba" name="salon" placeholder="busca por curso">
                  </div>
                  <div class="col-sm-2">
                  <input type="text" class="form-control form-control-sm mb-2" value="{{ request('id_añoElectivo')}}" id="prueba" name="añoElectivo" placeholder="busca por año">
                  </div>
                  <div class="col-sm">
                      <button type="submit" class="btn btn-primary btn-sm mt-0 ml-0 mr-0 mb-2 " data-tippy-content="Buscar"><i class="fas fa-search"></i></button>
                      <a href="{{ url('lista/matriculas') }}"   class="btn btn-light btn-sm mt-0 ml-0 mb-2 "data-tippy-content="restablecer"><i class="fas fa-reply"></i></a>
                  </div>
                  <div class="col-sm">
                  <a href="{{ url('lista/alumnos') }}" class="btn btn-primary mt-0 ml-0 mr-0 btn-sm"style="float:right;"><i class="fas fa-plus-circle"></i> Lista alumnos</a>
                  </div>
              </div>
          
          </form>
              
          
          <div class="table-responsive">  
            <table class="table table-sm table-hover table-striped  mt-2">
            <caption> Matriculas</caption>
            <thead >
                <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Documento</th>
                <th scope="col">Grado</th>
                <th scope="col">Curso</th>
                <th scope="col">Estado de la Matricula</th>
                <th scope="col">año Matricula Vigente</th>
                <th scope="col">Tipo de estudiante</th>
                
                </tr>
            </thead>
              <tbody>
                @forelse ($listaMatriculas as $listaMatricula)
                <tr>
                    <td>
                      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                            <button class="eliminar btn btn-danger btn-sm mr-3" data-tippy-content="Eliminar" data-toggle="modal" onclick="deleteData({{$listaMatricula->id_matricula}})" data-target="#delete"
								            ><i class="fas fa-trash-alt"></i> </button>

                            <a class="editar btn btn-info btn-sm" data-tippy-content="matricular" href="{{ route('matriculas.edit', $listaMatricula->id_matricula) }} "><i class="fas fa-edit"></i></a>
                        </div>
                      </div>
                    </td> 
                   
                    <td>{{ optional($listaMatricula->alumno)->nombres }} </td>
                    <td>{{ optional($listaMatricula->alumno)->documento }}
                    <td>{{ optional($listaMatricula->grado)->grado }}</td>
                    <td>{{ optional($listaMatricula->curso)->salon }}</td>
                    <td>{{ optional($listaMatricula->estado)->estado }}</td>
                    <td>{{ optional($listaMatricula->añoElectivo)->añoElectivo }}</td>
                    <td>{{ optional($listaMatricula-> tipoDeAspirante)->tipoDeAspirante }}</td>
                    @empty
					          <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $listaMatriculas->render() }} {{-- paginacion --}}
          </div>
          {{-- modal delete --}}
			    <div class="modal" id="delete" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <form action="" id="deleteForm" method="POST">
              <div class="modal-content">
                <div class="modal-header" style="background: #FB1C1C" >
                  <h5 class="modal-title">Eliminar Matricula</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <div class="modal-body">
                    {!! csrf_field()!!}
                  {!! method_field('DELETE')!!}
                    <p>¿Está seguro de eliminar a este Alumno y su matricula?</p>
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
                        function deleteData(id_matricula)
                        {
                            var id = id_matricula;
                            var url = '{{ route("matriculas.destroy", ":id") }}';
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