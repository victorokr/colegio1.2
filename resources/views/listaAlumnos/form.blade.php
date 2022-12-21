
          
                <div class="form-group">
                    <label class="asterisko inputEmail4">Nombres</label>
                    <input type="text" class="form-control form-control-sm" id="inputNombres" name="nombres" value="{{ $listaAlumnos->nombres }}" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 30]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('nombres','<span class=error>:message</span>')!!}
                </div>

                <div class="form-group">
                    <label class="asterisko">Documento</label>
                    <input type="text" class="form-control form-control-sm" id="inputDocumento" name="documento" value="{{ $listaAlumnos->documento }}" required data-parsley-length="[10, 10]" data-parsley-type="digits" data-parsley-trigger="keyup" />
                    {!!$errors->first('documento','<span class=error>:message</span>')!!}
                </div>
                
                <div class="form-group ">
                    <label class="asterisko">Telefono</label>
                    <input type="text" class="form-control form-control-sm" id="inputTelefono" name="telefono" value="{{ $listaAlumnos->telefono }}" required data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-type="digits" data-parsley-trigger="keyup" />
                    {!!$errors->first('telefono','<span class=error>:message</span>')!!}
                </div>

                <div class="form-group ">
                    <label class="asterisko">Email</label>
                    <input type="email" class="form-control form-control-sm" id="inputEmail" name="email" value="{{ $listaAlumnos->email }}" required data-parsley-type="email" data-parsley-maxlength="50" data-parsley-trigger="keyup"  />
                    {!!$errors->first('email','<span class=error>:message</span>')!!}  
                </div>

                <div class="form-group ">
                    <label class="asterisko">Direccion</label>
                    <input type="text" class="form-control form-control-sm" id="inputDireccion" name="direccion" value="{{ $listaAlumnos->direccion }}" required data-parsley-pattern="/(^[A-Za-z0-9 ]+$)+/" data-parsley-length="[5, 40]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('direccion','<span class=error>:message</span>')!!}
                </div>

                <div class="form-group ">
                    <label class="asterisko">Lugar de Residencia</label>
                    <input type="text" class="form-control form-control-sm" id="inputlugarDeResidencia" name="lugarDeResidencia" value="{{ $listaAlumnos->lugarDeResidencia }}" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-length="[3, 40]" data-parsley-trigger="keyup"  />
                    {!!$errors->first('lugarDeResidencia','<span class=error>:message</span>')!!}
                </div>

                <div class="form-group ">
                    <label class="asterisko">Fecha de nacimiento</label>
                    <input type="date" class="form-control form-control-sm" id="inputDireccion" name="fechaDeNacimiento" value="{{ $listaAlumnos->fechaDeNacimiento }}"  data-parsley-required  data-parsley-trigger="keyup"  />
                    {!!$errors->first('direccion','<span class=error>:message</span>')!!}
                </div>

                <div class="form-group ">
                    <label class="asterisko">Tipo de documento</label>
                    <select id="inputParentesco" class="form-control form-control-sm"   name="id_tipoDocumento" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected></option>
                            @foreach ($tipoDeDocumentoo as $tipoDeDocumento =>$Tipo)
                                <option value="{{ $tipoDeDocumento }}" {{ old('id_tipoDocumento', $listaAlumnos->id_tipoDocumento)== $tipoDeDocumento ? 'selected':'' }} > {{$Tipo }} </option>
                                {!!$errors->first('id_tipoDocumento','<span class=error>:message</span>')!!}
                            @endforeach
                    </select>
                </div>

                <div class="form-group ">
                    <label class="asterisko">Lugar de nacimiento</label>
                        <select id="nacimiento" class="variable form-control form-control-sm"  name="id_lugarDeNacimiento" required data-parsley-required data-parsley-trigger="keyup">
                            <option value="" selected></option>
                            @foreach ($lugarDeNacimientoo  as $lugarDeNacimiento => $Lugar)
                                <option value="{{ $lugarDeNacimiento }}" {{ old('id_lugarDeNacimiento' , $listaAlumnos->id_lugarDeNacimiento)== $lugarDeNacimiento ? 'selected':'' }} > {{$Lugar }} </option>
                                {!!$errors->first('id_lugarDeNacimiento','<span class=error>:message</span>')!!}
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

                <div class="form-group ">
                    <label class="asterisko">Tipo de Sangre</label>
                    <select id="inputParentesco" class="form-control form-control-sm" title="este dato sera utilizado con fines informativos ante una entidad de salud en caso de un eventual accidente y o catastrofe natural"   name="id_factorRH" required data-parsley-required data-parsley-trigger="keyup" >
                            <option value="" selected></option>
                            @foreach ($factorrhh as $factorrh =>$Factor)
                                <option value="{{ $factorrh }}" {{ old('id_factorRH', $listaAlumnos->id_factorRH)== $factorrh ? 'selected':'' }} > {{$Factor }} </option>
                                {!!$errors->first('id_factorRH','<span class=error>:message</span>')!!}
                            @endforeach
                    </select>
                </div>
            
                <div class="form-group ">
                    <label class="asterisko">Eps</label>
                        <select  class="eps form-control form-control-sm"  name="id_eps" required data-parsley-required data-parsley-trigger="keyup">
                            <option value="" selected></option>
                            @foreach ($epss  as $eps => $EPS)
                                <option value="{{ $eps }}" {{ old('id_eps', $listaAlumnos->id_eps)== $eps ? 'selected':'' }} > {{$EPS }} </option>
                                {!!$errors->first('id_eps','<span class=error>:message</span>')!!}
                            @endforeach
                        </select>
                        <script type="text/javascript" >
				  		  	$(document).ready(function() {

    						$('.eps').select2();
                            $("#mySelect").select2();

    						$(".eps").select2({
                            theme: "classic",							  
                            });
                            

							});
				  		  </script>
                </div>

                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-success btn-sm btn-block  ">Guardar</button> 
                </div>
