@extends('layouts.app')
@section('content')


<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
    <a><i class="icono fas fa-bookmark"></i>  Logros</a>
    </div>
    <div class="card-body">
      <form method="GET" action="{{ route('logros.index') }}">
          
          <div class="row mt-1">
              <div class="col-sm-2">
                  <label for="inputCity">filtrar por grado</label>
                      <select id="inputGrado" class="form-control form-control-sm mt-1" name="grado" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected></option>
                            @foreach ($gradoo as $grado =>$Grado)
                                <option value="{{ $grado }}" {{ old('id_grado') }} > {{$Grado }} </option>
                                {!!$errors->first('id_grado','<span class=error>:message</span>')!!}
                            @endforeach
                      </select>
                  <!-- <input type="text" class="form-control mb-2" value="{{ request('grado')}}" id="prueba" name="grado" placeholder="filtrar por grado"> -->
              </div>
              <div class="col-sm-2">
                  <label for="inputCity">filtrar por periodo</label>
                      <select id="inputPeriodo" class="form-control form-control-sm mt-1" name="periodo" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected></option>
                            @foreach ($periodoo as $periodo =>$Periodo)
                                <option value="{{ $periodo }}" {{ old('id_periodo') }} > {{$Periodo }} </option>
                                {!!$errors->first('id_periodo','<span class=error>:message</span>')!!}
                            @endforeach
                      </select>
                  <!-- <input type="text" class="form-control mb-2" value="{{ request('grado')}}" id="prueba" name="grado" placeholder="filtrar por grado"> -->
              </div>
              <div class="col-sm-2">
                  <label for="inputCity">filtrar por asignatura</label>
                      <select id="inputPeriodo" class="form-control form-control-sm mt-1" name="asignatura"  >
                            <option value="" selected></option>
                            @foreach ($asignaturaa as $asignatura =>$Asignatura)
                                <option value="{{ $asignatura }}" {{ old('id_asignatura') }} > {{$Asignatura }} </option>
                                {!!$errors->first('id_asignatura','<span class=error>:message</span>')!!}
                            @endforeach
                      </select>
                  <!-- <input type="text" class="form-control mb-2" value="{{ request('grado')}}" id="prueba" name="grado" placeholder="filtrar por grado"> -->
              </div>
              <div class="col-sm">
                  <button type="submit" class="btn btn-primary mt-4 ml-0 mr-0 " data-tippy-content="Buscar"><i class="fas fa-search"></i></button>
                  <a href="{{ url('lista/logros') }}"   class="btn btn-light mt-4 ml-0 "data-tippy-content="restablecer"><i class="fas fa-reply"></i></a>
              </div>
              <div class="col-sm">
              <a href="{{ url('lista/logros/create') }}" class="btn btn-primary mt-4 ml-0 mr-0 btn-sm"style="float:right;"><i class="fas fa-plus-circle"></i> Crear logro</a>
              </div>
          </div>
      
      </form>
          <div class="table-responsive">  
            <table class="table table-sm table-hover table-bordered  mt-2">
            <caption>Lista de logros</caption>
            <thead class="thead-light">
                <tr>
                  <th scope="col">Acciones</th>
                  <th scope="col">Logro1</th>
                  <th scope="col">Logro2</th>
                  <th scope="col">Logro3</th>
                  <th scope="col">Logro4</th>
                  <!-- <th scope="col">Logro5</th>
                  <th scope="col">Logro6</th> -->
                  <th scope="col">Asignatura</th>
                  <th scope="col">Periodo</th>
                  <th scope="col">Grado</th>
                  <!-- <th scope="col">Docente</th> -->
                </tr>
            </thead>
              <tbody>
                @forelse ($listaLogros as $listaLogro)
                <tr>
                  <td>
                  <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                      <button class="eliminar btn btn-danger btn-sm mr-3" data-tippy-content="Eliminar" data-toggle="modal" onclick="deleteData({{$listaLogro->id_logro}})" data-target="#delete"
								        ><i class="fas fa-trash-alt"></i> </button>

                        <a class="editar btn btn-info btn-sm" data-tippy-content="Editar" href="{{ route('logros.edit', $listaLogro->id_logro) }} "><i class="fas fa-edit"></i></a>
                    </div>
                  </div>
                  </td>
                  <td>{{ $listaLogro->logro1 }}</td>
                  <td>{{ $listaLogro->logro2 }}</td>
                  <td>{{ $listaLogro->logro3 }}</td>
                  <td>{{ $listaLogro->logro4 }}</td>
                  <!-- <td>{{ $listaLogro->logro5 }}</td>
                  <td>{{ $listaLogro->logro6 }}</td> -->
                  <td>{{optional($listaLogro->asignatura)->asignatura}}</td>
                  <td>{{optional($listaLogro->periodo)   ->periodo}}</td>
                  <td>{{optional($listaLogro->grado)     ->grado}}</td>
                  
                  @empty
					          <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $listaLogros->render() }} {{-- paginacion --}}
          </div>
          {{-- modal delete --}}
			    <div class="modal" id="delete" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <form action="" id="deleteForm" method="POST">
              <div class="modal-content">
                <div class="modal-header" style="background: #FB1C1C" >
                  <h5 class="modal-title">Eliminar Logro</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <div class="modal-body">
                    {!! csrf_field()!!}
                  {!! method_field('DELETE')!!}
                    <p>¿Está seguro de eliminar este logro?</p>
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
                        function deleteData(id_logro)
                        {
                            var id = id_logro;
                            var url = '{{ route("logros.destroy", ":id") }}';
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