        {!!csrf_field() !!}
        <div class="row justify-content-center ">
          <div class=" col-sm-4 mt-4">

                <!-- <div class="form-group ">
                        <label for="res">Responsable acudiente</label>
                            <select  class="res js-states form-control"   name="id_responsable"required data-parsley-required data-parsley-trigger="keyup">
                            
                            @foreach ($responsablee as $responsable =>$Responsable)    
                                <option value="{{ $responsable  }}" {{ old('id_responsable',$listaMatriculas->id_responsable)== $responsable  ? 'selected':'' }} >{{$Responsable}} </option>
                            @endforeach
                            </select>
                            <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.res').select2();
                                $("#mySelect").select2();

                                $(".res").select2({
                                maximumSelectionLength: 1,
                                theme: "classic"							  
                                });
                                

                                });
                            </script>
                       
                </div> -->
                <!-- <div class="form-group ">
                        <label for="alum">Alumno</label>
                            <select id="mySelect" class="alum js-states form-control"   name="id_alumno"required data-parsley-required data-parsley-trigger="keyup">
                            
                            @foreach ($alumnoo as $alumno =>$Alumno)    
                                <option value="{{ $alumno  }}" {{ old('id_alumno',$listaMatriculas->id_alumno)== $alumno  ? 'selected':'' }} >{{$Alumno}} </option>
                            @endforeach
                            </select>
                            <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.alum').select2();
                                $("#mySelect").select2();

                                $(".alum").select2({
                                maximumSelectionLength: 1,
                                theme: "classic"							  
                                });
                                

                                });
                            </script>
                       
                </div> -->
                <div class="form-group ">
                    <label for="inputCity">Grado al que se matricula</label>
                        <select id="inputGrado" class="estadoBloqueado form-control form-control-sm" name="id_grado" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($gradoo as $grado =>$Grado)
                                <option value="{{ $grado }}" {{ old('id_grado', $listaMatriculas->id_grado)== $grado ? 'selected':'' }} > {{$Grado }} </option>
                                {!!$errors->first('id_grado','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.estadoBloqueado').select2();
                                $("#mySelect").select2();

                                $(".estadoBloqueado").select2({
                                
                                theme: "classic"							  
                                });
                                

                                });
                            </script>     
                </div>
                <div class="form-group ">
                    <label for="inputCity">Asignar Curso</label>
                        <select id="inputCurso" class="estadoBloqueado form-control form-control-sm" name="id_curso" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($cursoo as $curso =>$Curso)
                                <option value="{{ $curso }}" {{ old('id_curso', $listaMatriculas->id_curso)== $curso ? 'selected':'' }} > {{$Curso }} </option>
                                {!!$errors->first('id_curso','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.estadoBloqueado').select2();
                                $("#mySelect").select2();

                                $(".estadoBloqueado").select2({
                                
                                theme: "classic"							  
                                });
                                

                                });
                            </script>     
                </div>
                <div class="form-group ">
                        <label for="inputPerfil">Año electivo</label>
                        <select id="inputPerfil" class="form-control form-control-sm" name="id_añoElectivo"required data-parsley-required data-parsley-trigger="keyup">
                        <option value="" selected>Seleccionar...</option>
                            @foreach ($añoElectivoo as $añoElectivo => $Año)
                                <option value="{{ $añoElectivo }}" {{ old('id_añoElectivo', $listaMatriculas->id_añoElectivo)== $añoElectivo ? 'selected':'' }} > {{$Año }} </option>
                                {!!$errors->first('id_añoElectivo','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                </div>  
                
                @if($listaMatriculas->id_estado === 2)
                <div class="form-group ">
                    <label for="inputCity">Estado de la matricula</label>
                        <select id="inputParentesco" class="estadoBloqueado form-control form-control-sm" name="id_estado" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($estadoo as $estado =>$Estado)
                                <option value="{{ $estado }}" {{ old('id_estado', $listaMatriculas->id_estado)== $estado ? 'selected':'' }} > {{$Estado }} </option>
                                {!!$errors->first('id_estado','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.estadoBloqueado').select2();
                                $("#mySelect").select2();

                                $(".estadoBloqueado").select2({
                                maximumSelectionLength: 1,
                                theme: "classic"							  
                                });
                                

                                });
                            </script>
                    <button type="submit" class="btn btn-success btn-sm btn-block mt-4">Actualizar matricula</button>     
                </div>


                @else
                <div class="form-group ">
                    <label for="inputCity">Estado de la matricula</label>
                        <select id="inputParentesco" class="form-control form-control-sm" name="id_estado" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($estadoo as $estado =>$Estado)
                                <option value="{{ $estado }}" {{ old('id_estado', $listaMatriculas->id_estado)== $estado ? 'selected':'' }} > {{$Estado }} </option>
                                {!!$errors->first('id_estado','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                    <button type="submit" class="btn btn-success btn-sm btn-block mt-4">Actualizar matricula</button>     
                </div>
                @endif

                <input type="hidden" name="id_tipoDeAspirante"
				   value="{{ $listaMatriculas ->tipoEstudiante() }}">   
              
          </div>
        </div>     
        
   