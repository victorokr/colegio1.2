        {!!csrf_field() !!}
        <div class="row justify-content-center ">
          <div class="col-sm-8 col-md-8 col-lg-6 mt-4">
            <div class="card">
              <div class="card-header text-center "> <small class="text-muted asterisko ">Obligatorio</small></div>
              <div class="card-body">
                  <div class="form-group ">
                    <label class="asterisko">Asignatura</label>
                    <select id="inputEscalafon" class="form-control form-control-sm" name="id_asignatura" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($asignaturaa as $asignatura =>$Asignatura)
                                <option value="{{ $asignatura }}" {{ old('id_asignatura',$listado->id_asignatura)== $asignatura ? 'selected':'' }} > {{$Asignatura }} </option>
                                {!!$errors->first('id_asignatura','<span class=error>:message</span>')!!}
                            @endforeach
                    </select>
                  </div>
                  <div class="form-group ">
                    <label class="asterisko">Curso</label>
                    <select id="inputEscalafon" class="form-control form-control-sm" name="id_curso" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($cursoo as $curso =>$Curso)
                                <option value="{{ $curso }}" {{ old('id_curso',$listado->id_curso)== $curso ? 'selected':'' }} > {{$Curso }} </option>
                                {!!$errors->first('id_curso','<span class=error>:message</span>')!!}
                            @endforeach
                    </select>
                  </div>
                  <div class="form-group ">
                    <label class="asterisko">Docente</label>
                    <select id="inputEscalafon" class="buscarCurso form-control form-control-sm" name="id_docente" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected>Seleccionar...</option>
                            @foreach ($docentee as $docente =>$Docente)
                                <option value="{{ $docente }}" {{ old('id_docente',$listado->id_docente)== $docente ? 'selected':'' }} > {{$Docente }} </option>
                                {!!$errors->first('id_docente','<span class=error>:message</span>')!!}
                            @endforeach
                    </select>
                    <script type="text/javascript" >
                                $(document).ready(function() {

                                $('.buscarCurso').select2();
                                $("#mySelect").select2();

                                $(".buscarCurso").select2({
                                
                                theme: "classic"							  
                                });
                                

                                });
                    </script>
                  </div>
              </div>
            </div>
                <button type="submit" class="btn btn-success btn-sm btn-block mt-4">Actualizar listado</button>

          </div>
        </div>     
        
   