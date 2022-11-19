@extends('layouts.app')
@section('content')

<div class="container-angosto">
  <div class="card  mr-3 ml-0 mt-3">
    <div class="card-header ">
      <a><i class="fas fa-history"></i> Periodos Académicos</a>
    </div>
    <div class="card-body">
          
          
              
          
          <div class="table-responsive">  
            <table class="table table-sm table-hover table-striped  mt-2">
            <caption> Periodos Académicos</caption>
            <thead >
                <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Periodo</th>
                <th scope="col">Fecha de inicio</th>
                <th scope="col">Fecha fin</th>
                
                </tr>
            </thead>
              <tbody>
                @forelse ($periodos as $periodo)
                <tr>
                    <td>
                      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <a class="editar btn btn-info btn-sm" data-tippy-content="editar" href="{{ route('periodo.edit', $periodo->id_periodo) }} "><i class="fas fa-edit"></i></a>
                        </div>
                      </div>
                    </td> 
                   
                    <td>{{ $periodo->periodo }} </td>
                    <td>{{ $periodo->fechainicio }} </td>
                    <td>{{ $periodo->fechafin }} </td>
                   
                    
                    @empty
					          <div class="alert alert-info">No se encontraron resultados en nuestros registros</div>
                </tr>
                @endforelse
              </tbody>
            </table>
           
          </div>

         
				           
			    

           
    </div>
  </div>
</div>

@endsection