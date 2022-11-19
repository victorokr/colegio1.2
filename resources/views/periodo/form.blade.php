{!!csrf_field() !!}
        <div class="row justify-content-center ">
          <div class=" col-sm-4 mt-4">

                <div class="form-group ">
                        <label for="inputPerfil">Fecha de inicio</label>
                        <input type="date" class="form-control form-control-sm" id="inputCurso" name="fechainicio" value="{{ $periodo->fechainicio }}" placeholder="modificar fecha" data-parsley-required  data-parsley-trigger="keyup"  />
                        {!!$errors->first('salon','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                        <label for="inputPerfil">Fecha fin</label>
                        <input type="date" class="form-control form-control-sm" id="inputCurso" name="fechafin" value="{{ $periodo->fechafin }}" placeholder="modificar fecha" data-parsley-required  data-parsley-trigger="keyup"  />
                        {!!$errors->first('salon','<span class=error>:message</span>')!!}
                </div>   
               
                <button type="submit" class="btn btn-success btn-sm btn-block mt-4">Actualizar Periodo</button>

          </div>
        </div>