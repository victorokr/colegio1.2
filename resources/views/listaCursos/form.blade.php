        
       

                <div class="form-group ">
                        <label class="asterisko">Curso</label>
                        <input type="text" class="form-control form-control-sm" id="inputCurso" name="salon" value="{{ $listaCursos->salon }}" placeholder="modificar curso" required data-parsley-type="digits" data-parsley-length="[0, 4]" data-parsley-min="101" data-parsley-max="1106" data-parsley-trigger="keyup"  />
                        {!!$errors->first('salon','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                    <label class="asterisko">Sede</label>
                    <select id="inputSede" class="form-control form-control-sm" name="id_sede" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($sedee as $sede =>$Sede)
                                <option value="{{ $sede }}" {{ old('id_sede',$listaCursos->id_sede)== $sede ? 'selected':'' }} > {{$Sede }} </option>
                                {!!$errors->first('id_sede','<span class=error>:message</span>')!!}
                            @endforeach
                    </select>
                </div>
                <div class="form-group ">
                    <label class="asterisko">Jornada</label>
                    <select id="inputJornada" class="form-control form-control-sm" name="id_jornada" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($jornadaa as $jornada =>$Jornada)
                                <option value="{{ $jornada }}" {{ old('id_jornada',$listaCursos->id_jornada)== $jornada ? 'selected':'' }} > {{$Jornada }} </option>
                                {!!$errors->first('id_jornada','<span class=error>:message</span>')!!}
                            @endforeach
                    </select>
                </div>
                <div class="form-group ">
                    <label class="asterisko">Director(a) de grupo</label>
                        <select id="nacimiento" class="variable form-control form-control-sm"  name="id_docente" required data-parsley-required data-parsley-trigger="keyup">
                            <option value="" selected></option>
                            @foreach ($directorDeCursoo  as $director => $Director)
                                <option value="{{ $director }}" {{ old('id_docente' ,$listaCursos->id_docente)== $director ? 'selected':'' }} > {{$Director }} </option>
                                {!!$errors->first('id_docente','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
				  		  	$(document).ready(function() {

    						$('.variable').select2();
                            $("#mySelect").select2();

    						$(".variable").select2({
                            //maximumSelectionLength: 2,
                            theme: "classic"							  
                            });
                            

							});
				  		  </script>
                </div>  
               
                <button type="submit" class="btn btn-success btn-sm btn-block mt-4">Actualizar Curso</button>

          
        
   