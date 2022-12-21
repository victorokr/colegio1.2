
        

                <div class="form-group ">
                        <label class="asterisko">Fecha de inicio</label>
                        <input type="date" class="form-control form-control-sm" id="inputCurso" name="fechainicio" value="{{ $periodo->fechainicio }}" placeholder="modificar fecha" data-parsley-required  data-parsley-trigger="keyup"  />
                        {!!$errors->first('salon','<span class=error>:message</span>')!!}
                </div>
                <div class="form-group ">
                        <label class="asterisko">Fecha fin</label>
                        <input type="date" class="form-control form-control-sm" id="inputCurso" name="fechafin" value="{{ $periodo->fechafin }}" placeholder="modificar fecha" data-parsley-required  data-parsley-trigger="keyup"  />
                        {!!$errors->first('salon','<span class=error>:message</span>')!!}
                </div>   
               
                <button type="submit" class="btn btn-success btn-sm btn-block mt-4">Actualizar Periodo</button>

       