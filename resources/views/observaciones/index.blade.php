@extends('layouts.app')
@section('content')

<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
      <a><i class="fas fa-building"></i> Observaciones de las calificaciones</a>
    </div>
    <div class="card-body">
          
          <form method="GET" action="{{ route('observaciones.index') }}">
          
              <div class="row mt-1">
                  <div class="col-sm-2">
                      <input type="text" class="form-control form-control-sm mb-2" value="{{ request('alumno')}}" id="alumno" name="alumno" placeholder="Filtrar por alumno" required >
                  </div>
                  <div class="col-sm-2">
                      <input type="text" class="form-control form-control-sm mb-2" value="{{ request('created_at')}}" id="año" name="año" placeholder="Filtrar por año" required >
                  </div>
                  <div class="col-sm">
                      <button type="submit" class="btn btn-primary btn-sm mt-0 ml-0 mr-0 " data-tippy-content="Buscar"><i class="fas fa-search"></i></button>
                      <a href="{{ url('lista/observaciones') }}"   class="btn btn-light btn-sm mt-0 ml-0 "data-tippy-content="restablecer"><i class="fas fa-reply"></i></a>
                  </div>
                  <div class="col-sm">
                      <a href="#" class="btn btn-danger mt-4 ml-0 mr-2 btn-sm" id="disableButton" data-toggle="modal" data-tippy-content="eliminar observaciones seleccionadas"  data-target="#delete"  style="float:right;" ><i class="fas fa-trash-alt"></i> </a>
                  </div>
                 
              </div>
          
          </form>
              
          
          <div class="table-responsive">  
            <table class="table table-sm table-hover table-striped  mt-2">
            <caption> Observaciones</caption>
            <thead >
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Observaciones</th>
                  <th scope="col">Asignatura</th>
                  <th scope="col">Alumno</th>
                
                  
                  <th scope="col">año</th>
                  <th scope="col"><input type="checkbox" class=" ml-1"  data-tippy-content="Seleccionar todo" id="checkAll" ></th>
                </tr>
            </thead>
              <tbody>
                @forelse ($listaObservaciones as $observacion)
                <tr id="sid{{ $observacion->id_observacion }}" >
                    <td>
                      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                 
                      
                      </div>
                    </td> 
                   
                    <td>{{ $observacion->observaciones }} </td>
                    <td>{{ optional($observacion->asignatura)->asignatura }} </td>
                    <td>{{ optional($observacion->alumno)->nombres }} </td>
                   
                    
                    <td>{{ $observacion->created_at->year }} </td>
                    <div class="btn-group ml-1" role="group" aria-label="Third group">
                     <td> <input type="checkbox" class="checkBoxClass  ml-1" data-tippy-content="Seleccionar" value="{{ $observacion->id_observacion }}"  name="ids"  ></td>
                    </div>
                    @empty
					          <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $listaObservaciones->render() }} {{-- paginacion --}}
          </div>

          
          {{-- modal delete --}}
          <div class="modal" id="delete" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <form action="" id="deleteForm" method="POST">
              <div class="modal-content">
                <div class="modal-header" style="background: #FB1C1C" >
                  <h5 class="modal-title">Eliminar calificaciones y sus observaciones</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <div class="modal-body">
                    {!! csrf_field()!!}
                  {!! method_field('DELETE')!!}
                    <p>Cuidado, esta accion solo se recomienda realizarla antes del inicio del año lectivo, ya sea a finales de diciembre o comienzos de enero o según calendario. </p>
                    <p>Los promedios se mantendran intactos, a menos que vaya a la seccion de promedios y los elimine por aparte.</p>
                    <p>Esta accion borrará todas las calificaciones del año y años anteriores al igual que las observaciones y los boletines.</p>
                    <p>Se eliminará por tandas seleccionadas, asi que tendra que repetir la accion hasta vaciar totalmente la tabla.</p>
                    <p>¿Está seguro(a) de Eliminar las Observaciones seleccionadas y sus Calificaciones?</p>
                   
                                        
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" id="borrarTodoLoSeleccionado1" data-dismiss="modal">Si</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  </div>
              </div>
            </form>
            </div>
				           
                    <script type="text/javascript">
                        // disable button delete using jquery--------------------------
                        $('#disableButton').prop("disabled", true);
                        $('input:checkbox').click(function() {
                        if ($(this).is(':checked')) {
                        $('#disableButton').prop("disabled", false);
                        } else {
                        if ($('.checks').filter(':checked').length < 1){
                        $('#disableButton').attr('disabled',true);}
                        }
                        });
                        //--------------------------------------------------------------

                         //checkbox select all using ajax
                         $(function(e){
                                $("#checkAll").click(function(){
                                  $(".checkBoxClass").prop('checked', $(this).prop('checked'));
                                });

                                $("#borrarTodoLoSeleccionado1").click(function(e){
                                  e.preventDefault();
                                  var allids = [];
                                  $("input:checkbox[name=ids]:checked").each(function(){
                                    allids.push($(this).val());
                                  });
                                    
                                  $.ajax({
                                      url:"{{ route("observaciones.destroy", ":id") }}",
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
                                  //esta funcion detiene la ejecucion ajax y recarga la vista
                                  $(document).ajaxStop(function(){
                                     window.location.reload();
                                  });

                                })

                            });

						        </script>
			    </div> 



			    

           
    </div>
  </div>
</div>

@endsection