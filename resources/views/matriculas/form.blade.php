        
        

               @if($listaMatriculas->id_estado === 1)
                <div class="form-group ">
                    <label class="asterisko">Grado al que se pre Matriculó</label>
                        <select id="inputGradoo" class="gradoMatriculado form-control form-control-sm" name="id_grado" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($gradoo as $grado =>$Grado)
                                <option value="{{ $grado }}" {{ old('id_grado', $listaMatriculas->id_grado)== $grado ? 'selected':'' }} > {{$Grado }} </option>
                                {!!$errors->first('id_grado','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.gradodoMatriculado').select2();
                                $("#mySelect").select2();

                                $(".gradoMatriculado").select2({
                                 //maximumSelectionLength: 1,
                                theme: "classic"							  
                                });
                                

                                });
                            </script>     
                </div>
                <div class="form-group ">
                    <label class="asterisko">Año de inicio de clases</label>
                        <select id="inputAño" class="anioInicioBloqueado form-control form-control-sm" name="id_añoElectivo" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($añoElectivoo as $añoElect =>$Año)
                                <option value="{{ $añoElect }}" {{ old('id_añoElectivo', $listaMatriculas->id_añoElectivo)== $añoElect ? 'selected':'' }} > {{$Año }} </option>
                                {!!$errors->first('id_añoElectivo','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.anioInicioBloqueado').select2();
                                $("#mySelect").select2();

                                $(".anioInicioBloqueado").select2({
                                 //maximumSelectionLength: 1,
                                theme: "classic"							  
                                });
                                

                                });
                        </script>     
                </div>
                @else
                <div class="form-group ">
                    <label class="asterisko">Renovar Grado </label>
                        <select id="inputRenovarGrado" class="gradoNormal form-control form-control-sm" name="id_grado" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($gradoo as $grado =>$Grado)
                                <option value="{{ $grado }}" {{ old('id_grado', $listaMatriculas->id_grado)== $grado ? 'selected':'' }} > {{$Grado }} </option>
                                {!!$errors->first('id_grado','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.gradoNormal').select2();
                                $("#mySelect").select2();

                                $(".gradoNormal").select2({
                                 //maximumSelectionLength: 1,
                                theme: "classic"							  
                                });
                                

                                });
                            </script>     
                </div>
                <div class="form-group ">
                        <label class="asterisko">Renovar año de inicio de clases</label>
                        <select id="inputAñoRenovar" class="anioRenovado form-control form-control-sm" name="id_añoElectivo" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($añoElectivoo as $añoElect =>$Año)
                                <option value="{{ $añoElect }}" {{ old('id_añoElectivo', $listaMatriculas->id_añoElectivo)== $añoElect ? 'selected':'' }} > {{$Año }} </option>
                                {!!$errors->first('id_añoElectivo','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.anioRenovado').select2();
                                $("#mySelect").select2();

                                $(".anioRenovado").select2({
                                 //maximumSelectionLength: 1,
                                theme: "classic"							  
                                });
                                

                                });
                        </script>
                </div> 
                @endif
                <div class="form-group ">
                    <label class="asterisko">Asignar Curso</label>
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
                 
                
                @if($listaMatriculas->id_estado === 2)
               
                    <button type="submit" class="btn btn-success btn-sm btn-block mt-4">Renovar Matricula</button>     
                


                @else
                
                    <button type="submit" class="btn btn-success btn-sm btn-block mt-4">Matricular</button>     
                
                @endif

                <input type="hidden" name="id_tipoDeAspirante"
				   value="{{ $listaMatriculas ->tipoEstudiante() }}">   
                
         
        
   