        
       

                <div class="form-group ">
                        <label class="asterisko">Curso</label>
                        <input type="text" class="form-control form-control-sm" id="inputCurso" name="salon" value="{{ $listaCursos->salon }}" placeholder="modificar curso" required data-parsley-type="digits" data-parsley-length="[0, 4]" data-parsley-min="101" data-parsley-max="1106" data-parsley-trigger="keyup"  />
                        {!!$errors->first('salon','<span class=error>:message</span>')!!}
                </div>   
               
                <button type="submit" class="btn btn-success btn-sm btn-block mt-4">Actualizar Curso</button>

          
        
   