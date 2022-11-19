        {!!csrf_field() !!}
        <div class="row justify-content-center ">
          <div class=" col-sm-4 mt-4">

                <div class="form-group ">
                        <label for="inputPerfil">Asignatura</label>
                        <input type="text" class="form-control form-control-sm" id="inputAsignatura" name="asignatura" value="{{ $listaAsignaturas->asignatura }}" placeholder="modificar asignatura"required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[4, 30]" data-parsley-trigger="keyup"  />
                        {!!$errors->first('asignatura','<span class=error>:message</span>')!!}
                </div>   
               
                <button type="submit" class="btn btn-success btn-sm btn-block mt-4">Actualizar asignatura</button>

          </div>
        </div>     
        
   