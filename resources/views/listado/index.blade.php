@extends('layouts.app')
@section('content')

<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
      <a><i class="icono  fas fa-folder-open"></i> Asignaturas a Evaluar</a>
    </div>
    <div class="card-body">
          
          <form method="GET" action="{{ route('listado.index') }}">
          
            <div class="row mt-1">
                <div class="col-sm-2">
                    <label for="inputCity">filtrar por salon</label>
                        <select id="inputGrado" class="form-control form-control-sm mt-1" name="salon" required data-parsley-required data-parsley-trigger="keyup" >
                              <option value="" selected></option>
                              @foreach ($cursoo as $curso =>$Curso)
                                  <option value="{{ $curso }}" {{ old('id_curso') }} > {{$Curso }} </option>
                                  {!!$errors->first('id_curso','<span class=error>:message</span>')!!}
                              @endforeach
                        </select>
                   
                </div>
               
                <div class="col-sm">
                    <button type="submit" class="btn btn-primary mt-4 ml-0 mr-0 " data-tippy-content="Buscar"><i class="fas fa-search"></i></button>
                    <a href="{{ url('listado') }}"   class="btn btn-light mt-4 ml-0 "data-tippy-content="restablecer"><i class="fas fa-reply"></i></a>
                </div>
                <div class="col-sm">
                <a href="{{ url('listado/create') }}" class="btn btn-primary mt-4 ml-0 mr-0 btn-sm" data-tippy-content="agregue una asignatura y un salon a un docente" style="float:right;"><i class="fas fa-plus-circle"></i> Agregar</a>
                </div>
            </div>
          
          </form>
              
          
          <div class="table-responsive">  
            <table class="table table-sm table-hover table-striped  mt-2">
            <caption> Listado</caption>
            <thead >
                <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Asignatura</th>
                <th scope="col">Docente</th>
                <th scope="col">Salon</th>
                
                </tr>
            </thead>
              <tbody>
                @forelse ($listado as $listadoo)
                <tr>
                    <td>
                      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-3" role="group" aria-label="First group">
                            
                        </div>

                        @if (auth()->user()->hasRoles(['Administrador']))
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                            <button class="eliminar btn btn-danger btn-sm mr-3" data-tippy-content="Eliminar" data-toggle="modal" onclick="deleteData({{$listadoo->id_listado}})" data-target="#delete"
                            ><i class="fas fa-trash-alt"></i> </button>

                            <a class="editar btn btn-info btn-sm" data-tippy-content="editar" href="{{ route('listado.edit', $listadoo->id_listado) }} "><i class="fas fa-edit"></i></a>
                        </div>
                        @endif

                        @if (auth()->user()->hasRoles(['Empleado']))
                        <form method="GET" action="{{ route('evaluar.index') }}">
                        <div class="btn-group ml-3" role="group" aria-label="Third group">
                        

                              



                              <a class="editar btn btn-success btn-sm" type="submit" data-tippy-content="Evaluar"
                                href="{{
                                  URL::signedRoute (
                                    'evaluar.index',
                                    array (
                                    'idAsignatura' => ($listadoo->asignatura)->id_asignatura,
                                    'Asignatura' => ($listadoo->asignatura)->asignatura,
                                    'idCurso' => ($listadoo->curso)->id_curso,
                                    'docentee' => ($listadoo->docente)->id_docente,
                                    'cursoo' => ($listadoo->curso)->salon,

                                    
                                    )
                                  )
                                  }}">
                                  
                                  
                                
                                <i class="fas fa-edit"></i></a> 




                                
                        </div>
                        </form>
                        @endif
                      </div>
                    </td> 
                   
                    <td>{{ optional($listadoo->asignatura)->asignatura }} </td>
                    <td>{{ optional($listadoo->docente)   ->nombres }} </td>
                    <td>{{ optional($listadoo->curso)     ->salon }} </td>
                   
                    
                    @empty
					          <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $listado->render() }} {{-- paginacion --}}
          </div>
          {{-- modal delete --}}
          <div class="modal" id="delete" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <form action="" id="deleteForm" method="POST">
              <div class="modal-content">
                <div class="modal-header" style="background: #FB1C1C" >
                  <h5 class="modal-title">Eliminar Listado</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <div class="modal-body">
                    {!! csrf_field()!!}
                  {!! method_field('DELETE')!!}
                    <p>¿Está seguro de eliminar este listado?</p>
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
                        function deleteData(id_listado)
                        {
                            var id = id_listado;
                            var url = '{{ route("listado.destroy", ":id") }}';
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