@extends('layouts.app')
@section('content')

<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
      <a><i class="icono  fas fa-folder-open"></i> Calificaciones año: {{ Carbon\Carbon::now()->year }}. Periodo transcurrido: {{ \App\Http\Controllers\EvaluarcursoController::calcularPeriodo() }}</a>
    </div>
    <div class="card-body">
          
          <form method="GET" action="{{ route('calificaciones.index') }}">
          
            <div class="row mt-1">
                <div class="col-sm-2">
                    <label for="inputCity">filtrar por curso</label>
                        <select id="inputGrado" class="salon  form-control form-control-sm mt-1" name="curso" required data-parsley-required data-parsley-trigger="keyup" >
                              <option value="" selected></option>
                             
                                  @foreach ($cursoo as $curso =>$Curso)

                                      <option value="{{ $curso }}" {{ old('id_curso') }} > {{$Curso }} </option>
                                      {!!$errors->first('id_curso','<span class=error>:message</span>')!!}

                                  @endforeach
                              
                        </select>
                        <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.salon').select2();
                                $("#mySelect").select2();

                                $(".salon").select2({
                                theme: "classic",							  
                                });
                                

                                });
                            </script>
                   
                </div>
                <div class="col-sm-2">
                    <label for="inputCity">filtrar por periodo</label>
                        <select id="inputPeriodo" class="periodo  form-control form-control-sm mt-1" name="periodo" required data-parsley-required data-parsley-trigger="keyup" >
                              <option value="" selected></option>
                             
                                  @foreach ($periodoo as $periodo =>$Periodo)

                                      <option value="{{ $periodo }}" {{ request('periodo') }} > {{$Periodo }} </option>
                                      {!!$errors->first('id_periodo','<span class=error>:message</span>')!!}

                                  @endforeach
                              
                        </select>
                        <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.periodo').select2();
                                $("#mySelect").select2();

                                $(".periodo").select2({
                                theme: "classic",							  
                                });
                                

                                });
                            </script>
                   
                </div>
                <div class="col-sm-2">
                    <label for="inputCity">filtrar por asignatura</label>
                        <select id="inputAsignatura" class="asignatura  form-control form-control-sm mt-1" name="asignatura" required data-parsley-required data-parsley-trigger="keyup" >
                              <option value="" selected></option>
                             
                                  @foreach ($asignaturaa as $asignatura =>$Asignatura)

                                      <option value="{{ $asignatura }}" {{ request('asignatura') }} > {{$Asignatura }} </option>
                                      {!!$errors->first('id_asignatura','<span class=error>:message</span>')!!}

                                  @endforeach
                              
                        </select>
                        <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.asignatura').select2();
                                $("#mySelect").select2();

                                $(".asignatura").select2({
                                theme: "classic",							  
                                });
                                

                                });
                            </script>
                   
                </div>
                <div class=" col-sm-2">
			              <label for="inlineFormInput">filtrar por alumno</label>
			              <input type="text" class="form-control form-control-sm " value="{{ request('nombre')}}"  name="nombre" placeholder="nombre completo"  >
			          </div>
               
                <div class="col-sm">
                    <button type="submit" class="btn btn-primary mt-3 ml-0 mr-0 " data-tippy-content="Buscar"><i class="fas fa-search"></i></button>
                    <a href="{{ url('calificaciones') }}"   class="btn btn-light mt-3 ml-0 "data-tippy-content="restablecer"><i class="fas fa-reply"></i></a>
                </div>
                <div class="col-sm">
                <a href="#" class="btn btn-danger mt-4 ml-0 mr-2 btn-sm"  data-toggle="modal" data-tippy-content="eliminar notas seleccionadas" id="borrarTodoLoSeleccionado"  data-target="#delete"  style="float:right;" ><i class="fas fa-trash-alt"></i> </a>
                </div>
            </div>
          
          </form>
              
          
          <div class="table-responsive">
               
            <table  class="table table-sm table-hover table-striped  mt-2">
            <caption> Calificaciones</caption>
            <thead >
                <tr>
                  <th scope="col">Acciones</th>
                  
                  <th scope="col">logro1</th>
                  <th scope="col">logro2</th>
                  <th scope="col">logro3</th>
                  <th scope="col">logro4</th>
                  <th scope="col">logro5</th>
                  <th scope="col">logro6</th>
                  <th scope="col">promedio</th>
                  <th scope="col">asignatura</th>
                  <th scope="col">alumno</th>
                  <th scope="col">curso</th>
                  <th scope="col">periodo</th>
                  
                  <th scope="col"><input type="checkbox" class=" ml-1"  data-tippy-content="Seleccionar todo" id="checkAll" ></th>
                  
                
                </tr>
            </thead>
              <tbody>
                @forelse ( $listaCalificaciones->where('id_docente','=', Auth::user()->id_docente) as  $listaCalificacion)
                <tr id="sid{{ $listaCalificacion->id_calificacion }}">
                    <td>
                      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-3" role="group" aria-label="First group">
                            
                        </div>

                        
                        <div class="btn-group " role="group" aria-label="Second group">
                            <button class="editar btn btn-info btn-sm" data-tippy-content="editar"  data-toggle="modal" data-target="#modalEdit" data-minota1="{{ $listaCalificacion->nota1 }}" data-minota2="{{ $listaCalificacion->nota2 }}" data-minota3="{{ $listaCalificacion->nota3 }}" data-minota4="{{ $listaCalificacion->nota4 }}" data-minota5="{{ $listaCalificacion->nota5 }}" data-minota6="{{ $listaCalificacion->nota6 }}" data-idcalificacion="{{ $listaCalificacion->id_calificacion }}" ><i class="fas fa-edit"></i></button>
                        </div>
                        

                        
                       
                        <div class="btn-group ml-3" role="group" aria-label="Third group">
                          <a class="editar btn btn-success btn-sm" data-tippy-content="Boletin" target="_blank" href="{{action('CalificacionesController@downloadPDF', $listaCalificacion->id_calificacion) }}"><i class="far fa-file-pdf"></i></a>
                        </div>
                        
                        
                      </div>
                    </td> 
                    
                    <td>{{ $listaCalificacion->nota1 }} </td>
                    <td>{{ $listaCalificacion->nota2 }} </td>
                    <td>{{ $listaCalificacion->nota3 }} </td>
                    <td>{{ $listaCalificacion->nota4 }} </td>
                    <td>{{ $listaCalificacion->nota5 }} </td>
                    <td>{{ $listaCalificacion->nota6 }} </td>
                    <td>{{ $listaCalificacion->promedio }} </td>
                    <td>{{ optional($listaCalificacion->asignatura)->asignatura }} </td>
                    <td>{{ optional($listaCalificacion->alumno)    ->nombres }} </td>
                    <td>{{ optional($listaCalificacion->curso)     ->salon }} </td>
                    <td>{{ optional($listaCalificacion->periodo)   ->id_periodo }} </td>
                    <!-- <td>{{ optional($listaCalificacion->docente)   ->nombres }} </td> -->
                    <div class="btn-group ml-1" role="group" aria-label="Third group">
                     <td> <input type="checkbox" class="checkBoxClass  ml-1" data-tippy-content="Seleccionar" value="{{ $listaCalificacion->id_calificacion}}"  name="ids"  ></td>
                    </div>
                   
                    
                    @empty
					          <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $listaCalificaciones->render() }} {{-- paginacion --}}
          </div>
          {{-- modal edit --}}
          <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title" id="create">Editar Calificacion  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                          </div>
                          <div class="modal-body">
                                <form method="POST" action="{{ route('calificaciones.update','prueba') }}"  id="form">
                                  {!! method_field('PUT')!!}
                                  <input type="hidden" name="id_calificacion" id="idcalificacion" value="">
                                  @include('calificaciones.form')
                                </form>
                          </div>
                              
                      </div>
                  </div>
                  <script>
                    $('#modalEdit').on('show.bs.modal', function (event) {

                    //console.log("modal abierta");
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var nota1 = button.data('minota1') // Extract info from data-* attributes. data-minota1 sale de button edit 
                    var nota2 = button.data('minota2')
                    var nota3 = button.data('minota3')
                    var nota4 = button.data('minota4')
                    var nota5 = button.data('minota5')
                    var nota6 = button.data('minota6')
                    var idcal = button.data('idcalificacion')
                    
                    var modal = $(this)
                    
                    modal.find('.modal-body #nota1').val(nota1);//#nota1 es el id del input
                    modal.find('.modal-body #nota2').val(nota2);
                    modal.find('.modal-body #nota3').val(nota3);
                    modal.find('.modal-body #nota4').val(nota4);
                    modal.find('.modal-body #nota5').val(nota5);
                    modal.find('.modal-body #nota6').val(nota6);
                    modal.find('.modal-body #idcalificacion').val(idcal);
                    })
                  </script>
          </div>

          {{-- modal delete --}}
          <div class="modal" id="delete" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <form action="" id="deleteForm" method="POST">
              <div class="modal-content">
                <div class="modal-header" style="background: #FB1C1C" >
                  <h5 class="modal-title">Eliminar calificaciones</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <div class="modal-body">
                    {!! csrf_field()!!}
                  {!! method_field('DELETE')!!}
                    <p>¿Está seguro(a) de eliminar las calificaciones seleccionadas?</p>
                    
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
                        //checkbox select all
                        $(function(e){
                            $("#checkAll").click(function(){
                              $(".checkBoxClass").prop('checked', $(this).prop('checked'));
                            });

                            $("#borrarTodoLoSeleccionado").click(function(e){
                              e.preventDefault();
                              var allids = [];
                              $("input:checkbox[name=ids]:checked").each(function(){
                                allids.push($(this).val());
                              });
                                
                              $.ajax({
                                  url:"{{ route("calificaciones.destroy", ":id") }}",
                                  type:"DELETE",
                                  data:{
                                    _token:$("input[name=_token]").val(),
                                    ids:allids
                                  },
                                  success:function(response){
                                    $.each(allids,function(key,val){
                                      $("#sid"+val).remove();
                                      
                                    })
                                  }

                                  
                              });

                            })

                        });
                        function formSubmit()
                          {
                            
                            $(location.reload());

                          }

						       </script>
			    </div>  
          
           <script>
              
           </script>      
			    

           
    </div>
  </div>
</div>

@endsection