@extends('layouts.app')
@section('content')


<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
    <a><i class="icono  fas fa-folder-open"></i> Evaluar {{ Request ('Asignatura') }} curso {{ Request ('cursoo') }} </a>
    </div>
    <div class="card-body">
          
          <form method="GET" action="{{ route('evaluar.index') }}">
          
              <div class="row mt-1">
                  
                  <div class="col-sm-2">
                  <input type="text" class="form-control form-control-sm mb-2"  id="prueba" name="" placeholder="periodo {{ \App\Http\Controllers\EvaluarcursoController::calcularPeriodo() }} " disabled >
                  </div>
                  <div class="col-sm">
                     
                  </div>
                  <div class="col-sm">
                 
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
                <th scope="col">Curso</th>
                </tr>
            </thead>
              <tbody>
                @forelse ($listaCursos as $listaCurso)
                <tr>
                    <td>
                      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                        </div>

                        
                        
                        
                        
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                            <a class="btn btn-primary btn-sm pull-right" type="submit" data-tippy-content="Calificar Alumno"  onclick="insertarId({{$listaCurso->id_alumno}})" data-grado="{{ $listaCurso->id_grado }}" data-toggle="modal" data-target="#create" 
                            href="#"><i class="fas fa-edit"></i></a>    
                        </div>
                        
                      </div>
                    </td> 
                   
                            <td>{{ optional($listaCurso->alumno)->nombres }}</td>
                            
                            <td>{{ optional($listaCurso->curso)->salon }}</td>
                            
                            <!-- <td> <input type="hidden"  value="{{ Crypt::encrypt ($listaCurso->id_grado)}}"  name="id_grado"  ></td> -->
                            
                            <!-- <td>{{ optional($listaCurso->alumno)->id_alumno }}</td> -->
                          
                            <!-- <td>{{ Request ('idAsignatura') }}</td> -->
                        
                    @empty
					          <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>

                </tr>
                @endforelse
              </tbody>
            </table>
            
            
          </div>
           
          

              <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title" id="create">Calificar Alumno  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                          </div>
                          <div class="modal-body">
                                <form method="POST" action="{{ route('evaluar.store') }}"  id="form">
                                
                                  @include('evaluarCurso.form')
                                </form>
                          </div>
                              
                      </div>
                  </div>
                  <script>
                    $('#create').on('show.bs.modal', function (event) {

                    //console.log("modal abierta");
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var gradoo = button.data('grado') // Extract info from data-* attributes. data-grado sale de button create 
                    
                    
                    var modal = $(this)
                    
                    modal.find('.modal-body #idGrado').val(gradoo);//#idGrado es el id del input
                    
                    })
                  </script>
              </div>
          





      </div>
  </div>
</div>

@endsection