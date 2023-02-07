                                 {!!csrf_field() !!}
                                  <div class="form-group">
                                      <label class="asterisko">Nota1</label>
                                      <input type="text" class="form-control form-control-sm" id="inputNota1" name="nota1" value="{{ old('nota1') }}" required data-parsley-length="[1, 3]" data-parsley-pattern="/^[\d]{0,11}(\.[\d]{1,2})?$/" data-parsley-min="1" data-parsley-max="5" data-parsley-trigger="keyup" />
                                      {!!$errors->first('nota1','<span class=error>:message</span>')!!}
                                  </div>
                                  <div class="form-group">
                                      <label class="asterisko">Nota2</label>
                                      <input type="text" class="form-control form-control-sm" id="inputNota2" name="nota2" value="{{ old('nota2') }}" required data-parsley-length="[1, 3]" data-parsley-pattern="/^[\d]{0,11}(\.[\d]{1,2})?$/" data-parsley-min="1" data-parsley-max="5" data-parsley-trigger="keyup" />
                                      {!!$errors->first('nota2','<span class=error>:message</span>')!!}
                                  </div>
                                  <div class="form-group">
                                      <label class="asterisko">Nota3</label>
                                      <input type="text" class="form-control form-control-sm" id="inputNota3" name="nota3" value="{{ old('nota3') }}" required data-parsley-length="[1, 3]" data-parsley-pattern="/^[\d]{0,11}(\.[\d]{1,2})?$/" data-parsley-min="1" data-parsley-max="5" data-parsley-trigger="keyup" />
                                      {!!$errors->first('nota3','<span class=error>:message</span>')!!}
                                  </div>
                                  <div class="form-group">
                                      <label class="asterisko">Nota4</label>
                                      <input type="text" class="form-control form-control-sm" id="inputNota4" name="nota4" value="{{ old('nota4') }}" required data-parsley-length="[1, 3]" data-parsley-pattern="/^[\d]{0,11}(\.[\d]{1,2})?$/" data-parsley-min="1" data-parsley-max="5" data-parsley-trigger="keyup" />
                                      {!!$errors->first('nota4','<span class=error>:message</span>')!!}
                                  </div>
                                  <!-- <div class="form-group">
                                      <label class="asterisko">Nota5</label>
                                      <input type="text" class="form-control form-control-sm" id="inputNota5" name="nota5" value="{{ old('nota5') }}" required data-parsley-length="[1, 3]" data-parsley-pattern="/^[\d]{0,11}(\.[\d]{1,2})?$/" data-parsley-min="1" data-parsley-max="5" data-parsley-trigger="keyup" />
                                      {!!$errors->first('nota5','<span class=error>:message</span>')!!}
                                  </div>
                                  <div class="form-group">
                                      <label class="asterisko">Nota6</label>
                                      <input type="text" class="form-control form-control-sm" id="inputNota6" name="nota6" value="{{ old('nota6') }}" required data-parsley-length="[1, 3]" data-parsley-pattern="/^[\d]{0,11}(\.[\d]{1,2})?$/" data-parsley-min="1" data-parsley-max="5" data-parsley-trigger="keyup" />
                                      {!!$errors->first('nota6','<span class=error>:message</span>')!!}
                                  </div> -->
                                  

                                  <input type="hidden" name="id_asignatura" 
                                  value="{{    Crypt::encrypt (request('idAsignatura')) }}" >
                                  
                                  
      

                                  <input type="hidden" name="id_curso"
                                  value="{{ Crypt::encrypt(request('idCurso')) }}">

                                  

                                  <input type="hidden" name="id_alumno" id="idAlumnoModal"
                                  value="">

                                  
                                  <input type="hidden" name="id_grado" id="idGrado" value="">
                                  

                                  
                                 

                                  <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                    <button type="submit" class="btn btn-primary">Evaluar</button>
                                  </div>     
        
   