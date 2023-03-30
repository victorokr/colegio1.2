@extends('layouts.app')
@section('content')

<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
      <a><i class="fas fa-building"></i> Cursos</a>
    </div>
    <div class="card-body">
          
          <form method="GET" action="{{ route('cursos.index') }}">
          
              <div class="row mt-1">
                  <div class="col-sm-2">
                      <input type="text" class="form-control form-control-sm mb-2" value="{{ request('salon')}}" id="prueba" name="salon" placeholder="Filtrar por salon">
                  </div>
                  <div class="col-sm">
                      <button type="submit" class="btn btn-primary btn-sm mt-0 ml-0 mr-0 " data-tippy-content="Buscar"><i class="fas fa-search"></i></button>
                      <a href="{{ url('lista/cursos') }}"   class="btn btn-light btn-sm mt-0 ml-0 "data-tippy-content="restablecer"><i class="fas fa-reply"></i></a>
                  </div>
                  <div class="col-sm">
                  <a href="{{ url('lista/cursos/create') }}" class="btn btn-primary mt-0 ml-0 mr-0 btn-sm"style="float:right;"><i class="fas fa-plus-circle"></i> Crear Curso</a>
                  </div>
              </div>
          
          </form>
              
          
          <div class="table-responsive">  
            <table class="table table-sm table-hover table-striped  mt-2">
            <caption> Cursos</caption>
            <thead >
                <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Cursos</th>
                <th scope="col">Sede</th>
                <th scope="col">Jornada</th>
                
                
                </tr>
            </thead>
              <tbody>
                @forelse ($listaCursos as $listaCurso)
                <tr>
                    <td>
                      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-3" role="group" aria-label="First group">
                            <button class="eliminar btn btn-danger btn-sm"  data-tippy-content="eliminar" data-toggle="modal" onclick="deleteData({{$listaCurso->id_curso}})" data-target="#delete"><i class="fas fa-trash-alt"></i></button>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                            <a class="editar btn btn-info btn-sm" data-tippy-content="editar" href="{{ route('cursos.edit', $listaCurso->id_curso) }} "><i class="fas fa-edit"></i></a>
                        </div>
                      </div>
                    </td> 
                   
                    <td>{{ $listaCurso->salon }} </td>
                    <td>{{ optional($listaCurso->sede)->sede }} </td>
                    <td>{{ optional($listaCurso->jornada)->jornada }} </td>
                    
                    @empty
					          <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $listaCursos->render() }} {{-- paginacion --}}
          </div>

          {{-- modal delete --}}
			    <div class="modal" id="delete" tabindex="-1" role="dialog">
				   <div class="modal-dialog" role="document">
				    <form action="" id="deleteForm" method="POST">
				     <div class="modal-content">
				      <div class="modal-header" style="background: #FB1C1C" >
				        <h5 class="modal-title">Eliminar Curso</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
					      <div class="modal-body">
					      	{!! csrf_field()!!}
						    {!! method_field('DELETE')!!}
					        <p>¿Está seguro de eliminar este curso?</p>
					        {{-- <input type="hidden" name="id_materialBiblioteca" value=""> --}}
					      </div>
					      <div class="modal-footer">
					      	<button type="submit" class="btn btn-danger" data-dismiss="modal"
					      	 onclick="formSubmit()">Si</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					      </div>
				    
				    </form>
           </div>
				  </div>
				           <script type="text/javascript">
                        function deleteData(id_curso)
                        {
                            var id = id_curso;
                            var url = '{{ route("cursos.destroy", ":id") }}';
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

@endsection